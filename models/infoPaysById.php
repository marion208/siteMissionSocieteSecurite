<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idPays = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_pays WHERE idPays = ' . $idPays);

$data = $reponse->fetch();
$idPays = $data[0];
$designationPays = $data[1];

$reponse->closeCursor();

$pays = new entityPays($idPays, $designationPays);

$_SESSION['pays'] = $pays;
