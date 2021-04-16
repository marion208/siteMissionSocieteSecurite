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

    $idAgentsMission = $arrayResult[$i][5];
    $reponse = $bdd->query('SELECT nomAgent, prenomAgent FROM liste_agents WHERE idAgent = ' . $idAgentsMission);
    $donnees = $reponse->fetch();
    $agentsMission = $donnees[1] . " " . $donnees[0];

    $reponse->closeCursor();

    $idContactsMission = $arrayResult[$i][6];
    $reponse = $bdd->query('SELECT nomContact, prenomContact FROM liste_contacts WHERE idContact = ' . $idContactsMission);
    $donnees = $reponse->fetch();
    $contactsMission = $donnees[1] . " " . $donnees[0];

    $reponse->closeCursor();

    $idCiblesMission = $arrayResult[$i][7];
    $reponse = $bdd->query('SELECT nomCible, prenomCible FROM liste_cibles WHERE idCible = ' . $idCiblesMission);
    $donnees = $reponse->fetch();
    $ciblesMission = $donnees[1] . " " . $donnees[0];

    $reponse->closeCursor();

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


    $idPlanquesMission = $arrayResult[$i][10];
    $reponse = $bdd->query('SELECT codePlanque, adressePlanque FROM liste_planques WHERE idPlanque = ' . $idPlanquesMission);
    $donnees = $reponse->fetch();
    $planquesMission = $donnees[1] . " " . $donnees[0];

    $reponse->closeCursor();

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
