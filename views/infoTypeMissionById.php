<?php
$typeMission = $_SESSION['typeMission'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Désignation :</h6><?php echo $typeMission->getDesignationTypeMission(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['typeMission']);
