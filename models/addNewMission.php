<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$listErrors = [];

$titreMission = $_POST['titreMission'];
if (strlen($titreMission) > 200) {
    array_push($listErrors, "Le titre de la mission indiqué est trop long.");
}
if (strlen(trim($titreMission)) <= 2) {
    array_push($listErrors, "Le titre de la mission indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$description = $_POST['description'];
if (strlen($description) > 200) {
    array_push($listErrors, "La description indiquée est trop longue.");
}
if (strlen(trim($description)) <= 2) {
    array_push($listErrors, "La description indiquée est trop courte. Il doit contenir au moins 2 caractères.");
}

$nomDeCodeMission = $_POST['nomDeCodeMission'];
if (strlen($nomDeCodeMission) > 200) {
    array_push($listErrors, "Le nom de code indiqué est trop long.");
}
if (strlen(trim($nomDeCodeMission)) <= 2) {
    array_push($listErrors, "Le nom de code indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$country = $_POST['country'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_pays WHERE idPays = ?');
$req->execute(array($country));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "Le pays renseigné n'existe pas.");
}

$req->closeCursor();

$agent = $_POST['agent'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_agents WHERE idAgent = ?');
$req->execute(array($agent));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "L'agent renseigné n'existe pas.");
}

$req->closeCursor();

$contact = $_POST['contact'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_contacts WHERE idContact = ?');
$req->execute(array($contact));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "Le contact renseigné n'existe pas.");
}

$req->closeCursor();

$cible = $_POST['cible'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_cibles WHERE idCible = ?');
$req->execute(array($cible));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "La cible renseignée n'existe pas.");
}

$req->closeCursor();

$typeMission = $_POST['typeMission'];
$req = $bdd->prepare('SELECT COUNT(*) FROM types_missions WHERE idTypeMission = ?');
$req->execute(array($typeMission));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "Le type de mission renseigné n'existe pas.");
}

$req->closeCursor();

$statutMission = $_POST['statutMission'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_statuts_mission WHERE idStatutMission = ?');
$req->execute(array($statutMission));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "Le statut de mission renseigné n'existe pas.");
}

$req->closeCursor();

$planque = $_POST['planque'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_planques WHERE idPlanque = ?');
$req->execute(array($planque));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "La planque renseignée n'existe pas.");
}

$req->closeCursor();

$specialite = $_POST['specialite'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_specialites_mission WHERE idSpecialiteMission = ?');
$req->execute(array($specialite));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "La spécialité renseignée n'existe pas.");
}

$req->closeCursor();

$dateDebutMission = $_POST['dateDebutMission'];
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dateDebutMission)) {
    array_push($listErrors, "Le format de date de début de la mission renseigné n'est pas bon.");
}

$dateFinMission = $_POST['dateFinMission'];
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dateFinMission)) {
    array_push($listErrors, "Le format de date de fin de la mission renseigné n'est pas bon.");
}

if (count($listErrors) == 0) {
    $req = $bdd->prepare('INSERT INTO liste_missions (titreMission, descriptionMission, nomDeCodeMission, paysMission, agentsMission, contactsMission, ciblesMission, typeMission, statutMission, planquesMission, specialiteRequisePourLaMission, dateDeDebutDeLaMission, dateDeFinDeLaMission) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $req->execute(array($titreMission, $description, $nomDeCodeMission, $country, $agent, $contact, $cible, $typeMission, $statutMission, $planque, $specialite, $dateDebutMission, $dateFinMission));

    header("Location: http://localhost/admin-liste_missions.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-add_mission.php");
    exit;
}
