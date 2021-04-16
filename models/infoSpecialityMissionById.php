<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idSpecialiteMission = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $idSpecialiteMission);

$data = $reponse->fetch();
$idSpecialiteMission = $data[0];
$designationSpecialityMission = $data[1];

$reponse->closeCursor();

$specialityMission = new entitySpecialiteMission($idSpecialiteMission, $designationSpecialityMission);

$_SESSION['specialityMission'] = $specialityMission;
