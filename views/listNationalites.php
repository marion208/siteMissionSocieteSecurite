<?php
$arrayListNationalites = $_SESSION['arrayListNationalites'];
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
        foreach ($arrayListNationalites as $nationalite) {
        ?>
            <tr>
                <td><?php echo $nationalite->getIdNationalite(); ?></td>
                <td><?php echo $nationalite->getDesignationNationalite(); ?></td>
                <td><a href="/admin-modif_nationalite.php?id=<?php echo $nationalite->getIdNationalite(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_nationalite.php?id=<?php echo $nationalite->getIdNationalite(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayListNationalites']);
        ?>
    </tbody>
</table>
<a href="/admin-add_nationalite.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter une nouvelle nationalité</a>