<?php
$typePlanque = $_SESSION['typePlanque'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Désignation :</h6><?php echo $typePlanque->getDesignationTypePlanque(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['typePlanque']);
