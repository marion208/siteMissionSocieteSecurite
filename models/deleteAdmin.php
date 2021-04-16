<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$idAdmin = $_GET['id'];

$listErrors = [];

$request = $bdd->query('SELECT COUNT(*) FROM liste_admins');
$donnees = $request->fetch();
if ($donnees[0] != 0) {
    array_push($listErrors, "Vous ne pouvez pas supprimer cet administrateur : c'est le dernier administrateur de votre application.");
}

$request->closeCursor();

if (count($listErrors) == 0) {
    $req = $bdd->exec('DELETE FROM liste_admins WHERE idAdmin = ' . $idAdmin);

    header("Location: http://localhost/admin-liste_admins.php");
    exit;
} else {
    session_start();
    $_SESSION['listErrorsForm'] = $listErrors;
    header("Location: http://localhost/admin-delete_admin.php?id=" . $idAdmin);
    exit;
}
