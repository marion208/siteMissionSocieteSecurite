<?php
$agent = $_SESSION['agent'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Nom :</h6><?php echo $agent->getNomAgent(); ?>
        </li>
        <li class="list-group-item">
            <h6>Prénom :</h6><?php echo $agent->getPrenomAgent(); ?>
        </li>
        <li class="list-group-item">
            <h6>Date de naissance :</h6><?php echo $agent->getDateDeNaissanceAgent(); ?>
        </li>
        <li class="list-group-item">
            <h6>Code d'identification :</h6><?php echo $agent->getCodeDIdentificationAgent(); ?>
        </li>
        <li class="list-group-item">
            <h6>Nationalité :</h6><?php echo $agent->getNationaliteAgent(); ?>
        </li>
        <li class="list-group-item">
            <h6>Spécialité :</h6><?php echo $agent->getSpecialitesAgent(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['agent']);
