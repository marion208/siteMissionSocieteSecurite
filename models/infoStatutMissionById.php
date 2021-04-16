<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idStatutMission = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_statuts_mission WHERE idStatutMission = ' . $idStatutMission);

$data = $reponse->fetch();
$idStatutMission = $data[0];
$designationStatutMission = $data[1];

$reponse->closeCursor();

$statutMission = new entityStatutMission($idStatutMission, $designationStatutMission);

$_SESSION['statutMission'] = $statutMission;
