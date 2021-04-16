<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idMission = $_GET['id'];
$req = $bdd->exec('DELETE FROM liste_missions WHERE idMission = ' . $idMission);

header("Location: http://localhost/admin-liste_missions.php");
exit;
