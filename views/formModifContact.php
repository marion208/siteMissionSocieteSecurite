<?php
$contact = $_SESSION['contact'];
$arrayIdNationalite = $_SESSION['arrayIdNationalite'];
$arrayDesignationNationalite = $_SESSION['arrayDesignationNationalite'];
?>
<div class="container">
    <form action="models/modifContact.php?id=<?php echo $contact->getIdContact(); ?>" method="post">
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $contact->getNomContact(); ?>">
            <label for="firstname">Prénom :</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $contact->getPrenomContact(); ?>">
            <label for="birthDate">Date de naissance : <em>(Remplir le champ sous le format AAAA-MM-JJ)</em></label>
            <input type="text" class="form-control" id="birthDate" name="birthDate" value="<?php echo $contact->getDateDeNaissanceContact(); ?>">
            <label for="codeIdentity">Nom de code :</label>
            <input type="text" class="form-control" id="codeIdentity" name="codeIdentity" value="<?php echo $contact->getCodeDIdentificationContact(); ?>">
            <label for="nationality">Nationalité :</label>
            <select class="form-control" id="nationality" name="nationality">
                <option value=""></option>
                <?php
                for ($i = 0; $i < count($arrayIdNationalite); $i++) {
                ?>
                    <option value="<?php echo $arrayIdNationalite[$i] ?>" <?php if ($arrayDesignationNationalite[$i] == $contact->getNationaliteContact()) { ?> selected<?php } ?>><?php echo $arrayDesignationNationalite[$i] ?></option>
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
    unset($_SESSION['contact']);
    unset($_SESSION['arrayIdNationalite']);
    unset($_SESSION['arrayDesignationNationalite']);
    ?>
</div>