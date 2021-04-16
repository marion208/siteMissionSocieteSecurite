<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$listErrors = [];

$nomContact = $_POST['name'];
if (!preg_match("/^[A-Za-zÀ-ú -]*$/", $nomContact)) {
    array_push($listErrors, "Le nom indiqué doit contenir uniquement des lettres, des tirets, ou des espaces.");
}
if (strlen($nomContact) > 200) {
    array_push($listErrors, "Le nom indiqué est trop long.");
}
if (strlen($nomContact) <= 2) {
    array_push($listErrors, "Le nom indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$firstnameContact = $_POST['firstname'];
if (!preg_match("/^[A-Za-zÀ-ú -]*$/", $firstnameContact)) {
    array_push($listErrors, "Le prénom indiqué doit contenir uniquement des lettres, des tirets, ou des espaces.");
}
if (strlen($firstnameContact) > 200) {
    array_push($listErrors, "Le prénom indiqué est trop long.");
}
if (strlen($firstnameContact) <= 2) {
    array_push($listErrors, "Le prénom indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$birthDate = $_POST['birthDate'];
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $birthDate)) {
    array_push($listErrors, "Le format de date renseigné n'est pas bon.");
}

$codeIdentity = $_POST['codeIdentity'];
if (!preg_match("/^[A-Za-zÀ-ú0-9 \-]*$/", $codeIdentity)) {
    array_push($listErrors, "Le nom de code du contact doit contenir uniquement des lettres, des chiffres, des espaces, ou des tirets.");
}
if (strlen($codeIdentity) > 200) {
    array_push($listErrors, "Le nom de code du contact indiqué est trop long.");
}
if (strlen(trim($codeIdentity)) <= 2) {
    array_push($listErrors, "Le nom de code du contact indiqué est trop court. Il doit contenir au moins 2 caractères.");
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
    $req = $bdd->prepare('INSERT INTO liste_contacts (nomContact, prenomContact, dateDeNaissanceContact, nomDeCodeContact, nationaliteContact) VALUES(?, ?, ?, ?, ?)');
    $req->execute(array($nomContact, $firstnameContact, $birthDate, $codeIdentity, $nationality));

    header("Location: http://localhost/admin-liste_contacts.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-add_contact.php");
    exit;
}
