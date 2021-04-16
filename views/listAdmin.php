<?php
$arrayAdmin = $_SESSION['arrayAdmin'];
?>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">E-mail</th>
            <th scope="col">Mot de passe</th>
            <th scope="col">Date de création</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($arrayAdmin as $admin) {
        ?>
            <tr>
                <td><?php echo $admin->getNomAdmin(); ?></td>
                <td><?php echo $admin->getPrenomAdmin(); ?></td>
                <td><?php echo $admin->getMailAdmin(); ?></td>
                <td><?php echo $admin->getMotDePasseAdmin(); ?></td>
                <td><?php echo $admin->getDateDeCreationAdmin(); ?></td>
                <td><a href="/admin-modif_admin.php?id=<?php echo $admin->getIdAdmin(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_admin.php?id=<?php echo $admin->getIdAdmin(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayAdmin']);
        ?>
    </tbody>
</table>
<a href="/admin-add_admin.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter un nouvel administrateur</a>