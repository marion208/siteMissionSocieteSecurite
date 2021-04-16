<?php
session_start();
if (isset($_SESSION['findUserAdmin'])) {
    if ($_SESSION['findUserAdmin'] == 'true') {
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
                    <a class="navbar-brand" href="/admin.php"><img src="/open-iconic-master/svg/arrow-left.svg" style="zoom: 200%;"> Retour à la liste des tables</a>
                </div>
            </nav>
            <br>

            <div class="container">
                <div class="alert alert-dark" role="alert">
                    Table des agents
                </div>
                <?php
                // Vérifier s'il y a des agents en base de données
                include 'Controller/controller_agent.php';
                $controller = new ControllerAgent();
                $controller->checkIfAgentInDB();
                $nbAgentsInDB = $_SESSION['nbAgentsInDB'];

                // Si aucun agent en base de données, on affiche un message associé pour prévenir l'utilisateur
                if ($nbAgentsInDB == 0) {
                    include 'views/messageNoAgentInDB.php';
                }
                // Sinon on importe la liste des agents présents en base de données
                else {
                    $controller->listeOfAgents();
                }
                ?>
            </div>

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
