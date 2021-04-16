<?php
$statutMission = $_SESSION['statutMission'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Désignation :</h6><?php echo $statutMission->getDesignationStatutMission(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['statutMission']);
