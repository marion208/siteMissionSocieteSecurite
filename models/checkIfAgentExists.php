<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idAgent = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_agents WHERE idAgent = ' . $idAgent);
$donnees = $countNbResult->fetch();
$boolAgentExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolAgentExists'] = $boolAgentExists;
