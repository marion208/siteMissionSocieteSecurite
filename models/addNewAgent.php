<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$listErrors = [];

$nomAgent = $_POST['name'];
if (!preg_match("/^[A-Za-zÀ-ú -]*$/", $nomAgent)) {
    array_push($listErrors, "Le nom indiqué doit contenir uniquement des lettres, des tirets, ou des espaces.");
}
if (strlen($nomAgent) > 200) {
    array_push($listErrors, "Le nom indiqué est trop long.");
}
if (strlen($nomAgent) <= 2) {
    array_push($listErrors, "Le nom indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$firstnameAgent = $_POST['firstname'];
if (!preg_match("/^[A-Za-zÀ-ú -]*$/", $firstnameAgent)) {
    array_push($listErrors, "Le prénom indiqué doit contenir uniquement des lettres, des tirets, ou des espaces.");
}
if (strlen($firstnameAgent) > 200) {
    array_push($listErrors, "Le prénom indiqué est trop long.");
}
if (strlen($firstnameAgent) <= 2) {
    array_push($listErrors, "Le prénom indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$birthDate = $_POST['birthDate'];
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $birthDate)) {
    array_push($listErrors, "Le format de date renseigné n'est pas bon.");
}

$codeIdentity = $_POST['codeIdentity'];
if (!preg_match("/^[A-Za-zÀ-ú0-9 ]*$/", $codeIdentity)) {
    array_push($listErrors, "Le code d'identification de l'agent doit contenir uniquement des lettres, des chiffres ou des espaces.");
}
if (strlen($codeIdentity) > 200) {
    array_push($listErrors, "Le code d'identification de l'agent indiqué est trop long.");
}
if (strlen($codeIdentity) <= 2) {
    array_push($listErrors, "Le code d'identification de l'agent indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$nationality = $_POST['nationality'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_nationalites WHERE idNationalite = ?');
$req->execute(array($nationality));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "La nationalité renseignée n'existe pas.");
}

$req->closeCursor();

if (isset($_POST['speciality']) && !empty($_POST['speciality'])) {
    $speciality = "";
    $arraySpeciality = $_POST['speciality'];
    if (count($arraySpeciality) == 1) {
        $req = $bdd->prepare('SELECT COUNT(*) FROM liste_specialites_mission WHERE idSpecialiteMission = ?');
        $req->execute(array($arraySpeciality[0]));
        $donnees = $req->fetch();
        if ($donnees[0] == 0) {
            array_push($listErrors, "La spécialitée renseignée n'existe pas.");
        } else {
            $speciality = $arraySpeciality[0];
        }
    } else {
        for ($i = 0; $i < count($arraySpeciality); $i++) {
            $req = $bdd->prepare('SELECT COUNT(*) FROM liste_specialites_mission WHERE idSpecialiteMission = ?');
            $req->execute(array($arraySpeciality[$i]));
            $donnees = $req->fetch();
            if ($i == (count($arraySpeciality) - 1)) {
                if ($donnees[0] == 0) {
                    array_push($listErrors, "La spécialitée renseignée n'existe pas.");
                } else {
                    $speciality .= $arraySpeciality[$i];
                }
            } else {
                if ($donnees[0] == 0) {
                    array_push($listErrors, "La spécialitée renseignée n'existe pas.");
                } else {
                    $speciality .= $arraySpeciality[$i] . ",";
                }
            }
        }
    }
}

if (!isset($_POST['speciality']) || empty($_POST['speciality'])) {
    array_push($listErrors, "Vous devez renseigner au moins une spécialité.");
}

$req->closeCursor();

if (count($listErrors) == 0) {
    $req = $bdd->prepare('INSERT INTO liste_agents (nomAgent, prenomAgent, dateDeNaissanceAgent, codeDIdentificationAgent, nationaliteAgent, specialitesAgent) VALUES(?, ?, ?, ?, ?, ?)');
    $req->execute(array($nomAgent, $firstnameAgent, $birthDate, $codeIdentity, $nationality, $speciality));

    header("Location: http://localhost/admin-liste_agents.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-add_agent.php");
    exit;
}
