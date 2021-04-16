<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$idTypeMission = $_GET['id'];

$listErrors = [];

$designationTypeMission = $_POST['designation'];
if (!preg_match("/^[A-Za-zÀ-ú]*$/", $designationTypeMission)) {
    array_push($listErrors, "La désignation indiquée doit contenir uniquement des lettres.");
}
if (strlen($designationTypeMission) > 200) {
    array_push($listErrors, "La désignation indiquée est trop longue.");
}
if (strlen($designationTypeMission) <= 2) {
    array_push($listErrors, "La désignation indiquée est trop courte. Elle doit contenir au moins 2 caractères.");
}

if (count($listErrors) == 0) {
    $req = $bdd->prepare('UPDATE types_missions SET designationTypeMission = ? WHERE idTypeMission = ?');
    $req->execute(array($designationTypeMission, $idTypeMission));

    header("Location: http://localhost/admin-types_missions.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-modif_typemission.php?id=" . $idTypeMission);
    exit;
}
