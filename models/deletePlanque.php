<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idPlanque = $_GET['id'];

$listErrors = [];

$request = $bdd->query('SELECT COUNT(*) FROM liste_missions WHERE planquesMission = ' . $idPlanque);
$donnees = $request->fetch();
if ($donnees[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer cette planque : au moins une mission lui est affectée.");
}

$request->closeCursor();

if (count($listErrors) == 0) {
    $req = $bdd->exec('DELETE FROM liste_planques WHERE idPlanque = ' . $idPlanque);

    header("Location: http://localhost/admin-liste_planques.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-delete_planque.php?id=" . $idPlanque);
    exit;
}
