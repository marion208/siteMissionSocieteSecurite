<?php
$pays = $_SESSION['pays'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Désignation :</h6><?php echo $pays->getDesignationPays(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['pays']);
