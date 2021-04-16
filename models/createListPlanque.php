<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_planques');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();

$arrayPlanque = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idPlanque = $arrayResult[$i][0];
    $codePlanque = $arrayResult[$i][1];
    $adressePlanque = $arrayResult[$i][2];

    $idPaysPlanque = $arrayResult[$i][3];
    $reponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $idPaysPlanque);
    $donnees = $reponse->fetch();
    $paysPlanque = $donnees[0];

    $reponse->closeCursor();

    $idTypePlanque = $arrayResult[$i][4];
    $reponse = $bdd->query('SELECT designationTypePlanque FROM liste_type_planques WHERE idTypePlanque = ' . $idTypePlanque);
    $donnees = $reponse->fetch();
    $typePlanque = $donnees[0];

    $reponse->closeCursor();

    $planque = new entityPlanque($idPlanque, $codePlanque, $adressePlanque, $paysPlanque, $typePlanque);
    array_push($arrayPlanque, $planque);
}

$_SESSION['arrayPlanque'] = $arrayPlanque;
