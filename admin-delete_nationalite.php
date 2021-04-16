<?php
session_start();
if (isset($_SESSION['findUserAdmin'])) {
    if ($_SESSION['findUserAdmin'] == 'true') {
        $idNationalite = $_GET['id'];
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
                    <a class="navbar-brand" href="/admin-liste_nationalites.php"><img src="/open-iconic-master/svg/arrow-left.svg" style="zoom: 200%;"> Retour à la liste des nationalités</a>
                </div>
            </nav>

            <?php
            // Vérifier si la nationalité existe en base de données
            include 'controller/controller_nationalite.php';
            $controller = new ControllerNationalite();
            $controller->checkIfNationaliteExistsWithIdInDB();
            $boolNationaliteExists = $_SESSION['boolNationaliteExists'];

            // Si aucune nationalité existe avec l'identifiant donné, on affiche un message associé pour prévenir l'utilisateur
            if ($boolNationaliteExists == 0) {
                include 'views/messageNoNationaliteWithThisIdInDB.php';
            }
            // Sinon on supprime la nationalité de la base de données
            else {
            ?>
                <div class="container">
                    Confirmez-vous la suppression de la nationalité ci-dessous ?
                <?php
                $controller->searchInfoforNationalityId();
            }
                ?>
                <br>
                <a href="/models/deleteNationality.php?id=<?php echo $idNationalite; ?>">
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
