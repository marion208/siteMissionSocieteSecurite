<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$listErrors = [];

$codeName = $_POST['codeName'];
if (!preg_match("/^[A-Za-zÀ-ú0-9 \-]*$/", $codeName)) {
    array_push($listErrors, "Le nom de code indiqué doit contenir uniquement des lettres, des chiffres, des espaces ou des tirets.");
}
if (strlen($codeName) > 200) {
    array_push($listErrors, "Le nom de code indiqué est trop long.");
}
if (strlen(trim($codeName)) <= 2) {
    array_push($listErrors, "Le nom de code indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$adresse = $_POST['adresse'];
if (strlen($adresse) > 200) {
    array_push($listErrors, "L'adresse indiquée est trop longue.");
}
if (strlen(trim($adresse)) <= 2) {
    array_push($listErrors, "L'adresse indiquée est trop courte. Elle doit contenir au moins 2 caractères.");
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
    $req = $bdd->prepare('INSERT INTO liste_planques (codePlanque, adressePlanque, paysPlanque, typePlanque) VALUES(?, ?, ?, ?)');
    $req->execute(array($codeName, $adresse, $country, $typePlanque));

    header("Location: http://localhost/admin-liste_planques.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-add_planque.php");
    exit;
}
