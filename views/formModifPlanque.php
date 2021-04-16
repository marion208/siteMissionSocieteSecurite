<?php
$planque = $_SESSION['planque'];
$arrayIdPays = $_SESSION['arrayIdPays'];
$arrayDesignationPays = $_SESSION['arrayDesignationPays'];
$arrayIdTypePlanque = $_SESSION['arrayIdTypePlanque'];
$arrayDesignationTypePlanque = $_SESSION['arrayDesignationTypePlanque'];
?>
<div class="container">
    <form action="models/modifPlanque.php?id=<?php echo $planque->getIdPlanque(); ?>" method="post">
        <div class="form-group">
            <label for="nameCode">Code :</label>
            <input type="text" class="form-control" id="nameCode" name="nameCode" value="<?php echo $planque->getCodePlanque(); ?>">
            <label for="adresse">Adresse :</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $planque->getAdressePlanque(); ?>">
            <label for="country">Pays :</label>
            <select class="form-control" id="country" name="country">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdPays); $i++) {
                ?>
                    <option value="<?php echo $arrayIdPays[$i] ?>" <?php if ($arrayDesignationPays[$i] == $planque->getPaysPlanque()) { ?> selected<?php } ?>><?php echo $arrayDesignationPays[$i] ?></option>
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
                    <option value="<?php echo $arrayIdTypePlanque[$i] ?>" <?php if ($arrayDesignationTypePlanque[$i] == $planque->getTypePlanque()) { ?> selected<?php } ?>><?php echo $arrayDesignationTypePlanque[$i] ?></option>
                <?php
                }
                ?>
            </select>
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
    unset($_SESSION['planque']);
    unset($_SESSION['arrayIdPays']);
    unset($_SESSION['arrayDesignationPays']);
    unset($_SESSION['arrayIdTypePlanque']);
    unset($_SESSION['arrayDesignationTypePlanque']);
    ?>
</div>