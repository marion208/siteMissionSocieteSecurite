<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idPlanque = $_GET['id'];

$listErrors = [];

$nameCode = $_POST['nameCode'];
if (strlen($nameCode) > 200) {
    array_push($listErrors, "Le nom indiqué est trop long.");
}
if (strlen($nameCode) <= 2) {
    array_push($listErrors, "Le nom indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$adresse = $_POST['adresse'];
if (strlen($adresse) > 200) {
    array_push($listErrors, "L'adresse indiquée est trop longue.");
}
if (strlen($adresse) <= 2) {
    array_push($listErrors, "L'adresse indiquée est trop courte. Il doit contenir au moins 2 caractères.");
}

$country = $_POST['country'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_pays WHERE idPays = ?');
$req->execute(array($country));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "Le pays renseigné n'existe pas.");
}

$req->closeCursor();

$typePlanque = $_POST['typePlanque'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_type_planques WHERE idTypePlanque = ?');
$req->execute(array($typePlanque));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "Le type de planque renseigné n'existe pas.");
}

$req->closeCursor();

if (count($listErrors) == 0) {
    $req = $bdd->prepare('UPDATE liste_planques SET codePlanque = ?, adressePlanque = ?, paysPlanque = ?, typePlanque = ? WHERE idPlanque = ?');
    $req->execute(array($nameCode, $adresse, $country, $typePlanque, $idPlanque));

    header("Location: http://localhost/admin-liste_planques.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-modif_planque.php?id=" . $idPlanque);
    exit;
}
