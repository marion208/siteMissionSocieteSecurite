<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idPlanque = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_planques WHERE idPlanque = ' . $idPlanque);

$data = $reponse->fetch();
$idPlanque = $data[0];
$codePlanque = $data[1];
$adressePlanque = $data[2];

$idPaysPlanque = $data[3];
$reponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $idPaysPlanque);
$donnees = $reponse->fetch();
$paysPlanque = $donnees[0];

$idTypePlanque = $data[4];
$reponse = $bdd->query('SELECT designationTypePlanque FROM liste_type_planques WHERE idTypePlanque = ' . $idTypePlanque);
$donnees = $reponse->fetch();
$typePlanque = $donnees[0];

$reponse->closeCursor();

$planque = new entityPlanque($idPlanque, $codePlanque, $adressePlanque, $paysPlanque, $typePlanque);

$_SESSION['planque'] = $planque;
