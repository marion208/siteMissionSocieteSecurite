<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idMission = $_GET['id'];

$listErrors = [];

$titreMission = $_POST['titreMission'];
if (strlen($titreMission) > 200) {
    array_push($listErrors, "Le titre de la mission indiqué est trop long.");
}
if (strlen($titreMission) <= 2) {
    array_push($listErrors, "Le titre de la mission indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$description = $_POST['description'];
if (strlen($description) > 200) {
    array_push($listErrors, "La description indiquée est trop longue.");
}
if (strlen($description) <= 2) {
    array_push($listErrors, "La description indiquée est trop courte. Il doit contenir au moins 2 caractères.");
}

$nomDeCodeMission = $_POST['nomDeCodeMission'];
if (strlen($nomDeCodeMission) > 200) {
    array_push($listErrors, "Le nom de code indiqué est trop long.");
}
if (strlen($nomDeCodeMission) <= 2) {
    array_push($listErrors, "Le nom de code indiqué est trop court. Il doit contenir au moins 2 caractères.");
}

$country = $_POST['country'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_pays WHERE idPays = ?');
$req->execute(array($country));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "Le pays renseigné n'existe pas.");
}

$req->closeCursor();

if (isset($_POST['agent']) && !empty($_POST['agent'])) {
    $agent = "";
    $arrayAgent = $_POST['agent'];
    if (count($arrayAgent) == 1) {
        $req = $bdd->prepare('SELECT COUNT(*) FROM liste_agents WHERE idAgent = ?');
        $req->execute(array($arrayAgent[0]));
        $donnees = $req->fetch();
        if ($donnees[0] == 0) {
            array_push($listErrors, "L'agent renseigné n'existe pas.");
        } else {
            $agent = $arrayAgent[0];
        }
    } else {
        for ($i = 0; $i < count($arrayAgent); $i++) {
            $req = $bdd->prepare('SELECT COUNT(*) FROM liste_agents WHERE idAgent = ?');
            $req->execute(array($arrayAgent[$i]));
            $donnees = $req->fetch();
            if ($i == (count($arrayAgent) - 1)) {
                if ($donnees[0] == 0) {
                    array_push($listErrors, "L'agent renseigné n'existe pas.");
                } else {
                    $agent .= $arrayAgent[$i];
                }
            } else {
                if ($donnees[0] == 0) {
                    array_push($listErrors, "L'agent renseigné n'existe pas.");
                } else {
                    $agent .= $arrayAgent[$i] . ",";
                }
            }
        }
    }
}

if (!isset($_POST['agent']) || empty($_POST['agent'])) {
    array_push($listErrors, "Vous devez renseigner au moins un agent.");
}

$req->closeCursor();

if (isset($_POST['contact']) && !empty($_POST['contact'])) {
    $contact = "";
    $arrayContact = $_POST['contact'];
    if (count($arrayContact) == 1) {
        $req = $bdd->prepare('SELECT COUNT(*) FROM liste_contacts WHERE idContact = ?');
        $req->execute(array($arrayContact[0]));
        $donnees = $req->fetch();
        if ($donnees[0] == 0) {
            array_push($listErrors, "Le contact renseigné n'existe pas.");
        } else {
            $contact = $arrayContact[0];
        }
    } else {
        for ($i = 0; $i < count($arrayContact); $i++) {
            $req = $bdd->prepare('SELECT COUNT(*) FROM liste_contacts WHERE idContact = ?');
            $req->execute(array($arrayContact[$i]));
            $donnees = $req->fetch();
            if ($i == (count($arrayContact) - 1)) {
                if ($donnees[0] == 0) {
                    array_push($listErrors, "Le contact renseigné n'existe pas.");
                } else {
                    $contact .= $arrayContact[$i];
                }
            } else {
                if ($donnees[0] == 0) {
                    array_push($listErrors, "Le contact renseigné n'existe pas.");
                } else {
                    $contact .= $arrayContact[$i] . ",";
                }
            }
        }
    }
}

if (!isset($_POST['contact']) || empty($_POST['contact'])) {
    array_push($listErrors, "Vous devez renseigner au moins un contact.");
}

$req->closeCursor();

if (isset($_POST['cible']) && !empty($_POST['cible'])) {
    $cible = "";
    $arrayCible = $_POST['cible'];
    if (count($arrayCible) == 1) {
        $req = $bdd->prepare('SELECT COUNT(*) FROM liste_cibles WHERE idCible = ?');
        $req->execute(array($arrayCible[0]));
        $donnees = $req->fetch();
        if ($donnees[0] == 0) {
            array_push($listErrors, "La cible renseigné n'existe pas.");
        } else {
            $cible = $arrayCible[0];
        }
    } else {
        for ($i = 0; $i < count($arrayCible); $i++) {
            $req = $bdd->prepare('SELECT COUNT(*) FROM liste_cibles WHERE idCible = ?');
            $req->execute(array($arrayCible[$i]));
            $donnees = $req->fetch();
            if ($i == (count($arrayCible) - 1)) {
                if ($donnees[0] == 0) {
                    array_push($listErrors, "La cible renseigné n'existe pas.");
                } else {
                    $cible .= $arrayCible[$i];
                }
            } else {
                if ($donnees[0] == 0) {
                    array_push($listErrors, "La cible renseigné n'existe pas.");
                } else {
                    $cible .= $arrayCible[$i] . ",";
                }
            }
        }
    }
}

if (!isset($_POST['cible']) || empty($_POST['cible'])) {
    array_push($listErrors, "Vous devez renseigner au moins une cible.");
}

$req->closeCursor();

$typeMission = $_POST['typeMission'];
$req = $bdd->prepare('SELECT COUNT(*) FROM types_missions WHERE idTypeMission = ?');
$req->execute(array($typeMission));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "Le type de mission renseigné n'existe pas.");
}

