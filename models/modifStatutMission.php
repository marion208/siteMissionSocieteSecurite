<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$idStatutMission = $_GET['id'];

$listErrors = [];

$designationStatutMission = $_POST['designation'];
if (!preg_match("/^[A-Za-zÀ-ú]*$/", $designationStatutMission)) {
    array_push($listErrors, "La désignation indiquée doit contenir uniquement des lettres.");
}
if (strlen($designationStatutMission) > 200) {
    array_push($listErrors, "La désignation indiquée est trop longue.");
}
if (strlen($designationStatutMission) <= 2) {
    array_push($listErrors, "La désignation indiquée est trop courte. Elle doit contenir au moins 2 caractères.");
}

if (count($listErrors) == 0) {
    $req = $bdd->prepare('UPDATE liste_statuts_mission SET designationStatutMission = ? WHERE idStatutMission = ?');
    $req->execute(array($designationStatutMission, $idStatutMission));

    header("Location: http://localhost/admin-liste_statuts_mission.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-modif_statutmission.php?id=" . $idStatutMission);
    exit;
}
