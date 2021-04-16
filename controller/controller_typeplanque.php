<?php

class ControllerTypePlanque
{
    public function listeOfTypesDePlanque()
    {
        include 'models/entity/entityTypeDePlanque.php';
        include 'models/createListTypePlanque.php';
        include 'views/listTypePlanque.php';
    }

    public function formAddNewTypeOfPlanque()
    {
        include 'models/entity/entityTypeDePlanque.php';
        include 'views/formAddNewTypeOfPlanque.php';
    }

    public function checkIfTypeOfPlanqueExistsWithIdInDB()
    {
        include 'models/checkIfTypeOfPlanqueExists.php';
    }

    public function formModificationForTypePlanque()
    {
        include 'models/entity/entityTypeDePlanque.php';
        include 'models/infoTypePlanqueById.php';
        include 'views/formModifTypePlanque.php';
    }

    public function searchInfoforTypePlanqueId()
    {
        include 'models/entity/entityTypeDePlanque.php';
        include 'models/infoTypePlanqueById.php';
        include 'views/infoTypePlanqueById.php';
    }
}
