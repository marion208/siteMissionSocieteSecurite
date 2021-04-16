<?php
$arrayStatutsMission = $_SESSION['arrayStatutsMission'];
?>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Désignation</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($arrayStatutsMission as $statutMission) {
        ?>
            <tr>
                <td><?php echo $statutMission->getIdStatutMission(); ?></td>
                <td><?php echo $statutMission->getDesignationStatutMission(); ?></td>
                <td><a href="/admin-modif_statutmission.php?id=<?php echo $statutMission->getIdStatutMission(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_statutmission.php?id=<?php echo $statutMission->getIdStatutMission(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayStatutsMission']);
        ?>
    </tbody>
</table>
<a href="/admin-add_statutmission.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter un nouveau statut de mission</a>