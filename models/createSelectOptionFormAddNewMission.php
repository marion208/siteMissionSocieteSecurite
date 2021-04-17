<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_pays ORDER BY designationPays');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$arrayIdPays = [];
$arrayDesignationPays = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idPays = $arrayResult[$i][0];
    $designationPays = $arrayResult[$i][1];

    array_push($arrayIdPays, $idPays);
    array_push($arrayDesignationPays, $designationPays);
}

$reponse = $bdd->query('SELECT * FROM liste_agents ORDER BY prenomAgent');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$arrayIdAgent = [];
$arrayNameAgent = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idAgent = $arrayResult[$i][0];
    $nomAgent = $arrayResult[$i][1];
    $prenomAgent = $arrayResult[$i][2];
    $completeNameAgent = $prenomAgent . " " . $nomAgent;

    array_push($arrayIdAgent, $idAgent);
    array_push($arrayNameAgent, $completeNameAgent);
}

$reponse = $bdd->query('SELECT * FROM liste_contacts ORDER BY prenomContact');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$arrayIdContact = [];
$arrayNameContact = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idContact = $arrayResult[$i][0];
    $nomContact = $arrayResult[$i][1];
    $prenomContact = $arrayResult[$i][2];
    $completeNameContact = $prenomContact . " " . $nomContact;

    array_push($arrayIdContact, $idContact);
    array_push($arrayNameContact, $completeNameContact);
}

$reponse = $bdd->query('SELECT * FROM liste_cibles ORDER BY prenomCible');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$arrayIdCible = [];
$arrayNameCible = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idCible = $arrayResult[$i][0];
    $nomCible = $arrayResult[$i][1];
    $prenomCible = $arrayResult[$i][2];
    $completeNameCible = $prenomCible . " " . $nomCible;

    array_push($arrayIdCible, $idCible);
    array_push($arrayNameCible, $completeNameCible);
}

$reponse = $bdd->query('SELECT * FROM types_missions ORDER BY designationTypeMission');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$arrayIdTypeMission = [];
$arrayDesignationTypeMission = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idTypeMission = $arrayResult[$i][0];
    $designationTypeMission = $arrayResult[$i][1];

    array_push($arrayIdTypeMission, $idTypeMission);
    array_push($arrayDesignationTypeMission, $designationTypeMission);
}

$reponse = $bdd->query('SELECT * FROM liste_statuts_mission');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$arrayIdStatutMission = [];
$arrayDesignationStatutMission = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idStatutMission = $arrayResult[$i][0];
    $designationStatutMission = $arrayResult[$i][1];

    array_push($arrayIdStatutMission, $idStatutMission);
    array_push($arrayDesignationStatutMission, $designationStatutMission);
}

$reponse = $bdd->query('SELECT * FROM liste_planques ORDER BY adressePlanque');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$arrayIdPlanque = [];
$arrayAdressePlanque = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idPlanque = $arrayResult[$i][0];
    $codePlanque = $arrayResult[$i][1];
    $adressePlanque = $arrayResult[$i][2];
    $idPays = $arrayResult[$i][3];
    $newreponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $idPays);
    $newdata = $newreponse->fetch();
    $paysPlanque = $newdata[0];
    $completeAdressePlanque = $codePlanque . " : " . $paysPlanque . " - " . $adressePlanque;

    array_push($arrayIdPlanque, $idPlanque);
    array_push($arrayAdressePlanque, $completeAdressePlanque);
}

$reponse = $bdd->query('SELECT * FROM liste_specialites_mission ORDER BY designationSpecialiteMission');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$arrayIdSpecialite = [];
$arrayDesignationSpecialite = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idSpecialite = $arrayResult[$i][0];
    $designationSpecialite = $arrayResult[$i][1];

    array_push($arrayIdSpecialite, $idSpecialite);
    array_push($arrayDesignationSpecialite, $designationSpecialite);
}

$reponse->closeCursor();

$_SESSION['arrayIdPays'] = $arrayIdPays;
$_SESSION['arrayDesignationPays'] = $arrayDesignationPays;
$_SESSION['arrayIdAgent'] = $arrayIdAgent;
$_SESSION['arrayNameAgent'] = $arrayNameAgent;
$_SESSION['arrayIdContact'] = $arrayIdContact;
$_SESSION['arrayNameContact'] = $arrayNameContact;
$_SESSION['arrayIdCible'] = $arrayIdCible;
$_SESSION['arrayNameCible'] = $arrayNameCible;
$_SESSION['arrayIdTypeMission'] = $arrayIdTypeMission;
$_SESSION['arrayDesignationTypeMission'] = $arrayDesignationTypeMission;
$_SESSION['arrayIdStatutMission'] = $arrayIdStatutMission;
$_SESSION['arrayDesignationStatutMission'] = $arrayDesignationStatutMission;
$_SESSION['arrayIdPlanque'] = $arrayIdPlanque;
$_SESSION['arrayAdressePlanque'] = $arrayAdressePlanque;
$_SESSION['arrayIdSpecialite'] = $arrayIdSpecialite;
$_SESSION['arrayDesignationSpecialite'] = $arrayDesignationSpecialite;
