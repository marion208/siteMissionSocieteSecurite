<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idContact = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_contacts WHERE idContact = ' . $idContact);
$donnees = $countNbResult->fetch();
$boolContactExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolContactExists'] = $boolContactExists;
