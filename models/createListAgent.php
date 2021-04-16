<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM liste_agents');

$arrayResult = [];
while ($donnees = $reponse->fetch()) {
    array_push($arrayResult, $donnees);
}

$reponse->closeCursor();


$arrayAgent = [];
for ($i = 0; $i < count($arrayResult); $i++) {
    $idAgent = $arrayResult[$i][0];
    $nomAgent = $arrayResult[$i][1];
    $prenomAgent = $arrayResult[$i][2];
    $DateDeNaissanceAgent = $arrayResult[$i][3];
    $codeIdentificationAgent = $arrayResult[$i][4];

    $idNationaliteAgent = $arrayResult[$i][5];
    $reponse = $bdd->query('SELECT designationNationalite FROM liste_nationalites WHERE idNationalite = ' . $idNationaliteAgent);
    $donnees = $reponse->fetch();
    $nationaliteAgent = $donnees[0];

    $reponse->closeCursor();

    $specialiteAgent = "";

    $idSpecialiteAgent = $arrayResult[$i][6];
    if (str_contains($idSpecialiteAgent, ",")) {
        $arrayIdSpecialiteAgent = preg_split("*,*", $idSpecialiteAgent);
        for ($j = 0; $j < count($arrayIdSpecialiteAgent); $j++) {
            if ($j != (count($arrayIdSpecialiteAgent) - 1)) {
                $reponse = $bdd->query('SELECT designationSpecialiteMission FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $arrayIdSpecialiteAgent[$j]);
                $donnees = $reponse->fetch();
                $specialiteAgent .= $donnees[0] . ", ";
                $reponse->closeCursor();
            } else {
                $reponse = $bdd->query('SELECT designationSpecialiteMission FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $arrayIdSpecialiteAgent[$j]);
                $donnees = $reponse->fetch();
                $specialiteAgent .= $donnees[0];
                $reponse->closeCursor();
            }
        }
    } else {
        $reponse = $bdd->query('SELECT designationSpecialiteMission FROM liste_specialites_mission WHERE idSpecialiteMission = ' . $idSpecialiteAgent);
        $donnees = $reponse->fetch();
        $specialiteAgent = $donnees[0];
        $reponse->closeCursor();
    }

    $agent = new entityAgent($idAgent, $nomAgent, $prenomAgent, $DateDeNaissanceAgent, $codeIdentificationAgent, $nationaliteAgent, $specialiteAgent);
    array_push($arrayAgent, $agent);
}

$_SESSION['arrayAgent'] = $arrayAgent;
