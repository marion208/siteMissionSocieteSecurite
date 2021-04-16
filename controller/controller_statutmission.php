<?php

class ControllerStatutMission
{
    public function listeOfStatutDeMission()
    {
        include 'models/entity/entityStatutMission.php';
        include 'models/createListStatutMission.php';
        include 'views/listStatutMission.php';
    }

    public function formAddNewStatutOfMission()
    {
        include 'models/entity/entityStatutMission.php';
        include 'views/formAddNewStatutOfMission.php';
    }

    public function checkIfStatutOfMissionExistsWithIdInDB()
    {
        include 'models/checkIfStatutOfMissionExists.php';
    }

    public function formModificationForStatutMission()
    {
        include 'models/entity/entityStatutMission.php';
        include 'models/infoStatutMissionById.php';
        include 'views/formModifStatutMission.php';
    }

    public function searchInfoforStatutMissionId()
    {
        include 'models/entity/entityStatutMission.php';
        include 'models/infoStatutMissionById.php';
        include 'views/infoStatutMissionById.php';
    }
}
