<?php
$arrayContact = $_SESSION['arrayContact'];
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
        foreach ($arrayContact as $contact) {
        ?>
            <tr>
                <td><?php echo $contact->getNomContact(); ?></td>
                <td><?php echo $contact->getPrenomContact(); ?></td>
                <td><?php echo $contact->getDateDeNaissanceContact(); ?></td>
                <td><?php echo $contact->getCodeDIdentificationContact(); ?></td>
                <td><?php echo $contact->getNationaliteContact(); ?></td>
                <td><a href="/admin-modif_contact.php?id=<?php echo $contact->getIdContact(); ?>"><img src="/open-iconic-master/svg/pencil.svg" style="zoom: 180%"></a></td>
                <td><a href="/admin-delete_contact.php?id=<?php echo $contact->getIdContact(); ?>"><img src="/open-iconic-master/svg/trash.svg" style="zoom: 180%"></a></td>
            </tr>
        <?php
        }
        unset($_SESSION['arrayContact']);
        ?>
    </tbody>
</table>
<a href="/admin-add_contact.php"><img src="/open-iconic-master/svg/plus.svg" style="zoom: 150%; filter: invert(43%) sepia(54%) saturate(7466%) hue-rotate(200deg) brightness(103%) contrast(106%);"> Ajouter un nouveau contact</a>