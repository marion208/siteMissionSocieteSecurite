<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_nationalites');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$arrayIdNationalite = [];
$arrayDesignationNationalite = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idNationalite = $arrayResult[$i][0];
    $designationNationalite = $arrayResult[$i][1];

    array_push($arrayIdNationalite, $idNationalite);
    array_push($arrayDesignationNationalite, $designationNationalite);
}

$reponse = $bdd->query('SELECT * FROM liste_specialites_mission');

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

$_SESSION['arrayIdNationalite'] = $arrayIdNationalite;
$_SESSION['arrayDesignationNationalite'] = $arrayDesignationNationalite;
$_SESSION['arrayIdSpecialite'] = $arrayIdSpecialite;
$_SESSION['arrayDesignationSpecialite'] = $arrayDesignationSpecialite;
