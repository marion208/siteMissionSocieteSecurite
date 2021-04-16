<?php
$arrayIdSpecialiteAgent = $_SESSION['arrayIdSpecialiteAgent'];
$agent = $_SESSION['agent'];
$arrayIdNationalite = $_SESSION['arrayIdNationalite'];
$arrayDesignationNationalite = $_SESSION['arrayDesignationNationalite'];
$arrayIdSpecialite = $_SESSION['arrayIdSpecialite'];
$arrayDesignationSpecialite = $_SESSION['arrayDesignationSpecialite'];
?>
<div class="container">
    <form action="models/modifAgent.php?id=<?php echo $agent->getIdAgent(); ?>" method="post">
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $agent->getNomAgent(); ?>">
            <label for="firstname">Prénom :</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $agent->getPrenomAgent(); ?>">
            <label for="birthDate">Date de naissance : <em>(Remplir le champ sous le format AAAA-MM-JJ)</em></label>
            <input type="text" class="form-control" id="birthDate" name="birthDate" value="<?php echo $agent->getDateDeNaissanceAgent(); ?>">
            <label for="codeIdentity">Code d'identification :</label>
            <input type="text" class="form-control" id="codeIdentity" name="codeIdentity" value="<?php echo $agent->getCodeDIdentificationAgent(); ?>">
            <label for="nationality">Nationalité :</label>
            <select class="form-control" id="nationality" name="nationality">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdNationalite); $i++) {
                ?>
                    <option value="<?php echo $arrayIdNationalite[$i] ?>" <?php if ($arrayDesignationNationalite[$i] == $agent->getNationaliteAgent()) { ?> selected<?php } ?>><?php echo $arrayDesignationNationalite[$i] ?></option>
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
                    <option value="<?php echo $arrayIdSpecialite[$i] ?>" <?php if (in_array($arrayIdSpecialite[$i], $arrayIdSpecialiteAgent)) { ?> selected<?php } ?>><?php echo $arrayDesignationSpecialite[$i] ?></option>
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
    unset($_SESSION['agent']);
    unset($_SESSION['arrayIdNationalite']);
    unset($_SESSION['arrayDesignationNationalite']);
    unset($_SESSION['arrayIdSpecialite']);
    unset($_SESSION['arrayDesignationSpecialite']);
    ?>
</div>