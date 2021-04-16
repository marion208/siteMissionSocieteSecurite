<?php

class ControllerMission
{
    public function listOfMissionsWithoutDetails()
    {
        include 'models/entity/entityMission.php';
        include 'models/createListMission.php';
        include 'views/listOfMissionsWithoutDetails.php';
    }
    public function listOfMissionsWithDetails()
    {
        include 'models/entity/entityMission.php';
        include 'models/createListMission.php';
        include 'views/listOfMissionsWithDetails.php';
    }

    public function checkIfMissionInDB()
    {
        include 'models/countMissions.php';
    }

    public function checkIfMissionExistWithIdInDB()
    {
        include 'models/checkIfMissionExists.php';
    }

    public function detailsMission()
    {
        include 'models/entity/entityMission.php';
        include 'models/createDetailsMission.php';
    }

    public function formAddNewMission()
    {
        include 'models/entity/entityMission.php';
        include 'models/createSelectOptionFormAddNewMission.php';
        include 'views/formAddNewMission.php';
    }

    public function checkIfMissionExistsWithIdInDB()
    {
        include 'models/checkIfMissionExists.php';
    }

    public function formModificationForMission()
    {
        include 'models/entity/entityMission.php';
        include 'models/infoMissionById.php';
        include 'models/createSelectOptionFormAddNewMission.php';
        include 'views/formModifMission.php';
    }

    public function searchInfoforMissionId()
    {
        include 'models/entity/entityMission.php';
        include 'models/infoMissionById.php';
        include 'views/missionWithDetails.php';
    }
}
