<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idMission = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_missions WHERE idMission = ' . $idMission);

$data = $reponse->fetch();
$idMission = $data[0];
$titreMission = $data[1];
$descriptionMission = $data[2];
$nomDeCodeMission = $data[3];

$idPaysMission = $data[4];
$reponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $idPaysMission);
$donnees = $reponse->fetch();
$paysMission = $donnees[0];

$reponse->closeCursor();

$idAgentsMission = $data[5];
$reponse = $bdd->query('SELECT nomAgent, prenomAgent FROM liste_agents WHERE idAgent = ' . $idAgentsMission);
$donnees = $reponse->fetch();
$agentsMission = $donnees[1] . " " . $donnees[0];

$reponse->closeCursor();

$idContactsMission = $data[6];
$reponse = $bdd->query('SELECT nomContact, prenomContact FROM liste_contacts WHERE idContact = ' . $idContactsMission);
$donnees = $reponse->fetch();
$contactsMission = $donnees[1] . " " . $donnees[0];

$reponse->closeCursor();

$idCiblesMission = $data[7];
$reponse = $bdd->query('SELECT nomCible, prenomCible FROM liste_cibles WHERE idCible = ' . $idCiblesMission);
$donnees = $reponse->fetch();
$ciblesMission = $donnees[1] . " " . $donnees[0];

$reponse->closeCursor();

$idTypeMission = $data[8];
$reponse = $bdd->query('SELECT designationTypeMission FROM types_missions WHERE idTypeMission = ' . $idTypeMission);
$donnees = $reponse->fetch();
$typeMission = $donnees[0];

$reponse->closeCursor();

$idStatutMission = $data[9];
$reponse = $bdd->query('SELECT designationStatutMission FROM liste_statuts_mission WHERE idStatutMission = ' . $idStatutMission);
$donnees = $reponse->fetch();
$statutMission = $donnees[0];

$reponse->closeCursor();

$idPlanquesMission = $data[10];
$reponse = $bdd->query('SELECT adressePlanque FROM liste_planques WHERE idPlanque = ' . $idPlanquesMission);
$donnees = $reponse->fetch();
$planquesMission = $donnees[0];

$reponse->closeCursor();

$idSpecialiteMission = $data[11];
$reponse = $bdd->query('SELECT designationSpecialiteMission FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $idSpecialiteMission);
$donnees = $reponse->fetch();
$specialiteMission = $donnees[0];

$dateDebutMission = $data[12];
$dateFinMission = $data[13];

$reponse->closeCursor();

$mission = new entityMission($idMission, $titreMission, $descriptionMission, $nomDeCodeMission, $paysMission, $agentsMission, $contactsMission, $ciblesMission, $typeMission, $statutMission, $planquesMission, $specialiteMission, $dateDebutMission, $dateFinMission);

$_SESSION['mission'] = $mission;
