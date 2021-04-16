<?php

class ControllerPays
{
    public function listOfCountry()
    {
        include 'models/entity/entityPays.php';
        include 'models/createListPays.php';
        include 'views/listPays.php';
    }

    public function formAddNewPays()
    {
        include 'models/entity/entityPays.php';
        include 'views/formAddNewPays.php';
    }

    public function checkIfPaysExistsWithIdInDB()
    {
        include 'models/checkIfPaysExists.php';
    }

    public function formModificationForPays()
    {
        include 'models/entity/entityPays.php';
        include 'models/infoPaysById.php';
        include 'views/formModifPays.php';
    }

    public function searchInfoforPaysId()
    {
        include 'models/entity/entityPays.php';
        include 'models/infoPaysById.php';
        include 'views/infoPaysById.php';
    }
}
