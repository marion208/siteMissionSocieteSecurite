<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idTypePlanque = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_type_planques WHERE idTypePlanque = ' . $idTypePlanque);

$data = $reponse->fetch();
$idTypePlanque = $data[0];
$designationTypePlanque = $data[1];

$reponse->closeCursor();

$typePlanque = new entityTypeDePlanque($idTypePlanque, $designationTypePlanque);

$_SESSION['typePlanque'] = $typePlanque;
