<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idCible = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_cibles WHERE idCible = ' . $idCible);
$donnees = $countNbResult->fetch();
$boolCibleExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolCibleExists'] = $boolCibleExists;
