<?php
$planque = $_SESSION['planque'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Code :</h6><?php echo $planque->getCodePlanque(); ?>
        </li>
        <li class="list-group-item">
            <h6>Adresse :</h6><?php echo $planque->getAdressePlanque(); ?>
        </li>
        <li class="list-group-item">
            <h6>Pays :</h6><?php echo $planque->getPaysPlanque(); ?>
        </li>
        <li class="list-group-item">
            <h6>Type de planque :</h6><?php echo $planque->getTypePlanque(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['planque']);
