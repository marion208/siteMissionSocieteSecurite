<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_pays');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();

$arrayListPays = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idPays = $arrayResult[$i][0];
    $designationPays = $arrayResult[$i][1];

    $pays = new entityPays($idPays, $designationPays);
    array_push($arrayListPays, $pays);
}

$_SESSION['arrayListPays'] = $arrayListPays;
