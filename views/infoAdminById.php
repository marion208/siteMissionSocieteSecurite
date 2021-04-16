<?php
$admin = $_SESSION['admin'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Nom :</h6><?php echo $admin->getNomAdmin(); ?>
        </li>
        <li class="list-group-item">
            <h6>Prénom :</h6><?php echo $admin->getPrenomAdmin(); ?>
        </li>
        <li class="list-group-item">
            <h6>E-mail :</h6><?php echo $admin->getMailAdmin(); ?>
        </li>
        <li class="list-group-item">
            <h6>Date de création :</h6><?php echo $admin->getDateDeCreationAdmin(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['admin']);
