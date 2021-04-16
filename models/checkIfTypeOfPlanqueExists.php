<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idTypePlanque = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_type_planques WHERE idTypePlanque = ' . $idTypePlanque);
$donnees = $countNbResult->fetch();
$boolTypePlanqueExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolTypePlanqueExists'] = $boolTypePlanqueExists;
