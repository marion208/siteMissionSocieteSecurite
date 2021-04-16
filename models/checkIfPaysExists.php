<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idPays = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_pays WHERE idPays = ' . $idPays);
$donnees = $countNbResult->fetch();
$boolPaysExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolPaysExists'] = $boolPaysExists;
