<?php

class ControllerPlanque
{
    public function checkIfPlanqueInDB()
    {
        include 'models/countPlanques.php';
    }

    public function listOfPlanques()
    {
        include 'models/entity/entityPlanque.php';
        include 'models/createListPlanque.php';
        include 'views/listPlanque.php';
    }

    public function formAddNewPlanque()
    {
        include 'models/entity/entityPlanque.php';
        include 'models/createSelectOptionFormAddNewPlanque.php';
        include 'views/formAddNewPlanque.php';
    }

    public function checkIfPlanqueExistsWithIdInDB()
    {
        include 'models/checkIfPlanqueExists.php';
    }

    public function formModificationForPlanque()
    {
        include 'models/entity/entityPlanque.php';
        include 'models/infoPlanqueById.php';
        include 'models/createSelectOptionFormAddNewPlanque.php';
        include 'views/formModifPlanque.php';
    }

    public function searchInfoforPlanqueId()
    {
        include 'models/entity/entityPlanque.php';
        include 'models/infoPlanqueById.php';
        include 'views/infoPlanqueById.php';
    }
}
