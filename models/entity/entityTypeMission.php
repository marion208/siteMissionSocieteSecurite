<?php

class entityTypeMission
{
    private $idTypeMission;
    private $designationTypeMission;

    public function __construct($idTypeMission, $designationTypeMission)
    {
        $this->idTypeMission = $idTypeMission;
        $this->designationTypeMission = $designationTypeMission;
    }

    public function getIdTypeMission()
    {
        return $this->idTypeMission;
    }

    public function setIdTypeMission($idTypeMission)
    {
        return $this->idTypeMission = $idTypeMission;
    }

    public function getDesignationTypeMission()
    {
        return $this->designationTypeMission;
    }

    public function setDesignationTypeMission($designationTypeMission)
    {
        return $this->designationTypeMission = $designationTypeMission;
    }
}
