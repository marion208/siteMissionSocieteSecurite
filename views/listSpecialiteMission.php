<?php
$arraySpecialitesMission = $_SESSION['arraySpecialitesMission'];
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
        foreach ($arraySpecialitesMission as $specialiteMission) {
        ?>
            <tr>
                <td><?php echo $specialiteMission->getIdSpecialiteMission(); ?></td>
                <td><?php echo $specialiteMission->getDesignationSpecialiteMission(); ?></td>
                <td><a href="/admin-modif_specialitemission.php?id=<?php echo $specialiteMission->getIdSpecialiteMission(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_specialitemission.php?id=<?php echo $specialiteMission->getIdSpecialiteMission(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arraySpecialitesMission']);
        ?>
    </tbody>
</table>
<a href="/admin-add_specialitemission.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter une nouvelle spécialité</a>