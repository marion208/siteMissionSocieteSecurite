<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idStatutMission = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_statuts_mission WHERE idStatutMission = ' . $idStatutMission);
$donnees = $countNbResult->fetch();
$boolStatutMissionExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolStatutMissionExists'] = $boolStatutMissionExists;
