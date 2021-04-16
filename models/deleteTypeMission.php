<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idTypeMission = $_GET['id'];

$listErrors = [];

$request = $bdd->query('SELECT COUNT(*) FROM liste_missions WHERE typeMission = ' . $idTypeMission);
$donnees = $request->fetch();
if ($donnees[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer ce type de mission : au moins une mission lui est affectée.");
}

$request->closeCursor();

if (count($listErrors) == 0) {
    $req = $bdd->exec('DELETE FROM types_missions WHERE idTypeMission = ' . $idTypeMission);

    header("Location: http://localhost/admin-types_missions.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-delete_typemission.php?id=" . $idTypeMission);
    exit;
}
