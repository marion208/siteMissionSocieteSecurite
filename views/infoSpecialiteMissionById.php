<?php
$specialityMission = $_SESSION['specialityMission'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Désignation :</h6><?php echo $specialityMission->getDesignationSpecialiteMission(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['specialityMission']);
