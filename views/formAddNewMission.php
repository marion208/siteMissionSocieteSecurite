<?php
$arrayIdPays = $_SESSION['arrayIdPays'];
$arrayDesignationPays = $_SESSION['arrayDesignationPays'];
$arrayIdAgent = $_SESSION['arrayIdAgent'];
$arrayNameAgent = $_SESSION['arrayNameAgent'];
$arrayIdContact = $_SESSION['arrayIdContact'];
$arrayNameContact = $_SESSION['arrayNameContact'];
$arrayIdCible = $_SESSION['arrayIdCible'];
$arrayNameCible = $_SESSION['arrayNameCible'];
$arrayIdTypeMission = $_SESSION['arrayIdTypeMission'];
$arrayDesignationTypeMission = $_SESSION['arrayDesignationTypeMission'];
$arrayIdStatutMission = $_SESSION['arrayIdStatutMission'];
$arrayDesignationStatutMission = $_SESSION['arrayDesignationStatutMission'];
$arrayIdPlanque = $_SESSION['arrayIdPlanque'];
$arrayAdressePlanque = $_SESSION['arrayAdressePlanque'];
$arrayIdSpecialite = $_SESSION['arrayIdSpecialite'];
$arrayDesignationSpecialite = $_SESSION['arrayDesignationSpecialite'];
?>
<div class="container">
    <form action="models/addNewMission.php" method="post">
        <div class="form-group">
            <label for="titreMission">Titre de la mission :</label>
            <input type="text" class="form-control" id="titreMission" name="titreMission">
            <label for="description">Description :</label>
            <input type="text" class="form-control" id="description" name="description">
            <label for="nomDeCodeMission">Nom de code :</label>
            <input type="text" class="form-control" id="nomDeCodeMission" name="nomDeCodeMission">
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
            <label for="agent">Agent :</label>
            <select class="form-control" multiple id="agent" name="agent[]">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdAgent); $i++) {
                ?>
                    <option value="<?php echo $arrayIdAgent[$i] ?>"><?php echo $arrayNameAgent[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="contact">Contact :</label>
            <select class="form-control" multiple id="contact" name="contact[]">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdContact); $i++) {
                ?>
                    <option value="<?php echo $arrayIdContact[$i] ?>"><?php echo $arrayNameContact[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="cible">Cible :</label>
            <select class="form-control" multiple id="cible" name="cible[]">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdCible); $i++) {
                ?>
                    <option value="<?php echo $arrayIdCible[$i] ?>"><?php echo $arrayNameCible[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="typeMission">Type de mission :</label>
            <select class="form-control" id="typeMission" name="typeMission">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdTypeMission); $i++) {
                ?>
                    <option value="<?php echo $arrayIdTypeMission[$i] ?>"><?php echo $arrayDesignationTypeMission[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="statutMission">Statut :</label>
            <select class="form-control" id="statutMission" name="statutMission">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdStatutMission); $i++) {
                ?>
                    <option value="<?php echo $arrayIdStatutMission[$i] ?>"><?php echo $arrayDesignationStatutMission[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="planque">Planque :</label>
            <select class="form-control" multiple id="planque" name="planque[]">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdPlanque); $i++) {
                ?>
                    <option value="<?php echo $arrayIdPlanque[$i] ?>"><?php echo $arrayAdressePlanque[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="specialite">Sp??cialit?? requise :</label>
            <select class="form-control" id="specialite" name="specialite">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdSpecialite); $i++) {
                ?>
                    <option value="<?php echo $arrayIdSpecialite[$i] ?>"><?php echo $arrayDesignationSpecialite[$i] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="dateDebutMission">Date de d??but de la mission : <em>(Remplir le champ sous le format AAAA-MM-JJ)</em></label>
            <input type="text" class="form-control" id="dateDebutMission" name="dateDebutMission">
            <label for="dateFinMission">Date de fin de la mission : <em>(Remplir le champ sous le format AAAA-MM-JJ)</em></label>
            <input type="text" class="form-control" id="dateFinMission" name="dateFinMission">
            <br>
            <button type="submit" class="btn btn-primary mb-2">Ajouter une nouvelle mission</button>
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
    unset($_SESSION['arrayIdAgent']);
    unset($_SESSION['arrayNameAgent']);
    unset($_SESSION['arrayIdContact']);
    unset($_SESSION['arrayNameContact']);
    unset($_SESSION['arrayIdCible']);
    unset($_SESSION['arrayNameCible']);
    unset($_SESSION['arrayIdTypeMission']);
    unset($_SESSION['arrayDesignationTypeMission']);
    unset($_SESSION['arrayIdStatutMission']);
    unset($_SESSION['arrayDesignationStatutMission']);
    unset($_SESSION['arrayIdPlanque']);
    unset($_SESSION['arrayAdressePlanque']);
    unset($_SESSION['arrayIdSpecialite']);
    unset($_SESSION['arrayDesignationSpecialite']);
    ?>
</div>