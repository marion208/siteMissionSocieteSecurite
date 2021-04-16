<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idAdmin = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_admins WHERE idAdmin = ' . $idAdmin);

$data = $reponse->fetch();
$idAmin = $data[0];
$nomAdmin = $data[1];
$prenomAdmin = $data[2];
$mailAdmin = $data[3];
$motDePasseAdmin = $data[4];
$dateDeCreationAdmin = $data[5];

$reponse->closeCursor();

$admin = new entityAdministrateur($idAmin, $nomAdmin, $prenomAdmin, $mailAdmin, $motDePasseAdmin, $dateDeCreationAdmin);

$_SESSION['admin'] = $admin;
