<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$idAdmin = $_GET['id'];

$listErrors = [];

$nomAdmin = $_POST['nameAdmin'];
if (!preg_match("/^[A-Za-zÀ-ú -]*$/", $nomAdmin)) {
    array_push($listErrors, "Le nom indiqué doit contenir uniquement des lettres, des tirets, ou des espaces.");
}
if (strlen($nomAdmin) > 200) {
    array_push($listErrors, "Le nom indiqué est trop long.");
}
if (strlen($nomAdmin) <= 2) {
    array_push($listErrors, "Le nom indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$firstnameAdmin = $_POST['firstnameAdmin'];
if (!preg_match("/^[A-Za-zÀ-ú -]*$/", $firstnameAdmin)) {
    array_push($listErrors, "Le prénom indiqué doit contenir uniquement des lettres, des tirets, ou des espaces.");
}
if (strlen($firstnameAdmin) > 200) {
    array_push($listErrors, "Le prénom indiqué est trop long.");
}
if (strlen($firstnameAdmin) <= 2) {
    array_push($listErrors, "Le prénom indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$mailAdmin = $_POST['mailAdmin'];
if (!strstr($mailAdmin, "@")) {
    array_push($listErrors, "L'adresse e-mail renseignée n'est pas correcte.");
}
if (strlen($mailAdmin) > 200) {
    array_push($listErrors, "L'adresse e-mail renseignée est trop longue.");
}
if (strlen($mailAdmin) < 5) {
    array_push($listErrors, "L'adresse e-mail renseignée est trop courte.");
}

$passwordAdmin = $_POST['passwordAdmin'];
if (strlen($passwordAdmin) > 200) {
    array_push($listErrors, "Le mot de passe renseigné est trop long.");
}
if (strlen($passwordAdmin) < 8) {
    array_push($listErrors, "Le mot de passe renseigné est trop court. Il doit contenir au moins 8 caractères.");
}

$dateCreateAdmin = $_POST['dateCreateAdmin'];
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dateCreateAdmin)) {
    array_push($listErrors, "Le format de date renseigné n'est pas bon.");
}

if (count($listErrors) == 0) {
    $req = $bdd->prepare('UPDATE liste_admins SET nomAdmin = ?, prenomAdmin = ?, mailAdmin = ?, motDePasseAdmin = ?, dateDeCreationAdmin = ? WHERE idAdmin = ?');
    $req->execute(array($nomAdmin, $firstnameAdmin, $mailAdmin, $passwordAdmin, $dateCreateAdmin, $idAdmin));

    header("Location: http://localhost/admin-liste_admins.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-modif_admin.php?id=" . $idAdmin);
    exit;
}
