<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_admins');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();

$arrayAdmin = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idAmin = $arrayResult[$i][0];
    $nomAdmin = $arrayResult[$i][1];
    $prenomAdmin = $arrayResult[$i][2];
    $mailAdmin = $arrayResult[$i][3];
    $motDePasseAdmin = $arrayResult[$i][4];
    $dateDeCreationAdmin = $arrayResult[$i][5];

    $admin = new entityAdministrateur($idAmin, $nomAdmin, $prenomAdmin, $mailAdmin, $motDePasseAdmin, $dateDeCreationAdmin);
    array_push($arrayAdmin, $admin);
}

$_SESSION['arrayAdmin'] = $arrayAdmin;
