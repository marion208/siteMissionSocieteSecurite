<?php
$arrayTypesPlanque = $_SESSION['arrayTypesPlanque'];
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
        foreach ($arrayTypesPlanque as $typePlanque) {
        ?>
            <tr>
                <td><?php echo $typePlanque->getIdTypePlanque(); ?></td>
                <td><?php echo $typePlanque->getDesignationTypePlanque(); ?></td>
                <td><a href="/admin-modif_typeplanque.php?id=<?php echo $typePlanque->getIdTypePlanque(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_typeplanque.php?id=<?php echo $typePlanque->getIdTypePlanque(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayTypesPlanque']);
        ?>
    </tbody>
</table>
<a href="/admin-add_typeplanque.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter un nouveau type de planque</a>