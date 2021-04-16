<?php

class ControllerTypeMission
{
    public function listeOfTypesOfMission()
    {
        include 'models/entity/entityTypeMission.php';
        include 'models/createListTypeMission.php';
        include 'views/listTypeMission.php';
    }

    public function formAddNewTypeOfMission()
    {
        include 'models/entity/entityTypeMission.php';
        include 'views/formAddNewTypeOfMission.php';
    }

    public function checkIfTypeOfMissionExistsWithIdInDB()
    {
        include 'models/checkIfTypeOfMissionExists.php';
    }

    public function formModificationForTypeMission()
    {
        include 'models/entity/entityTypeMission.php';
        include 'models/infoTypeMissionById.php';
        include 'views/formModifTypeMission.php';
    }

    public function searchInfoforTypeMissionId()
    {
        include 'models/entity/entityTypeMission.php';
        include 'models/infoTypeMissionById.php';
        include 'views/infoTypeMissionById.php';
    }
}
