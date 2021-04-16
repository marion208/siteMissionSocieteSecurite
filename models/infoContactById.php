<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idContact = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_contacts WHERE idContact = ' . $idContact);

$data = $reponse->fetch();
$idContact = $data[0];
$nomContact = $data[1];
$prenomContact = $data[2];
$dateDeNaissanceContact = $data[3];
$codeIdentificationContact = $data[4];

$idNationaliteContact = $data[5];
$reponse = $bdd->query('SELECT designationNationalite FROM liste_nationalites WHERE idNationalite = ' . $idNationaliteContact);
$donnees = $reponse->fetch();
$nationaliteContact = $donnees[0];

$reponse->closeCursor();

$contact = new entityContact($idContact, $nomContact, $prenomContact, $dateDeNaissanceContact, $codeIdentificationContact, $nationaliteContact);

$_SESSION['contact'] = $contact;
