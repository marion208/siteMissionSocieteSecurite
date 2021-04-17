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

$agentsMission = "";
$idAgentsMission = $data[5];
if (str_contains($idAgentsMission, ",")) {
    $arrayIdAgentsMission = preg_split("*,*", $idAgentsMission);
    for ($i = 0; $i < count($arrayIdAgentsMission); $i++) {
        if ($i != (count($arrayIdAgentsMission) - 1)) {
            $reponse = $bdd->query('SELECT nomAgent, prenomAgent FROM liste_agents WHERE idAgent = ' . $arrayIdAgentsMission[$i]);
            $donnees = $reponse->fetch();
            $agentsMission .= $donnees[1] . " " . $donnees[0] . ", ";
            $reponse->closeCursor();
        } else {
            $reponse = $bdd->query('SELECT nomAgent, prenomAgent FROM liste_agents WHERE idAgent = ' . $arrayIdAgentsMission[$i]);
            $donnees = $reponse->fetch();
            $agentsMission .= $donnees[1] . " " . $donnees[0];
            $reponse->closeCursor();
        }
    }
} else {
    $arrayIdAgentsMission = [];
    array_push($arrayIdAgentsMission, $idAgentsMission);
    $reponse = $bdd->query('SELECT nomAgent, prenomAgent FROM liste_agents WHERE idAgent = ' . $idAgentsMission);
    $donnees = $reponse->fetch();
    $agentsMission = $donnees[1] . " " . $donnees[0];
    $reponse->closeCursor();
}

$contactsMission = "";
$idContactsMission = $data[6];
if (str_contains($idContactsMission, ",")) {
    $arrayIdContactsMission = preg_split("*,*", $idContactsMission);
    for ($i = 0; $i < count($arrayIdContactsMission); $i++) {
        if ($i != (count($arrayIdContactsMission) - 1)) {
            $reponse = $bdd->query('SELECT nomContact, prenomContact FROM liste_contacts WHERE idContact = ' . $arrayIdContactsMission[$i]);
            $donnees = $reponse->fetch();
            $contactsMission .= $donnees[1] . " " . $donnees[0] . ", ";
            $reponse->closeCursor();
        } else {
            $reponse = $bdd->query('SELECT nomContact, prenomContact FROM liste_contacts WHERE idContact = ' . $arrayIdContactsMission[$i]);
            $donnees = $reponse->fetch();
            $contactsMission .= $donnees[1] . " " . $donnees[0];
            $reponse->closeCursor();
        }
    }
} else {
    $arrayIdContactsMission = [];
    array_push($arrayIdContactsMission, $idContactsMission);
    $reponse = $bdd->query('SELECT nomContact, prenomContact FROM liste_contacts WHERE idContact = ' . $idContactsMission);
    $donnees = $reponse->fetch();
    $contactsMission = $donnees[1] . " " . $donnees[0];
    $reponse->closeCursor();
}

$ciblesMission = "";
$idCiblesMission = $data[7];
if (str_contains($idCiblesMission, ",")) {
    $arrayIdCiblesMission = preg_split("*,*", $idCiblesMission);
    for ($i = 0; $i < count($arrayIdCiblesMission); $i++) {
        if ($i != (count($arrayIdCiblesMission) - 1)) {
            $reponse = $bdd->query('SELECT nomCible, prenomCible FROM liste_cibles WHERE idCible = ' . $arrayIdCiblesMission[$i]);
            $donnees = $reponse->fetch();
            $ciblesMission .= $donnees[1] . " " . $donnees[0] . ", ";
            $reponse->closeCursor();
        } else {
            $reponse = $bdd->query('SELECT nomCible, prenomCible FROM liste_cibles WHERE idCible = ' . $arrayIdCiblesMission[$i]);
            $donnees = $reponse->fetch();
            $ciblesMission .= $donnees[1] . " " . $donnees[0];
            $reponse->closeCursor();
        }
    }
} else {
    $arrayIdCiblesMission = [];
    array_push($arrayIdCiblesMission, $idCiblesMission);
    $reponse = $bdd->query('SELECT nomCible, prenomCible FROM liste_cibles WHERE idCible = ' . $idCiblesMission);
    $donnees = $reponse->fetch();
    $ciblesMission = $donnees[1] . " " . $donnees[0];
    $reponse->closeCursor();
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

$planquesMission = "";
$idPlanquesMission = $data[10];
if (str_contains($idPlanquesMission, ",")) {
    $arrayIdPlanquesMission = preg_split("*,*", $idPlanquesMission);
    for ($i = 0; $i < count($arrayIdPlanquesMission); $i++) {
        if ($i != (count($arrayIdPlanquesMission) - 1)) {
            $reponse = $bdd->query('SELECT codePlanque, paysPlanque, adressePlanque FROM liste_planques WHERE idPlanque = ' . $arrayIdPlanquesMission[$i]);
            $donnees = $reponse->fetch();
            $newreponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $donnees[1]);
            $newdata = $newreponse->fetch();
            $planquesMission .= $donnees[0] . " : " . $newdata[0] . " - " . $donnees[2] . ", ";
            $reponse->closeCursor();
            $newreponse->closeCursor();
        } else {
            $reponse = $bdd->query('SELECT codePlanque, paysPlanque, adressePlanque FROM liste_planques WHERE idPlanque = ' . $arrayIdPlanquesMission[$i]);
            $donnees = $reponse->fetch();
            $newreponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $donnees[1]);
            $newdata = $newreponse->fetch();
            $planquesMission .= $donnees[0] . " : " . $newdata[0] . " - " . $donnees[2];
            $reponse->closeCursor();
            $newreponse->closeCursor();
        }
    }
} else {
    $arrayIdPlanquesMission = [];
    array_push($arrayIdPlanquesMission, $idPlanquesMission);
    $reponse = $bdd->query('SELECT codePlanque, paysPlanque, adressePlanque FROM liste_planques WHERE idPlanque = ' . $idPlanquesMission);
    $donnees = $reponse->fetch();
    $newreponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $donnees[1]);
    $newdata = $newreponse->fetch();
    $planquesMission .= $donnees[0] . " : " . $newdata[0] . " - " . $donnees[2];
    $reponse->closeCursor();
    $newreponse->closeCursor();
}

$idSpecialiteMission = $data[11];
$reponse = $bdd->query('SELECT designationSpecialiteMission FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $idSpecialiteMission);
$donnees = $reponse->fetch();
$specialiteMission = $donnees[0];

$dateDebutMission = $data[12];
$dateFinMission = $data[13];

$reponse->closeCursor();

$mission = new entityMission($idMission, $titreMission, $descriptionMission, $nomDeCodeMission, $paysMission, $agentsMission, $contactsMission, $ciblesMission, $typeMission, $statutMission, $planquesMission, $specialiteMission, $dateDebutMission, $dateFinMission);

$_SESSION['arrayIdAgentsMission'] = $arrayIdAgentsMission;
$_SESSION['arrayIdContactsMission'] = $arrayIdContactsMission;
$_SESSION['arrayIdCiblesMission'] = $arrayIdCiblesMission;
$_SESSION['arrayIdPlanquesMission'] = $arrayIdPlanquesMission;
$_SESSION['mission'] = $mission;
