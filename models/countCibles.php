<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_cibles');
$donnees = $countNbResult->fetch();
$nbCiblesInDB = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['nbCiblesInDB'] = $nbCiblesInDB;
