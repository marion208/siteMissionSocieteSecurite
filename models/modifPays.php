<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$idPays = $_GET['id'];

$listErrors = [];

$designationPays = $_POST['designation'];
if (!preg_match("/^[A-Za-zÀ-ú]*$/", $designationPays)) {
    array_push($listErrors, "La désignation indiquée doit contenir uniquement des lettres.");
}
if (strlen($designationPays) > 200) {
    array_push($listErrors, "La désignation indiquée est trop longue.");
}
if (strlen($designationPays) <= 2) {
    array_push($listErrors, "La désignation indiquée est trop courte. Elle doit contenir au moins 2 caractères.");
}

if (count($listErrors) == 0) {
    $req = $bdd->prepare('UPDATE liste_pays SET designationPays = ? WHERE idPays = ?');
    $req->execute(array($designationPays, $idPays));

    header("Location: http://localhost/admin-liste_pays.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-modif_pays.php?id=" . $idPays);
    exit;
}
