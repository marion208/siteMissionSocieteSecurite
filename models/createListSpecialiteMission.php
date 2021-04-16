<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_specialites_mission');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();

$arraySpecialitesMission = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idSpecialiteMission = $arrayResult[$i][0];
    $designationSpecialiteMission = $arrayResult[$i][1];

    $specialiteMission = new entitySpecialiteMission($idSpecialiteMission, $designationSpecialiteMission);
    array_push($arraySpecialitesMission, $specialiteMission);
}

$_SESSION['arraySpecialitesMission'] = $arraySpecialitesMission;
