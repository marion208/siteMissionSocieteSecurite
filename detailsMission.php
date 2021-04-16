<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Détails de la mission</title>
    <!-- Bootstrap CSS -->
    <link href="/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Our CSS -->
    <!--<link rel="stylesheet" href="style.css">-->
</head>

<body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/homepage.php">Retour à l'accueil</a>
            <a class="navbar-brand ml-auto" href="/admin.php">Espace d'administrateur</a>
        </div>
    </nav>

    <div class="alert alert-primary" role="alert">
        <h3>Détails de la mission</h3>
    </div>

    <?php
    // On vérifie si l'id de la mission passé existe bien en base de données
    include 'controller/controller_mission.php';
    $controller = new ControllerMission();
    $controller->checkIfMissionExistWithIdInDB();
    $boolMissionExists = $_SESSION['boolMissionExists'];

    // Si aucune mission n'existe, on affiche un message associé pour prévenir l'utilisateur.
    if ($boolMissionExists == 0) {
        include 'views/messageNoMissionWithThisIdInDB.php';
    }
    // Sinon on importe les détailes de la mission
    else {
        $controller->detailsMission();
        include 'views/missionWithDetails.php';
    }
    ?>

    <!-- jQuery -->
    <script src="jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>