<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$idNationality = $_GET['id'];

$listErrors = [];

$designationNationality = $_POST['designation'];
if (!preg_match("/^[A-Za-zÀ-ú]*$/", $designationNationality)) {
    array_push($listErrors, "La désignation indiquée doit contenir uniquement des lettres.");
}
if (strlen($designationNationality) > 200) {
    array_push($listErrors, "La désignation indiquée est trop longue.");
}
if (strlen($designationNationality) <= 2) {
    array_push($listErrors, "La désignation indiquée est trop courte. Elle doit contenir au moins 2 caractères.");
}

if (count($listErrors) == 0) {
    $req = $bdd->prepare('UPDATE liste_nationalites SET designationNationalite = ? WHERE idNationalite = ?');
    $req->execute(array($designationNationality, $idNationality));

    header("Location: http://localhost/admin-liste_nationalites.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-modif_nationalite.php?id=" . $idNationality);
    exit;
}
