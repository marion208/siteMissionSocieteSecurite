<?php
$arrayAgent = $_SESSION['arrayAgent'];
?>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Code d'identification</th>
            <th scope="col">Nationalité</th>
            <th scope="col">Spécialité</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($arrayAgent as $agent) {
        ?>
            <tr>
                <td><?php echo $agent->getNomAgent(); ?></td>
                <td><?php echo $agent->getPrenomAgent(); ?></td>
                <td><?php echo $agent->getDateDeNaissanceAgent(); ?></td>
                <td><?php echo $agent->getCodeDIdentificationAgent(); ?></td>
                <td><?php echo $agent->getNationaliteAgent(); ?></td>
                <td><?php echo $agent->getSpecialitesAgent(); ?></td>
                <td><a href="/admin-modif_agent.php?id=<?php echo $agent->getIdAgent(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_agent.php?id=<?php echo $agent->getIdAgent(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayAgent']);
        ?>
    </tbody>
</table>
<a href="/admin-add_agent.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter un nouvel agent</a>