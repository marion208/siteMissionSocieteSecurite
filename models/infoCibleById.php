<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idCible = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_cibles WHERE idCible = ' . $idCible);

$data = $reponse->fetch();
$idCible = $data[0];
$nomCible = $data[1];
$prenomCible = $data[2];
$dateDeNaissanceCible = $data[3];
$codeIdentificationCible = $data[4];

$idNationaliteCible = $data[5];
$reponse = $bdd->query('SELECT designationNationalite FROM liste_nationalites WHERE idNationalite = ' . $idNationaliteCible);
$donnees = $reponse->fetch();
$nationaliteAgent = $donnees[0];

$reponse->closeCursor();

$cible = new entityCible($idCible, $nomCible, $prenomCible, $dateDeNaissanceCible, $codeIdentificationCible, $nationaliteAgent);

$_SESSION['cible'] = $cible;
