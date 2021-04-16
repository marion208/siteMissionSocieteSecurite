<?php
$arrayIdNationalite = $_SESSION['arrayIdNationalite'];
$arrayDesignationNationalite = $_SESSION['arrayDesignationNationalite'];
$arrayIdSpecialite = $_SESSION['arrayIdSpecialite'];
$arrayDesignationSpecialite = $_SESSION['arrayDesignationSpecialite'];
?>
<div class="container">
    <form action="models/addNewAgent.php" method="post">
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" class="form-control" id="name" name="name">
            <label for="firstname">Prénom :</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
            <label for="birthDate">Date de naissance : <em>(Remplir le champ sous le format AAAA-MM-JJ)</em></label>
            <input type="text" class="form-control" id="birthDate" name="birthDate">
            <label for="codeIdentity">Code d'identification :</label>
            <input type="text" class="form-control" id="codeIdentity" name="codeIdentity">
            <label for="nationality">Nationalité :</label>
            <select class="form-control" id="nationality" name="nationality">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdNationalite); $i++) {
                ?>
                    <option value="<?php echo $arrayIdNationalite[$i] ?>"><?php echo $arrayDesignationNationalite[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="speciality">Spécialité :</label>
            <select class="form-control" multiple id="speciality" name="speciality[]">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdSpecialite); $i++) {
                ?>
                    <option value="<?php echo $arrayIdSpecialite[$i] ?>"><?php echo $arrayDesignationSpecialite[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <button type="submit" class="btn btn-primary mb-2">Ajouter un nouvel agent</button>
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
    unset($_SESSION['arrayIdNationalite']);
    unset($_SESSION['arrayDesignationNationalite']);
    unset($_SESSION['arrayIdSpecialite']);
    unset($_SESSION['arrayDesignationSpecialite']);
    ?>
</div>