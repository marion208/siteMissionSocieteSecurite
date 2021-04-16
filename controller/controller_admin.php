<?php

class ControllerAdmin
{
    public function listeOfAdmins()
    {
        include 'models/entity/entityAdministrateur.php';
        include 'models/createListAdmin.php';
        include 'views/listAdmin.php';
    }

    public function listOfTableInDB()
    {
        include 'models/listOfTablesInDB.php';
        include 'views/listOfTablesInDB.php';
    }

    public function checkIfAdminExistsWithIdInDB()
    {
        include 'models/checkIfAdminExists.php';
    }

    public function searchInfoforAdminId()
    {
        include 'models/entity/entityAdministrateur.php';
        include 'models/infoAdminById.php';
        include 'views/infoAdminById.php';
    }

    public function formModificationForAdmin()
    {
        include 'models/entity/entityAdministrateur.php';
        include 'models/infoAdminById.php';
        include 'views/formModifAdmin.php';
    }

    public function formAddNewAdmin()
    {
        include 'models/entity/entityAdministrateur.php';
        include 'views/formAddNewAdmin.php';
    }
}
