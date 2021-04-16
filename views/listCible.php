<?php
$arrayCible = $_SESSION['arrayCible'];
?>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Nom de code</th>
            <th scope="col">Nationalité</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($arrayCible as $cible) {
        ?>
            <tr>
                <td><?php echo $cible->getNomCible(); ?></td>
                <td><?php echo $cible->getPrenomCible(); ?></td>
                <td><?php echo $cible->getDateDeNaissanceCible(); ?></td>
                <td><?php echo $cible->getCodeDIdentificationCible(); ?></td>
                <td><?php echo $cible->getNationaliteCible(); ?></td>
                <td><a href="/admin-modif_cible.php?id=<?php echo $cible->getIdCible(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_cible.php?id=<?php echo $cible->getIdCible(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayCible']);
        ?>
    </tbody>
</table>
<a href="/admin-add_cible.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter une nouvelle cible</a>