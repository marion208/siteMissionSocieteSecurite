<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idNationality = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_nationalites WHERE idNationalite = ' . $idNationality);

$data = $reponse->fetch();
$idNationality = $data[0];
$designationNationality = $data[1];

$reponse->closeCursor();

$nationalite = new entityNationalite($idNationality, $designationNationality);

$_SESSION['nationalite'] = $nationalite;
