<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$listErrors = [];

$designation = $_POST['designation'];
if (!preg_match("/^[A-Za-zÀ-ú \-]*$/", $designation)) {
    array_push($listErrors, "La désignation doit contenir uniquement des lettres, des espaces, ou des tirets.");
}
if (strlen($designation) > 200) {
    array_push($listErrors, "La désignation indiquée est trop longue.");
}
if (strlen(trim($designation)) <= 2) {
    array_push($listErrors, "La désignation indiquée est trop courte. Elle doit contenir au moins 2 caractères.");
}

if (count($listErrors) == 0) {
    $req = $bdd->prepare('INSERT INTO liste_type_planques (designationTypePlanque) VALUES(?)');
    $req->execute(array($designation));

    header("Location: http://localhost/admin-liste_type_planques.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-add_typeplanque.php");
    exit;
}
