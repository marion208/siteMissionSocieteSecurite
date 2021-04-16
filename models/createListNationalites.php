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

$reponse->closeCursor();

$arrayListNationalites = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idNationalite = $arrayResult[$i][0];
    $designationNationalite = $arrayResult[$i][1];

    $nationalite = new entityNationalite($idNationalite, $designationNationalite);
    array_push($arrayListNationalites, $nationalite);
}

$_SESSION['arrayListNationalites'] = $arrayListNationalites;
