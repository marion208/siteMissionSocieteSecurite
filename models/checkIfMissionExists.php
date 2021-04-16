<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idMission = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_missions WHERE idMission = ' . $idMission);
$donnees = $countNbResult->fetch();
$boolMissionExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolMissionExists'] = $boolMissionExists;
