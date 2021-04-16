<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_statuts_mission');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();

$arrayStatutsMission = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idStatutsMission = $arrayResult[$i][0];
    $designationStatutsMission = $arrayResult[$i][1];

    $statutMission = new entityStatutMission($idStatutsMission, $designationStatutsMission);
    array_push($arrayStatutsMission, $statutMission);
}

$_SESSION['arrayStatutsMission'] = $arrayStatutsMission;
