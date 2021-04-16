<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idPlanque = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_planques WHERE idPlanque = ' . $idPlanque);
$donnees = $countNbResult->fetch();
$boolPlanqueExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolPlanqueExists'] = $boolPlanqueExists;
