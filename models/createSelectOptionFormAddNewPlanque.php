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

$reponse = $bdd->query('SELECT * FROM liste_type_planques ORDER BY designationTypePlanque');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$arrayIdTypePlanque = [];
$arrayDesignationTypePlanque = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idTypePlanque = $arrayResult[$i][0];
    $designationTypePlanque = $arrayResult[$i][1];

    array_push($arrayIdTypePlanque, $idTypePlanque);
    array_push($arrayDesignationTypePlanque, $designationTypePlanque);
}

$reponse->closeCursor();

$_SESSION['arrayIdPays'] = $arrayIdPays;
$_SESSION['arrayDesignationPays'] = $arrayDesignationPays;
$_SESSION['arrayIdTypePlanque'] = $arrayIdTypePlanque;
$_SESSION['arrayDesignationTypePlanque'] = $arrayDesignationTypePlanque;
