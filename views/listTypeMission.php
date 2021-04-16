<?php
$arrayTypesMission = $_SESSION['arrayTypesMission'];
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
        foreach ($arrayTypesMission as $typeMission) {
        ?>
            <tr>
                <td><?php echo $typeMission->getIdTypeMission(); ?></td>
                <td><?php echo $typeMission->getDesignationTypeMission(); ?></td>
                <td><a href="/admin-modif_typemission.php?id=<?php echo $typeMission->getIdTypeMission(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_typemission.php?id=<?php echo $typeMission->getIdTypeMission(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayTypesMission']);
        ?>
    </tbody>
</table>
<a href="/admin-add_typemission.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter un nouveau type de mission</a>