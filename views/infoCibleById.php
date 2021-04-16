<?php
$cible = $_SESSION['cible'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Nom :</h6><?php echo $cible->getNomCible(); ?>
        </li>
        <li class="list-group-item">
            <h6>Prénom :</h6><?php echo $cible->getPrenomCible(); ?>
        </li>
        <li class="list-group-item">
            <h6>Date de naissance :</h6><?php echo $cible->getDateDeNaissanceCible(); ?>
        </li>
        <li class="list-group-item">
            <h6>Nom de code :</h6><?php echo $cible->getCodeDIdentificationCible(); ?>
        </li>
        <li class="list-group-item">
            <h6>Nationalité :</h6><?php echo $cible->getNationaliteCible(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['cible']);
