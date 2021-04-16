<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idTypeMission = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM types_missions WHERE idTypeMission = ' . $idTypeMission);

$data = $reponse->fetch();
$idTypeMission = $data[0];
$designationTypeMission = $data[1];

$reponse->closeCursor();

$typeMission = new entityTypeMission($idTypeMission, $designationTypeMission);

$_SESSION['typeMission'] = $typeMission;
