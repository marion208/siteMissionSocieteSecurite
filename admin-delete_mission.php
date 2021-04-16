<?php
session_start();
if (isset($_SESSION['findUserAdmin'])) {
    if ($_SESSION['findUserAdmin'] == 'true') {
        $idCible = $_GET['id'];
?>

        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Panneau d'administration</title>
            <!-- Bootstrap CSS -->
            <link href="/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Our CSS -->
            <!--<link rel="stylesheet" href="style.css">-->
        </head>

        <body>
            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/homepage.php">Accueil du site</a>
                    <a class="navbar-brand" href="/admin.php">Accueil de l'interface d'administration</a>
                    <a class="navbar-brand" href="/deconnexion.php">Déconnexion</a>
                </div>
            </nav>

            <div class="alert alert-primary" role="alert">
                Interface d'administration
            </div>

            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/admin-liste_missions.php"><img src="/open-iconic-master/svg/arrow-left.svg" style="zoom: 200%;"> Retour à la liste des missions</a>
                </div>
            </nav>

            <?php
            // Vérifier si la mission existe en base de données
            include 'controller/controller_mission.php';
            $controller = new ControllerMission();
            $controller->checkIfMissionExistsWithIdInDB();
            $boolMissionExists = $_SESSION['boolMissionExists'];

            // Si aucune mission existe avec l'identifiant donné, on affiche un message associé pour prévenir l'utilisateur
            if ($boolMissionExists == 0) {
                include 'views/messageNoMissionWithThisIdInDB.php';
            }
            // Sinon on supprime la cible de la base de données
            else {
            ?>
                <div class="container">
                    Confirmez-vous la suppression de la mission ci-dessous ?
                <?php
                $controller->searchInfoforMissionId();
            }
                ?>
                <br>
                <a href="/models/deleteMission.php?id=<?php echo $idCible; ?>">
                    <button class="btn btn-primary">Confirmer la suppression</button>
                </a>
                </div>
                <!-- jQuery -->
                <script src="jquery-3.6.0.min.js"></script>
                <!-- Bootstrap JavaScript -->
                <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>




<?php
    } else {
        header("Location: http://localhost/connexion.php");
        exit;
    }
} else {
    header("Location: http://localhost/connexion.php");
    exit;
}