<?php
$mission = $_SESSION['mission'];
?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <h6>Titre de la mission :</h6><?php echo $mission->getTitreMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Description de la mission :</h6><?php echo $mission->getDescriptionMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Nom de code de la mission :</h6><?php echo $mission->getNomDeCodeMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Pays où doit se dérouler la mission :</h6><?php echo $mission->getPaysMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Agents affectés pour la mission :</h6><?php echo $mission->getAgentsMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Contacts permettant d'aider au bon déroulement de la mission :</h6><?php echo $mission->getContactsMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Cibles de la mission :</h6><?php echo $mission->getCiblesMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Type de mission :</h6><?php echo $mission->getTypeMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Statut actuel de la mission :</h6><?php echo $mission->getStatutMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Planques destinés à la mission :</h6><?php echo $mission->getPlanquesMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Spécialité require pour la mission :</h6><?php echo $mission->getSpecialiteRequisePourLaMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Date de début de la mission :</h6><?php echo $mission->getDateDeDebutDeLaMission(); ?>
        </li>
        <li class="list-group-item">
            <h6>Date de fin de la mission :</h6><?php echo $mission->getDateDeFinDeLaMission(); ?>
        </li>
    </ul>
</div>