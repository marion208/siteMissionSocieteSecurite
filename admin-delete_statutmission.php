<?php
session_start();
if (isset($_SESSION['findUserAdmin'])) {
    if ($_SESSION['findUserAdmin'] == 'true') {
        $idStatutMission = $_GET['id'];
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
                    <a class="navbar-brand" href="/admin-liste_statuts_mission.php"><img src="/open-iconic-master/svg/arrow-left.svg" style="zoom: 200%;"> Retour à la liste des statuts de mission</a>
                </div>
            </nav>

            <?php
            // Vérifier si le statut de mission existe en base de données
            include 'controller/controller_statutmission.php';
            $controller = new ControllerStatutMission();
            $controller->checkIfStatutOfMissionExistsWithIdInDB();
            $boolStatutMissionExists = $_SESSION['boolStatutMissionExists'];

            // Si aucun statut de mission existe avec l'identifiant donné, on affiche un message associé pour prévenir l'utilisateur
            if ($boolStatutMissionExists == 0) {
                include 'views/messageNoStatutMissionWithThisIdInDB.php';
            }
            // Sinon on supprime le statut de mission de la base de données
            else {
            ?>
                <div class="container">
                    Confirmez-vous la suppression du statut de mission ci-dessous ?
                <?php
                $controller->searchInfoforStatutMissionId();
            }
                ?>
                <br>
                <a href="/models/deleteStatutMission.php?id=<?php echo $idStatutMission; ?>">
                    <button class="btn btn-primary">Confirmer la suppression</button>
                </a>
                </div>
                <?php
                if (isset($_SESSION['listErrorsForm'])) {
                ?>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        $listErrors = $_SESSION['listErrorsForm'];
                        foreach ($listErrors as $error) {
                        ?>
                            <p><?php echo $error; ?></p>
                        <?php
                        }
                        unset($_SESSION['listErrorsForm']);
                        ?>
                    </div>
                <?php
                }
                ?>
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
