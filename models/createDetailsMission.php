<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idMission = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_missions WHERE idMission = ' . $idMission);

$data = $reponse->fetch();

$reponse->closeCursor();

$idMission = $data[0];
$titreMission = $data[1];
$descriptionMission = $data[2];
$nomDeCodeMission = $data[3];

$idPaysMission = $data[4];
$reponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $idPaysMission);
$donnees = $reponse->fetch();
$paysMission = $donnees[0];

$reponse->closeCursor();

$agentsMission = "";
$idAgentsMission = $data[5];
$listeIdAgentsMission = explode(",", $idAgentsMission);
if (count($listeIdAgentsMission) == 1) {
    $reponse = $bdd->query('SELECT nomAgent, prenomAgent FROM liste_agents WHERE idAgent = ' . $listeIdAgentsMission[0]);
    $donnees = $reponse->fetch();
    $agentsMission = $donnees[1] . " " . $donnees[0];
    $reponse->closeCursor();
} else {
    $listeNomAgentsMission = [];
    for ($j = 0; $j < count($listeIdAgentsMission); $j++) {
        $reponse = $bdd->query('SELECT nomAgent, prenomAgent FROM liste_agents WHERE idAgent = ' . $listeIdAgentsMission[$j]);
        while ($donnees = $reponse->fetch()) {
            if ($j == 0) {
                array_push($listeNomAgentsMission, $donnees[0], " ", $donnees[1]);
            } else {
                array_push($listeNomAgentsMission, ", ", $donnees[0], " ", $donnees[1]);
            }
        }
        $reponse->closeCursor();
    }
    for ($k = 0; $k < count($listeNomAgentsMission); $k++) {
        $agentsMission .= $listeNomAgentsMission[$k];
    }
}

$idContactsMission = $data[6];
$contactsMission = "";
$listeIdContactsMission = explode(",", $idContactsMission);
if (count($listeIdContactsMission) == 1) {
    $reponse = $bdd->query('SELECT nomContact, prenomContact FROM liste_contacts WHERE idContact = ' . $listeIdContactsMission[0]);
    $donnees = $reponse->fetch();
    $contactsMission = $donnees[1] . " " . $donnees[0];
    $reponse->closeCursor();
} else {
    $listeNomContactsMission = [];
    for ($j = 0; $j < count($listeIdContactsMission); $j++) {
        $reponse = $bdd->query('SELECT nomContact, prenomContact FROM liste_contacts WHERE idContact = ' . $listeIdContactsMission[$j]);
        while ($donnees = $reponse->fetch()) {
            if ($j == 0) {
                array_push($listeNomContactsMission, $donnees[1], " ", $donnees[0]);
            } else {
                array_push($listeNomContactsMission, ", ", $donnees[1], " ", $donnees[0]);
            }
        }
        $reponse->closeCursor();
    }
    for ($k = 0; $k < count($listeNomContactsMission); $k++) {
        $contactsMission .= $listeNomContactsMission[$k];
    }
}

$idCiblesMission = $data[7];
$ciblesMission = "";
$listeIdCiblesMission = explode(",", $idCiblesMission);
if (count($listeIdCiblesMission) == 1) {
    $reponse = $bdd->query('SELECT nomCible, prenomCible FROM liste_cibles WHERE idCible = ' . $listeIdCiblesMission[0]);
    $donnees = $reponse->fetch();
    $ciblesMission = $donnees[1] . " " . $donnees[0];
    $reponse->closeCursor();
} else {
    $listeNomCiblesMission = [];
    for ($j = 0; $j < count($listeIdCiblesMission); $j++) {
        $reponse = $bdd->query('SELECT nomCible, prenomCible FROM liste_cibles WHERE idCible = ' . $listeIdContactsMission[$j]);
        while ($donnees = $reponse->fetch()) {
            if ($j == 0) {
                array_push($listeNomCiblesMission, $donnees[1], " ", $donnees[0]);
            } else {
                array_push($listeNomCiblesMission, ", ", $donnees[1], " ", $donnees[0]);
            }
        }
        $reponse->closeCursor();
    }
    for ($k = 0; $k < count($listeNomCiblesMission); $k++) {
        $ciblesMission .= $listeNomCiblesMission[$k];
    }
}

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
$planquesMission = "";
$listeIdPlanquesMission = explode(",", $idPlanquesMission);
if (count($listeIdPlanquesMission) == 1) {
    $reponse = $bdd->query('SELECT codePlanque, adressePlanque FROM liste_planques WHERE idPlanque = ' . $listeIdPlanquesMission[0]);
    $donnees = $reponse->fetch();
    $planquesMission = $donnees[0] . " " . $donnees[1];
    $reponse->closeCursor();
} else {
    $listePlanquesMission = [];
    for ($j = 0; $j < count($listePlanquesMission); $j++) {
        $reponse = $bdd->query('SELECT codePlanque, adressePlanque FROM liste_planques WHERE idPlanque = ' . $listePlanquesMission[$j]);
        while ($donnees = $reponse->fetch()) {
            if ($j == 0) {
                array_push($listePlanquesMission, $donnees[0], " ", $donnees[1]);
            } else {
                array_push($listePlanquesMission, ", ", $donnees[0], " ", $donnees[1]);
            }
        }
        $reponse->closeCursor();
    }
    for ($k = 0; $k < count($listePlanquesMission); $k++) {
        $planquesMission .= $listePlanquesMission[$k];
    }
}

$idSpecialiteRequisePourLaMission = $data[11];
$reponse = $bdd->query('SELECT designationSpecialiteMission FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $idSpecialiteRequisePourLaMission);
$donnees = $reponse->fetch();
$specialiteRequisePourLaMission = $donnees[0];
$reponse->closeCursor();

$dateDeDebutDeLaMission = $data[12];
$dateDeFinDeLaMission = $data[13];

$mission = new entityMission($idMission, $titreMission, $descriptionMission, $nomDeCodeMission, $paysMission, $agentsMission, $contactsMission, $ciblesMission, $typeMission, $statutMission, $planquesMission, $specialiteRequisePourLaMission, $dateDeDebutDeLaMission, $dateDeFinDeLaMission);

$_SESSION['mission'] = $mission;
