<?php
$contact = $_SESSION['contact'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Nom :</h6><?php echo $contact->getNomContact(); ?>
        </li>
        <li class="list-group-item">
            <h6>Prénom :</h6><?php echo $contact->getPrenomContact(); ?>
        </li>
        <li class="list-group-item">
            <h6>Date de naissance :</h6><?php echo $contact->getDateDeNaissanceContact(); ?>
        </li>
        <li class="list-group-item">
            <h6>Nom de code :</h6><?php echo $contact->getCodeDIdentificationContact(); ?>
        </li>
        <li class="list-group-item">
            <h6>Nationalité :</h6><?php echo $contact->getNationaliteContact(); ?>
        </li>
    </ul>
</div>
<?php
unset($_SESSION['contact']);
