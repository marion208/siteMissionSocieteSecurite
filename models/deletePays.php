<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idPays = $_GET['id'];

$listErrors = [];

$requestPays = $bdd->query('SELECT COUNT(*) FROM liste_missions WHERE paysMission = ' . $idPays);
$donneesPays = $requestPays->fetch();
if ($donneesPays[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer ce pays : au moins une mission lui est affectée.");
}

$requestPays->closeCursor();

$requestPlanque = $bdd->query('SELECT COUNT(*) FROM liste_planques WHERE paysPlanque = ' . $idPays);
$donneesPlanque = $requestPlanque->fetch();
if ($donneesPlanque[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer ce pays : au moins une planque lui est affectée.");
}

$requestPlanque->closeCursor();

if (count($listErrors) == 0) {
    $req = $bdd->exec('DELETE FROM liste_pays WHERE idPays = ' . $idPays);

    header("Location: http://localhost/admin-liste_pays.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-delete_pays.php?id=" . $idPays);
    exit;
}
