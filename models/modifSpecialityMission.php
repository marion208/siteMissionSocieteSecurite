<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$idSpecialityMission = $_GET['id'];

$listErrors = [];

$designationSpecialityMission = $_POST['designation'];
if (!preg_match("/^[A-Za-zÀ-ú -]*$/", $designationSpecialityMission)) {
    array_push($listErrors, "La désignation indiquée doit contenir uniquement des lettres, des espaces ou des tirets.");
}
if (strlen($designationSpecialityMission) > 200) {
    array_push($listErrors, "La désignation indiquée est trop longue.");
}
if (strlen($designationSpecialityMission) <= 2) {
    array_push($listErrors, "La désignation indiquée est trop courte. Elle doit contenir au moins 2 caractères.");
}

if (count($listErrors) == 0) {
    $req = $bdd->prepare('UPDATE liste_specialites_mission SET designationSpecialiteMission = ? WHERE idSpecialiteMission = ?');
    $req->execute(array($designationSpecialityMission, $idSpecialityMission));

    header("Location: http://localhost/admin-liste_specialites_mission.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-modif_specialitemission.php?id=" . $idSpecialityMission);
    exit;
}
