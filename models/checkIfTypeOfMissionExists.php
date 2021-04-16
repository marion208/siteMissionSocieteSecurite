<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idTypeMission = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM types_missions WHERE idTypeMission = ' . $idTypeMission);
$donnees = $countNbResult->fetch();
$boolTypeMissionExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolTypeMissionExists'] = $boolTypeMissionExists;
