<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idSpecialiteMission = $_GET['id'];

$listErrors = [];

$requestAgent = $bdd->query('SELECT COUNT(*) FROM liste_agents WHERE specialitesAgent = ' . $idSpecialiteMission);
$donneesAgent = $requestAgent->fetch();
if ($donneesAgent[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer cette spécialité : au moins un agent la possède.");
}

$requestAgent->closeCursor();

$requestMission = $bdd->query('SELECT COUNT(*) FROM liste_missions WHERE specialiteRequisePourLaMission = ' . $idSpecialiteMission);
$donneesMission = $requestMission->fetch();
if ($donneesMission[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer cette spécialité : au moins une mission la demande.");
}

$requestMission->closeCursor();

if (count($listErrors) == 0) {
    $req = $bdd->exec('DELETE FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $idSpecialiteMission);

    header("Location: http://localhost/admin-liste_specialites_mission.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-delete_specialitemission.php?id=" . $idSpecialiteMission);
    exit;
}
