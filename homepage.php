<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Accueil</title>
    <!-- Bootstrap CSS -->
    <link href="/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Our CSS -->
    <!--<link rel="stylesheet" href="style.css">-->
</head>

<body>
    <h1>Bienvenue sur cette application de gestion de missions top secrètes</h1>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand ml-auto" href="/admin.php">Espace d'administrateur</a>
        </div>
    </nav>
    <div class="alert alert-primary" role="alert">
        <h3>Liste des missions</h3>
    </div>
    <?php
    // Vérifier s'il y a des missions en base de données
    include 'controller/controller_mission.php';
    $controller = new ControllerMission();
    $controller->checkIfMissionInDB();
    $nbMissionInDB = $_SESSION['nbMissionInDB'];

    // Si aucune mission en base de données, on affiche un message associé pour prévenir l'utilisateur
    if ($nbMissionInDB == 0) {
        include 'views/messageNoMissionInDB.php';
    }
    // Sinon on importe la liste des missions présentes en base de données
    else {
        $controller->listOfMissionsWithoutDetails();
    }
    ?>

    <!-- jQuery -->
    <script src="jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>