<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idAdmin = $_GET['id'];
$countNbResult = $bdd->query('SELECT COUNT(*) FROM liste_admins WHERE idAdmin = ' . $idAdmin);
$donnees = $countNbResult->fetch();
$boolAdminExists = $donnees[0];

$countNbResult->closeCursor();

$_SESSION['boolAdminExists'] = $boolAdminExists;
