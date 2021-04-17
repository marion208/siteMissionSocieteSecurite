<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM liste_missions');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();

$arrayMission = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idMission = $arrayResult[$i][0];
    $titreMission = $arrayResult[$i][1];
    $descriptionMission = $arrayResult[$i][2];
    $nomDeCodeMission = $arrayResult[$i][3];

    $idPaysMission = $arrayResult[$i][4];
    $reponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $idPaysMission);
    $donnees = $reponse->fetch();
    $paysMission = $donnees[0];

    $reponse->closeCursor();

    $agentsMission = "";
    $idAgentsMission = $arrayResult[$i][5];
    if (str_contains($idAgentsMission, ",")) {
        $arrayIdAgentsMission = preg_split("*,*", $idAgentsMission);
        for ($j = 0; $j < count($arrayIdAgentsMission); $j++) {
            if ($j != (count($arrayIdAgentsMission) - 1)) {
                $reponse = $bdd->query('SELECT nomAgent, prenomAgent FROM liste_agents WHERE idAgent = ' . $arrayIdAgentsMission[$j]);
                $donnees = $reponse->fetch();
                $agentsMission .= $donnees[1] . " " . $donnees[0] . ", ";
                $reponse->closeCursor();
            } else {
                $reponse = $bdd->query('SELECT nomAgent, prenomAgent FROM liste_agents WHERE idAgent = ' . $arrayIdAgentsMission[$j]);
                $donnees = $reponse->fetch();
                $agentsMission .= $donnees[1] . " " . $donnees[0];
                $reponse->closeCursor();
            }
        }
    } else {
        $reponse = $bdd->query('SELECT nomAgent, prenomAgent FROM liste_agents WHERE idAgent = ' . $idAgentsMission);
        $donnees = $reponse->fetch();
        $agentsMission = $donnees[1] . " " . $donnees[0];
        $reponse->closeCursor();
    }

    $contactsMission = "";
    $idContactsMission = $arrayResult[$i][6];
    if (str_contains($idContactsMission, ",")) {
        $arrayIdContactsMission = preg_split("*,*", $idContactsMission);
        for ($j = 0; $j < count($arrayIdContactsMission); $j++) {
            if ($j != (count($arrayIdContactsMission) - 1)) {
                $reponse = $bdd->query('SELECT nomContact, prenomContact FROM liste_contacts WHERE idContact = ' . $arrayIdContactsMission[$j]);
                $donnees = $reponse->fetch();
                $contactsMission .= $donnees[1] . " " . $donnees[0] . ", ";
                $reponse->closeCursor();
            } else {
                $reponse = $bdd->query('SELECT nomContact, prenomContact FROM liste_contacts WHERE idContact = ' . $arrayIdContactsMission[$j]);
                $donnees = $reponse->fetch();
                $contactsMission .= $donnees[1] . " " . $donnees[0];
                $reponse->closeCursor();
            }
        }
    } else {
        $reponse = $bdd->query('SELECT nomContact, prenomContact FROM liste_contacts WHERE idContact = ' . $idContactsMission);
        $donnees = $reponse->fetch();
        $contactsMission = $donnees[1] . " " . $donnees[0];
        $reponse->closeCursor();
    }

    $ciblesMission = "";
    $idCiblesMission = $arrayResult[$i][7];
    if (str_contains($idCiblesMission, ",")) {
        $arrayIdCiblesMission = preg_split("*,*", $idCiblesMission);
        for ($j = 0; $j < count($arrayIdCiblesMission); $j++) {
            if ($j != (count($arrayIdCiblesMission) - 1)) {
                $reponse = $bdd->query('SELECT nomCible, prenomCible FROM liste_cibles WHERE idCible = ' . $arrayIdCiblesMission[$j]);
                $donnees = $reponse->fetch();
                $ciblesMission .= $donnees[1] . " " . $donnees[0] . ", ";
                $reponse->closeCursor();
            } else {
                $reponse = $bdd->query('SELECT nomCible, prenomCible FROM liste_cibles WHERE idCible = ' . $arrayIdCiblesMission[$j]);
                $donnees = $reponse->fetch();
                $ciblesMission .= $donnees[1] . " " . $donnees[0];
                $reponse->closeCursor();
            }
        }
    } else {
        $reponse = $bdd->query('SELECT nomCible, prenomCible FROM liste_cibles WHERE idCible = ' . $idCiblesMission);
        $donnees = $reponse->fetch();
        $ciblesMission = $donnees[1] . " " . $donnees[0];
        $reponse->closeCursor();
    }

    $idTypeMission = $arrayResult[$i][8];
    $reponse = $bdd->query('SELECT designationTypeMission FROM types_missions WHERE idTypeMission = ' . $idTypeMission);
    $donnees = $reponse->fetch();
    $typeMission = $donnees[0];
    $reponse->closeCursor();

    $idStatutMission = $arrayResult[$i][9];
    $reponse = $bdd->query('SELECT designationStatutMission FROM liste_statuts_mission WHERE idStatutMission = ' . $idStatutMission);
    $donnees = $reponse->fetch();
    $statutMission = $donnees[0];
    $reponse->closeCursor();

    $planquesMission = "";
    $idPlanquesMission = $arrayResult[$i][10];
    if (str_contains($idPlanquesMission, ",")) {
        $arrayIdPlanquesMission = preg_split("*,*", $idPlanquesMission);
        for ($j = 0; $j < count($arrayIdPlanquesMission); $j++) {
            if ($j != (count($arrayIdPlanquesMission) - 1)) {
                $reponse = $bdd->query('SELECT codePlanque, paysPlanque, adressePlanque FROM liste_planques WHERE idPlanque = ' . $arrayIdPlanquesMission[$j]);
                $donnees = $reponse->fetch();
                $newreponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $donnees[1]);
                $newdata = $newreponse->fetch();
                $planquesMission .= $donnees[0] . " : " . $newdata[0] . " - " . $donnees[2] . ", ";
                $reponse->closeCursor();
                $newreponse->closeCursor();
            } else {
                $reponse = $bdd->query('SELECT codePlanque, paysPlanque, adressePlanque FROM liste_planques WHERE idPlanque = ' . $arrayIdPlanquesMission[$j]);
                $donnees = $reponse->fetch();
                $newreponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $donnees[1]);
                $newdata = $newreponse->fetch();
                $planquesMission .= $donnees[0] . " : " . $newdata[0] . " - " . $donnees[2];
                $reponse->closeCursor();
                $newreponse->closeCursor();
            }
        }
    } else {
        $reponse = $bdd->query('SELECT codePlanque, paysPlanque, adressePlanque FROM liste_planques WHERE idPlanque = ' . $idPlanquesMission);
        $donnees = $reponse->fetch();
        $newreponse = $bdd->query('SELECT designationPays FROM liste_pays WHERE idPays = ' . $donnees[1]);
        $newdata = $newreponse->fetch();
        $planquesMission = $donnees[0] . " : " . $newdata[0] . " - " . $donnees[2];
        $reponse->closeCursor();
        $newreponse->closeCursor();
    }

    $idSpecialiteRequisePourLaMission = $arrayResult[$i][11];
    $reponse = $bdd->query('SELECT designationSpecialiteMission FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $idSpecialiteRequisePourLaMission);
    $donnees = $reponse->fetch();
    $specialiteRequisePourLaMission = $donnees[0];
    $reponse->closeCursor();

    $dateDeDebutDeLaMission = $arrayResult[$i][12];
    $dateDeFinDeLaMission = $arrayResult[$i][13];

    $mission = new entityMission($idMission, $titreMission, $descriptionMission, $nomDeCodeMission, $paysMission, $agentsMission, $contactsMission, $ciblesMission, $typeMission, $statutMission, $planquesMission, $specialiteRequisePourLaMission, $dateDeDebutDeLaMission, $dateDeFinDeLaMission);
    array_push($arrayMission, $mission);
}

$_SESSION['arrayMission'] = $arrayMission;
