<?php
$arrayPlanque = $_SESSION['arrayPlanque'];
?>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Adresse</th>
            <th scope="col">Pays</th>
            <th scope="col">Type de planque</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($arrayPlanque as $planque) {
        ?>
            <tr>
                <td><?php echo $planque->getCodePlanque(); ?></td>
                <td><?php echo $planque->getAdressePlanque(); ?></td>
                <td><?php echo $planque->getPaysPlanque(); ?></td>
                <td><?php echo $planque->getTypePlanque(); ?></td>
                <td><a href="/admin-modif_planque.php?id=<?php echo $planque->getIdPlanque(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_planque.php?id=<?php echo $planque->getIdPlanque(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayPlanque']);
        ?>
    </tbody>
</table>
<a href="/admin-add_planque.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter une nouvelle planque</a>