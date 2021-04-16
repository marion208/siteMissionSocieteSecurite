<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idAgent = $_GET['id'];
$reponse = $bdd->query('SELECT * FROM liste_agents WHERE idAgent = ' . $idAgent);

$data = $reponse->fetch();
$idAgent = $data[0];
$nomAgent = $data[1];
$prenomAgent = $data[2];
$dateDeNaissanceAgent = $data[3];
$codeIdentificationAgent = $data[4];

$idNationaliteAgent = $data[5];
$reponse = $bdd->query('SELECT designationNationalite FROM liste_nationalites WHERE idNationalite = ' . $idNationaliteAgent);
$donnees = $reponse->fetch();
$nationaliteAgent = $donnees[0];

$specialiteAgent = "";
$idSpecialiteAgent = $data[6];
if (str_contains($idSpecialiteAgent, ",")) {
    $arrayIdSpecialiteAgent = preg_split("*,*", $idSpecialiteAgent);
    for ($i = 0; $i < count($arrayIdSpecialiteAgent); $i++) {
        if ($i != (count($arrayIdSpecialiteAgent) - 1)) {
            $reponse = $bdd->query('SELECT designationSpecialiteMission FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $arrayIdSpecialiteAgent[$i]);
            $donnees = $reponse->fetch();
            $specialiteAgent .= $donnees[0] . ", ";
            $reponse->closeCursor();
        } else {
            $reponse = $bdd->query('SELECT designationSpecialiteMission FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $arrayIdSpecialiteAgent[$i]);
            $donnees = $reponse->fetch();
            $specialiteAgent .= $donnees[0];
            $reponse->closeCursor();
        }
    }
} else {
    $arrayIdSpecialiteAgent = [];
    array_push($arrayIdSpecialiteAgent, $idSpecialiteAgent);
    $reponse = $bdd->query('SELECT designationSpecialiteMission FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $idSpecialiteAgent);
    $donnees = $reponse->fetch();
    $specialiteAgent = $donnees[0];
    $reponse->closeCursor();
}

$reponse->closeCursor();

$agent = new entityAgent($idAgent, $nomAgent, $prenomAgent, $dateDeNaissanceAgent, $codeIdentificationAgent, $nationaliteAgent, $specialiteAgent);

$_SESSION['arrayIdSpecialiteAgent'] = $arrayIdSpecialiteAgent;
$_SESSION['agent'] = $agent;
