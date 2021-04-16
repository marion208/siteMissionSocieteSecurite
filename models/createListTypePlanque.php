<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_type_planques');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();

$arrayTypesPlanque = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idTypePlanque = $arrayResult[$i][0];
    $designationTypePlanque = $arrayResult[$i][1];

    $typePlanque = new entityTypeDePlanque($idTypePlanque, $designationTypePlanque);
    array_push($arrayTypesPlanque, $typePlanque);
}

$_SESSION['arrayTypesPlanque'] = $arrayTypesPlanque;
