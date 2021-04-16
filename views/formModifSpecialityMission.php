<?php
$specialityMission = $_SESSION['specialityMission'];
?>
<div class="container">
    <form action="models/modifSpecialityMission.php?id=<?php echo $specialityMission->getIdSpecialiteMission(); ?>" method="post">
        <div class="form-group">
            <label for="designation">Désignation :</label>
            <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $specialityMission->getDesignationSpecialiteMission(); ?>">
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
    unset($_SESSION['specialityMission']);
    ?>
</div>