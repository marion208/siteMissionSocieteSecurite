<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_planques');
$donnees = $countNbResult->fetch();
$nbPlanquesInDB = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['nbPlanquesInDB'] = $nbPlanquesInDB;
