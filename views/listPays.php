<?php
$arrayListPays = $_SESSION['arrayListPays'];
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
        foreach ($arrayListPays as $pays) {
        ?>
            <tr>
                <td><?php echo $pays->getIdPays(); ?></td>
                <td><?php echo $pays->getDesignationPays(); ?></td>
                <td><a href="/admin-modif_pays.php?id=<?php echo $pays->getIdPays(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_pays.php?id=<?php echo $pays->getIdPays(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayListPays']);
        ?>
    </tbody>
</table>
<a href="/admin-add_pays.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter un nouveau pays</a>