$req->closeCursor();

$statutMission = $_POST['statutMission'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_statuts_mission WHERE idStatutMission = ?');
$req->execute(array($statutMission));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "Le statut de mission renseigné n'existe pas.");
}

$req->closeCursor();

if (isset($_POST['planque']) && !empty($_POST['planque'])) {
    $planque = "";
    $arrayPlanque = $_POST['planque'];
    if (count($arrayPlanque) == 1) {
        $req = $bdd->prepare('SELECT COUNT(*) FROM liste_planques WHERE idPlanque = ?');
        $req->execute(array($arrayPlanque[0]));
        $donnees = $req->fetch();
        if ($donnees[0] == 0) {
            array_push($listErrors, "La planque renseignée n'existe pas.");
        } else {
            $planque = $arrayPlanque[0];
        }
    } else {
        for ($i = 0; $i < count($arrayPlanque); $i++) {
            $req = $bdd->prepare('SELECT COUNT(*) FROM liste_planques WHERE idPlanque = ?');
            $req->execute(array($arrayPlanque[$i]));
            $donnees = $req->fetch();
            if ($i == (count($arrayPlanque) - 1)) {
                if ($donnees[0] == 0) {
                    array_push($listErrors, "La planque renseignée n'existe pas.");
                } else {
                    $planque .= $arrayPlanque[$i];
                }
            } else {
                if ($donnees[0] == 0) {
                    array_push($listErrors, "La planque renseignée n'existe pas.");
                } else {
                    $planque .= $arrayPlanque[$i] . ",";
                }
            }
        }
    }
}

if (!isset($_POST['planque']) || empty($_POST['planque'])) {
    array_push($listErrors, "Vous devez renseigner au moins une planque.");
}

$req->closeCursor();

$specialite = $_POST['specialite'];
$req = $bdd->prepare('SELECT COUNT(*) FROM liste_specialites_mission WHERE idSpecialiteMission = ?');
$req->execute(array($specialite));
$donnees = $req->fetch();
if ($donnees[0] == 0) {
    array_push($listErrors, "La spécialité renseignée n'existe pas.");
}

$req->closeCursor();

