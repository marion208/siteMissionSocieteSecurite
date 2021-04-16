<?php

class ControllerAgent
{
    public function checkIfAgentInDB()
    {
        include 'models/countAgents.php';
    }

    public function listeOfAgents()
    {
        include 'models/entity/entityAgent.php';
        include 'models/createListAgent.php';
        include 'views/listAgent.php';
    }

    public function checkIfAgentExistsWithIdInDB()
    {
        include 'models/checkIfAgentExists.php';
    }

    public function searchInfoforAgentId()
    {
        include 'models/entity/entityAgent.php';
        include 'models/infoAgentById.php';
        include 'views/infoAgentById.php';
    }

    public function formAddNewAgent()
    {
        include 'models/entity/entityAgent.php';
        include 'models/createSelectOptionFormAddNewAgent.php';
        include 'views/formAddNewAgent.php';
    }

    public function formModificationForAgent()
    {
        include 'models/entity/entityAgent.php';
        include 'models/infoAgentById.php';
        include 'models/createSelectOptionFormAddNewAgent.php';
        include 'views/formModifAgent.php';
    }
}
