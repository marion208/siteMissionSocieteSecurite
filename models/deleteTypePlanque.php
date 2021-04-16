<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idTypePlanque = $_GET['id'];

$listErrors = [];

$request = $bdd->query('SELECT COUNT(*) FROM liste_planques WHERE typePlanque = ' . $idTypePlanque);
$donnees = $request->fetch();
if ($donnees[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer ce type de planque : au moins une planque lui est affectée.");
}

$request->closeCursor();

if (count($listErrors) == 0) {
    $req = $bdd->exec('DELETE FROM liste_type_planques WHERE idTypePlanque = ' . $idTypePlanque);

    header("Location: http://localhost/admin-liste_type_planques.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-delete_typeplanque.php?id=" . $idTypePlanque);
    exit;
}
