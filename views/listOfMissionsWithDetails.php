<?php
$arrayMission = $_SESSION['arrayMission'];
?>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">Titre de la mission</th>
            <th scope="col">Description</th>
            <th scope="col">Nom de code</th>
            <th scope="col">Pays</th>
            <th scope="col">Agents</th>
            <th scope="col">Contacts</th>
            <th scope="col">Cibles</th>
            <th scope="col">Type de mission</th>
            <th scope="col">Statut</th>
            <th scope="col">Planque</th>
            <th scope="col">Spécialité requise</th>
            <th scope="col">Date de début de la mission</th>
            <th scope="col">Date de fin de la mission</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($arrayMission as $mission) {
        ?>
            <tr>
                <td><?php echo $mission->getTitreMission(); ?></th>
                <td><?php echo $mission->getDescriptionMission(); ?></th>
                <td><?php echo $mission->getNomDeCodeMission(); ?></th>
                <td><?php echo $mission->getPaysMission(); ?></th>
                <td><?php echo $mission->getAgentsMission(); ?></th>
                <td><?php echo $mission->getContactsMission(); ?></th>
                <td><?php echo $mission->getCiblesMission(); ?></th>
                <td><?php echo $mission->getTypeMission(); ?></th>
                <td><?php echo $mission->getStatutMission(); ?></th>
                <td><?php echo $mission->getPlanquesMission(); ?></th>
                <td><?php echo $mission->getSpecialiteRequisePourLaMission(); ?></th>
                <td><?php echo $mission->getDateDeDebutDeLaMission(); ?></th>
                <td><?php echo $mission->getDateDeFinDeLaMission(); ?></th>
                <td><a href="/admin-modif_mission.php?id=<?php echo $mission->getIdMission(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_mission.php?id=<?php echo $mission->getIdMission(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayMission']);
        ?>
    </tbody>
</table>
<a href="/admin-add_mission.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter une nouvelle mission</a>