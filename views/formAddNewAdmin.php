<div class="container">
    <form action="models/addNewAdmin.php" method="post">
        <div class="form-group">
            <label for="nameAdmin">Nom :</label>
            <input type="text" class="form-control" id="nameAdmin" name="nameAdmin">
            <label for="firstnameAdmin">Prénom :</label>
            <input type="text" class="form-control" id="firstnameAdmin" name="firstnameAdmin">
            <label for="mailAdmin">E-mail :</label>
            <input type="text" class="form-control" id="mailAdmin" name="mailAdmin">
            <label for="passwordAdmin">Mot de passe :</label>
            <input type="text" class="form-control" id="passwordAdmin" name="passwordAdmin">
            <label for="dateCreateAdmin">Date : <em>(Remplir le champ sous le format AAAA-MM-JJ)</em></label>
            <input type="text" class="form-control" id="dateCreateAdmin" name="dateCreateAdmin">
            <br>
            <button type="submit" class="btn btn-primary mb-2">Ajouter un nouvel administrateur</button>
        </div>
    </form>
    <?php
    if (isset($_SESSION['listErrorsForm'])) {
    ?>
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
</div>