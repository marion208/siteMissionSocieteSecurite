<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idSpecialityMission = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $idSpecialityMission);
$donnees = $countNbResult->fetch();
$boolSpecialityMissionExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolSpecialityMissionExists'] = $boolSpecialityMissionExists;
