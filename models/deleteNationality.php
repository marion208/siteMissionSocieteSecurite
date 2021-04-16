<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idNationalite = $_GET['id'];

$listErrors = [];

$requestAgent = $bdd->query('SELECT COUNT(*) FROM liste_agents WHERE nationaliteAgent = ' . $idNationalite);
$donneesAgent = $requestAgent->fetch();
if ($donneesAgent[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer cette nationalité : au moins un agent lui est affectée.");
}

$requestAgent->closeCursor();

$requestCible = $bdd->query('SELECT COUNT(*) FROM liste_cibles WHERE nationaliteCible = ' . $idNationalite);
$donneesCible = $requestCible->fetch();
if ($donneesCible[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer cette nationalité : au moins une cible lui est affectée.");
}

$requestCible->closeCursor();

$requestContact = $bdd->query('SELECT COUNT(*) FROM liste_contacts WHERE nationaliteContact = ' . $idNationalite);
$donneesContact = $requestContact->fetch();
if ($donneesContact[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer cette nationalité : au moins un contact lui est affecté.");
}

$requestContact->closeCursor();

if (count($listErrors) == 0) {
    $req = $bdd->exec('DELETE FROM liste_nationalites WHERE idNationalite = ' . $idNationalite);

    header("Location: http://localhost/admin-liste_nationalites.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-delete_nationalite.php?id=" . $idNationalite);
    exit;
}
