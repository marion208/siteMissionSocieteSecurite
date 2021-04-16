<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_contacts');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();

$arrayContact = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idContact = $arrayResult[$i][0];
    $nomContact = $arrayResult[$i][1];
    $prenomContact = $arrayResult[$i][2];
    $dateDeNaissanceContact = $arrayResult[$i][3];
    $nomDeCodeContact = $arrayResult[$i][4];

    $idNationaliteContact = $arrayResult[$i][5];
    $reponse = $bdd->query('SELECT designationNationalite FROM liste_nationalites WHERE idNationalite = ' . $idNationaliteContact);
    $donnees = $reponse->fetch();
    $nationaliteContact = $donnees[0];

    $contact = new entityContact($idContact, $nomContact, $prenomContact, $dateDeNaissanceContact, $nomDeCodeContact, $nationaliteContact);
    array_push($arrayContact, $contact);
}

$_SESSION['arrayContact'] = $arrayContact;
