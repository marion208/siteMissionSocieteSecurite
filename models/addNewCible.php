<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$listErrors = [];

$nomCible = $_POST['name'];
if (!preg_match("/^[A-Za-zÀ-ú -]*$/", $nomCible)) {
    array_push($listErrors, "Le nom indiqué doit contenir uniquement des lettres, des tirets, ou des espaces.");
}
if (strlen($nomCible) > 200) {
    array_push($listErrors, "Le nom indiqué est trop long.");
}
if (strlen($nomCible) <= 2) {
    array_push($listErrors, "Le nom indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$firstnameCible = $_POST['firstname'];
if (!preg_match("/^[A-Za-zÀ-ú -]*$/", $firstnameCible)) {
    array_push($listErrors, "Le prénom indiqué doit contenir uniquement des lettres, des tirets, ou des espaces.");
}
if (strlen($firstnameCible) > 200) {
    array_push($listErrors, "Le prénom indiqué est trop long.");
}
if (strlen($firstnameCible) <= 2) {
    array_push($listErrors, "Le prénom indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$birthDate = $_POST['birthDate'];
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $birthDate)) {
    array_push($listErrors, "Le format de date renseigné n'est pas bon.");
}

$codeIdentity = $_POST['codeIdentity'];
if (!preg_match("/^[A-Za-zÀ-ú0-9 \-]*$/", $codeIdentity)) {
    array_push($listErrors, "Le nom de code de la cible doit contenir uniquement des lettres, des chiffres, des espaces, ou des tirets.");
}
if (strlen($codeIdentity) > 200) {
    array_push($listErrors, "Le nom de code de la cible indiqué est trop long.");
}
if (strlen(trim($codeIdentity)) <= 2) {
    array_push($listErrors, "Le nom de code de la cible indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$nationality = $_POST['nationality'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_nationalites WHERE idNationalite = ?');
$req->execute(array($nationality));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "La nationalité renseignée n'existe pas.");
}

$req->closeCursor();


if (count($listErrors) == 0) {
    $req = $bdd->prepare('INSERT INTO liste_cibles (nomCible, prenomCible, dateDeNaissanceCible, nomDeCodeCible, nationaliteCible) VALUES(?, ?, ?, ?, ?)');
    $req->execute(array($nomCible, $firstnameCible, $birthDate, $codeIdentity, $nationality));

    header("Location: http://localhost/admin-liste_cibles.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-add_cible.php");
    exit;
}
