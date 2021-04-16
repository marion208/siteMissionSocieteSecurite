<?php

class ControllerSpecialiteMission
{
    public function listeOfSpecialites()
    {
        include 'models/entity/entitySpecialiteMission.php';
        include 'models/createListSpecialiteMission.php';
        include 'views/listSpecialiteMission.php';
    }

    public function formAddNewSpecialityOfMission()
    {
        include 'models/entity/entitySpecialiteMission.php';
        include 'views/formAddNewSpecialityOfMission.php';
    }

    public function checkIfSpecialityOfMissionExistsWithIdInDB()
    {
        include 'models/checkIfSpecialityOfMissionExists.php';
    }

    public function formModificationForSpecialityMission()
    {
        include 'models/entity/entitySpecialiteMission.php';
        include 'models/infoSpecialityMissionById.php';
        include 'views/formModifSpecialityMission.php';
    }

    public function searchInfoforSpecialiteMissionId()
    {
        include 'models/entity/entitySpecialiteMission.php';
        include 'models/infoSpecialityMissionById.php';
        include 'views/infoSpecialiteMissionById.php';
    }
}
