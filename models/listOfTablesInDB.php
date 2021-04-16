<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_missions;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$buttons = [];

$reponse = $bdd->query('show tables');
while ($donnees = $reponse->fetch()) {
    array_push($buttons, $donnees[0]);
}

$reponse->closeCursor();

$_SESSION['buttons'] = $buttons;
