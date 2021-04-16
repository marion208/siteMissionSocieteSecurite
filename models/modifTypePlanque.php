<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$idTypePlanque = $_GET['id'];

$listErrors = [];

$designationTypePlanque = $_POST['designation'];
if (!preg_match("/^[A-Za-zÀ-ú]*$/", $designationTypePlanque)) {
    array_push($listErrors, "La désignation indiquée doit contenir uniquement des lettres.");
}
if (strlen($designationTypePlanque) > 200) {
    array_push($listErrors, "La désignation indiquée est trop longue.");
}
if (strlen($designationTypePlanque) <= 2) {
    array_push($listErrors, "La désignation indiquée est trop courte. Elle doit contenir au moins 2 caractères.");
}

if (count($listErrors) == 0) {
    $req = $bdd->prepare('UPDATE liste_type_planques SET designationTypePlanque = ? WHERE idTypePlanque = ?');
    $req->execute(array($designationTypePlanque, $idTypePlanque));

    header("Location: http://localhost/admin-liste_type_planques.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-modif_typeplanque.php?id=" . $idTypePlanque);
    exit;
}
