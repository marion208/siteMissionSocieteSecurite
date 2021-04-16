<?php

class ControllerCible
{
    public function checkIfCibleInDB()
    {
        include 'models/countCibles.php';
    }

    public function listeOfCibles()
    {
        include 'models/entity/entityCible.php';
        include 'models/createListCible.php';
        include 'views/listCible.php';
    }

    public function formAddNewCible()
    {
        include 'models/entity/entityCible.php';
        include 'models/createSelectOptionFormAddNewCible.php';
        include 'views/formAddNewCible.php';
    }

    public function checkIfCibleExistsWithIdInDB()
    {
        include 'models/checkIfCibleExists.php';
    }

    public function formModificationForCible()
    {
        include 'models/entity/entityCible.php';
        include 'models/infoCibleById.php';
        include 'models/createSelectOptionFormAddNewCible.php';
        include 'views/formModifCible.php';
    }

    public function searchInfoforCibleId()
    {
        include 'models/entity/entityCible.php';
        include 'models/infoCibleById.php';
        include 'views/infoCibleById.php';
    }
}
