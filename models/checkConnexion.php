<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT mailAdmin, motDePasseAdmin FROM liste_admins');

$findUserAdmin = false;

while ($donnees = $reponse->fetch()) {
    if ($donnees['mailAdmin'] == $_POST['inputEmail']) {
        if ($donnees['motDePasseAdmin'] == $_POST['inputPassword']) {
            $findUserAdmin = true;
        }
    }
}

$reponse->closeCursor();

session_start();

if ($findUserAdmin == true) {
    $_SESSION['findUserAdmin'] = true;
    header("Location: http://localhost/admin.php");
    exit;
} else {
    $_SESSION['findUserAdmin'] = false;
    header("Location: http://localhost/connexion.php");
    exit;
}
