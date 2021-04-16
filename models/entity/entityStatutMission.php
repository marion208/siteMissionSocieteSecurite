<?php

class entityStatutMission
{
    private $idStatutMission;
    private $designationStatutMission;

    public function __construct($idStatutMission, $designationStatutMission)
    {
        $this->idStatutMission = $idStatutMission;
        $this->designationStatutMission = $designationStatutMission;
    }

    public function getIdStatutMission()
    {
        return $this->idStatutMission;
    }

    public function setIdStatutMission($idStatutMission)
    {
        return $this->idStatutMission = $idStatutMission;
    }

    public function getDesignationStatutMission()
    {
        return $this->designationStatutMission;
    }

    public function setDesignationStatutMission($designationStatutMission)
    {
        return $this->designationStatutMission = $designationStatutMission;
    }
}
