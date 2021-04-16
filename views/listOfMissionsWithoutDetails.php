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
            <th scope="col">Cibles</th>
            <th scope="col">Type</th>
            <th scope="col">Statut</th>
            <th scope="col">Spécialité requise</th>
            <th scope="col">Date de début de la mission</th>
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
                <td><?php echo $mission->getCiblesMission(); ?></th>
                <td><?php echo $mission->getTypeMission(); ?></th>
                <td><?php echo $mission->getStatutMission(); ?></th>
                <td><?php echo $mission->getSpecialiteRequisePourLaMission(); ?></th>
                <td><?php echo $mission->getDateDeDebutDeLaMission(); ?></th>
                <td><a href="/detailsMission.php?id=<?php echo $mission->getIdMission(); ?>">En savoir plus</a></th>
            </tr>
        <?php
        }
        unset($_SESSION['arrayMission']);
        ?>
    </tbody>
</table>