$dateDebutMission = $_POST['dateDebutMission'];
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dateDebutMission)) {
    array_push($listErrors, "Le format de date de début de la mission renseigné n'est pas bon.");
}

$dateFinMission = $_POST['dateFinMission'];
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dateFinMission)) {
    array_push($listErrors, "Le format de date de fin de la mission renseigné n'est pas bon.");
}

// Vérification que la ou les cibles n'ont pas la même nationalité que le ou les agents
if (isset($_POST['cible']) && !empty($_POST['cible']) && isset($_POST['agent']) && !empty($_POST['agent'])) {
    $arrayCible = $_POST['cible'];
    $arrayIdNationaliteCible = [];
    for ($i = 0; $i < count($arrayCible); $i++) {
        $req = $bdd->prepare('SELECT nationaliteCible FROM liste_cibles WHERE idCible = ?');
        $req->execute(array($arrayCible[$i]));
        $donnees = $req->fetch();
        array_push($arrayIdNationaliteCible, $donnees[0]);
    }
    $arrayAgent = $_POST['agent'];
    $arrayIdNationaliteAgent = [];
    for ($i = 0; $i < count($arrayAgent); $i++) {
        $req = $bdd->prepare('SELECT nationaliteAgent FROM liste_agents WHERE idAgent = ?');
        $req->execute(array($arrayAgent[$i]));
        $donnees = $req->fetch();
        array_push($arrayIdNationaliteAgent, $donnees[0]);
    }

    for ($i = 0; $i < count($arrayIdNationaliteCible); $i++) {
        if (in_array($arrayIdNationaliteCible[$i], $arrayIdNationaliteAgent)) {
            array_push($listErrors, "La ou les cibles ne peuvent pas avoir la même nationalité que le ou les agents.");
        }
    }
}

// Vérification que la planque soit bien dans le pays de la mission
if (isset($_POST['planque']) && !empty($_POST['planque'])) {
    $arrayPlanque = $_POST['planque'];
    for ($i = 0; $i < count($arrayPlanque); $i++) {
        $req = $bdd->prepare('SELECT paysPlanque FROM liste_planques WHERE idPlanque = ?');
        $req->execute(array($arrayPlanque[$i]));
        $donnees = $req->fetch();
        if ($donnees[0] != $country) {
            array_push($listErrors, "La ou les planques doivent obligatoirement être dans le même pays que la mission.");
        }
    }
}

// Vérification qu'au moins un agent dispose de la spécialité requise pour la mission
if (isset($_POST['agent']) && !empty($_POST['agent'])) {
    $arrayAgent = $_POST['agent'];
    $checkOK = "";
    for ($i = 0; $i < count($arrayAgent); $i++) {
        $req = $bdd->prepare('SELECT specialitesAgent FROM liste_agents WHERE idAgent = ?');
        $req->execute(array($arrayAgent[$i]));
        $donnees = $req->fetch();
        if ($donnees[0] == $_POST['specialite']) {
            $checkOK .= "OK";
        }
    }
    if (!str_contains("OK", $checkOK)) {
        array_push($listErrors, "Il faut assigner au moins 1 agent disposant de la spécialité requise.");
    }
}

if (count($listErrors) == 0) {
    $req = $bdd->prepare('UPDATE liste_missions SET titreMission = ?, descriptionMission = ?, nomDeCodeMission = ?, paysMission = ?, agentsMission = ?, contactsMission = ?, ciblesMission = ?, typeMission = ?, statutMission = ?, planquesMission = ?, specialiteRequisePourLaMission = ?, dateDeDebutDeLaMission = ?, dateDeFinDeLaMission = ? WHERE idMission = ?');
    $req->execute(array($titreMission, $description, $nomDeCodeMission, $country, $agent, $contact, $cible, $typeMission, $statutMission, $planque, $specialite, $dateDebutMission, $dateFinMission, $idMission));

    header("Location: http://localhost/admin-liste_missions.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-modif_mission.php?id=" . $idMission);
    exit;
}
