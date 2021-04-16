<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idNationalite = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_nationalites WHERE idNationalite = ' . $idNationalite);
$donnees = $countNbResult->fetch();
$boolNationaliteExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolNationaliteExists'] = $boolNationaliteExists;
