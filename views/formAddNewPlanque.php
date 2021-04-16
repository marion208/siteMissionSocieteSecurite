<?php
$arrayIdPays = $_SESSION['arrayIdPays'];
$arrayDesignationPays = $_SESSION['arrayDesignationPays'];
$arrayIdTypePlanque = $_SESSION['arrayIdTypePlanque'];
$arrayDesignationTypePlanque = $_SESSION['arrayDesignationTypePlanque'];
?>
<div class="container">
    <form action="models/addNewPlanque.php" method="post">
        <div class="form-group">
            <label for="codeName">Code :</label>
            <input type="text" class="form-control" id="codeName" name="codeName">
            <label for="adresse">Adresse :</label>
            <input type="text" class="form-control" id="adresse" name="adresse">
            <label for="country">Pays :</label>
            <select class="form-control" id="country" name="country">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdPays); $i++) {
                ?>
                    <option value="<?php echo $arrayIdPays[$i] ?>"><?php echo $arrayDesignationPays[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="typePlanque">Type de planque :</label>
            <select class="form-control" id="typePlanque" name="typePlanque">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdTypePlanque); $i++) {
                ?>
                    <option value="<?php echo $arrayIdTypePlanque[$i] ?>"><?php echo $arrayDesignationTypePlanque[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <button type="submit" class="btn btn-primary mb-2">Ajouter une nouvelle planque</button>
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
    unset($_SESSION['arrayIdPays']);
    unset($_SESSION['arrayDesignationPays']);
    unset($_SESSION['arrayIdTypePlanque']);
    unset($_SESSION['arrayDesignationTypePlanque']);
    ?>
</div>