<?php
$admin = $_SESSION['admin'];
?>
<div class="container">
    <form action="models/modifAdmin.php?id=<?php echo $admin->getIdAdmin(); ?>" method="post">
        <div class="form-group">
            <label for="nameAdmin">Nom :</label>
            <input type="text" class="form-control" id="nameAdmin" name="nameAdmin" value="<?php echo $admin->getNomAdmin(); ?>">
            <label for="firstnameAdmin">Prénom :</label>
            <input type="text" class="form-control" id="firstnameAdmin" name="firstnameAdmin" value="<?php echo $admin->getPrenomAdmin(); ?>">
            <label for="mailAdmin">E-mail :</label>
            <input type="text" class="form-control" id="mailAdmin" name="mailAdmin" value="<?php echo $admin->getMailAdmin(); ?>">
            <label for="passwordAdmin">Mot de passe :</label>
            <input type="text" class="form-control" id="passwordAdmin" name="passwordAdmin" value="<?php echo $admin->getMotDePasseAdmin(); ?>">
            <label for="dateCreateAdmin">Date : <em>(Remplir le champ sous le format AAAA-MM-JJ)</em></label>
            <input type="text" class="form-control" id="dateCreateAdmin" name="dateCreateAdmin" value="<?php echo $admin->getDateDeCreationAdmin(); ?>">
            <br>
            <button type="submit" class="btn btn-primary mb-2">Confirmer les modifications</button>
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
    unset($_SESSION['admin']);
    ?>
</div>