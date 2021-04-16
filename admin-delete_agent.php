<?php
session_start();
if (isset($_SESSION['findUserAdmin'])) {
    if ($_SESSION['findUserAdmin'] == 'true') {
        $idAgent = $_GET['id'];
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
                    <a class="navbar-brand" href="/admin-liste_agents.php"><img src="/open-iconic-master/svg/arrow-left.svg" style="zoom: 200%;"> Retour à la liste des agents</a>
                </div>
            </nav>

            <?php
            // Vérifier si l'agent existe en base de données
            include 'controller/controller_agent.php';
            $controller = new ControllerAgent();
            $controller->checkIfAgentExistsWithIdInDB();
            $boolAgentExists = $_SESSION['boolAgentExists'];

            // Si aucun agent existe avec l'identifiant donné, on affiche un message associé pour prévenir l'utilisateur
            if ($boolAgentExists == 0) {
                include 'views/messageNoAgentWithThisInDB.php';
            }
            // Sinon on supprime l'agent de la base de données
            else {
            ?>
                <div class="container">
                    Confirmez-vous la suppression de l'agent ci-dessous ?
                <?php
                $controller->searchInfoforAgentId();
            }
                ?>
                <br>
                <a href="/models/deleteAgent.php?id=<?php echo $idAgent; ?>">
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
