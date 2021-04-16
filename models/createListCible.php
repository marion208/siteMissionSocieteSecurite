<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_cibles');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();

$arrayCible = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idCible = $arrayResult[$i][0];
    $nomCible = $arrayResult[$i][1];
    $prenomCible = $arrayResult[$i][2];
    $dateDeNaissanceCible = $arrayResult[$i][3];
    $nomDeCodeCible = $arrayResult[$i][4];

    $idNationaliteCible = $arrayResult[$i][5];
    $reponse = $bdd->query('SELECT designationNationalite FROM liste_nationalites WHERE idNationalite = ' . $idNationaliteCible);
    $donnees = $reponse->fetch();
    $nationaliteCible = $donnees[0];

    $cible = new entityCible($idCible, $nomCible, $prenomCible, $dateDeNaissanceCible, $nomDeCodeCible, $nationaliteCible);
    array_push($arrayCible, $cible);
}

$_SESSION['arrayCible'] = $arrayCible;
