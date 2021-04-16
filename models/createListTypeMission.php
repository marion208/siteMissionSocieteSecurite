<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM types_missions');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();

$arrayTypesMission = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idTypesMission = $arrayResult[$i][0];
    $designationTypesMission = $arrayResult[$i][1];

    $typeMission = new entityTypeMission($idTypesMission, $designationTypesMission);
    array_push($arrayTypesMission, $typeMission);
}

$_SESSION['arrayTypesMission'] = $arrayTypesMission;
