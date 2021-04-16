<?php

class ControllerNationalite
{
    public function listOfNationality()
    {
        include 'models/entity/entityNationalite.php';
        include 'models/createListNationalites.php';
        include 'views/listNationalites.php';
    }

    public function formAddNewNationalite()
    {
        include 'models/entity/entityNationalite.php';
        include 'views/formAddNewNationalite.php';
    }

    public function checkIfNationaliteExistsWithIdInDB()
    {
        include 'models/checkIfNationaliteExists.php';
    }

    public function formModificationForNationality()
    {
        include 'models/entity/entityNationalite.php';
        include 'models/infoNationalityById.php';
        include 'views/formModifNationality.php';
    }

    public function searchInfoforNationalityId()
    {
        include 'models/entity/entityNationalite.php';
        include 'models/infoNationalityById.php';
        include 'views/infoNationaliteById.php';
    }
}
