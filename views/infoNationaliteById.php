<?php
$nationalite = $_SESSION['nationalite'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Désignation :</h6><?php echo $nationalite->getDesignationNationalite(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['nationalite']);
