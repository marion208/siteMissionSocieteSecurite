<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_nationalites ORDER BY designationNationalite');

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

$reponse->closeCursor();

$_SESSION['arrayIdNationalite'] = $arrayIdNationalite;
$_SESSION['arrayDesignationNationalite'] = $arrayDesignationNationalite;
