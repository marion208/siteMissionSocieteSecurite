<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion</title>
    <!-- Bootstrap CSS -->
    <link href="/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Our CSS -->
    <!--<link rel="stylesheet" href="style.css">-->
</head>

<body>
    <h1>Connexion au back-office</h1>

    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand ml-auto" href="/homepage.php">Retour à l'accueil</a>
        </div>
    </nav>

    <div class="container">
        <form action="models/checkConnexion.php" method="post">
            <div class="col-auto">
                <label for="inputEmail" class="form-label">Adresse e-mail</label>
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="emailHelp" required>
            </div>
            <div class="col-auto">
                <label for="inputPassword" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="inputPassword" id="inputPassword" required>
            </div>
            <div class="col-auto">
                <br><button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>

    <?php
    session_start();
    if (isset($_SESSION['findUserAdmin'])) {
        if ($_SESSION['findUserAdmin'] == false) {
            // Si la connexion n'a pas pu être faite, on affiche un message à l'utilisateur
    ?>
            <br>
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <p>Aucun compte utilisateur n'a pu être retrouvé avec les informations saisies.</p>
                    <p>Veuillez vérifier votre adresse e-mail et votre mot de passe puis réessayer.</p>
                </div>
            </div>
    <?php
        }
    }
    ?>

    <!-- jQuery -->
    <script src="jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>