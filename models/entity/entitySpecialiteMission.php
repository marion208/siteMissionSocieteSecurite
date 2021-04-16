<?php

class entitySpecialiteMission
{
    private $idSpecialiteMission;
    private $designationSpecialiteMission;

    public function __construct($idSpecialiteMission, $designationSpecialiteMission)
    {
        $this->idSpecialiteMission = $idSpecialiteMission;
        $this->designationSpecialiteMission = $designationSpecialiteMission;
    }

    public function getIdSpecialiteMission()
    {
        return $this->idSpecialiteMission;
    }

    public function setIdSpecialiteMission($idSpecialiteMission)
    {
        return $this->idSpecialiteMission = $idSpecialiteMission;
    }

    public function getDesignationSpecialiteMission()
    {
        return $this->designationSpecialiteMission;
    }

    public function setDesignationSpecialiteMission($designationSpecialiteMission)
    {
        return $this->designationSpecialiteMission = $designationSpecialiteMission;
    }
}
