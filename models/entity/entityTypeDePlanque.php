<?php

class entityTypeDePlanque
{
    private $idTypePlanque;
    private $designationTypePlanque;

    public function __construct($idTypePlanque, $designationTypePlanque)
    {
        $this->idTypePlanque = $idTypePlanque;
        $this->designationTypePlanque = $designationTypePlanque;
    }

    public function getIdTypePlanque()
    {
        return $this->idTypePlanque;
    }

    public function setIdTypePlanque($idTypePlanque)
    {
        return $this->idTypePlanque = $idTypePlanque;
    }

    public function getDesignationTypePlanque()
    {
        return $this->designationTypePlanque;
    }

    public function setDesignationTypePlanque($designationTypePlanque)
    {
        return $this->designationTypePlanque = $designationTypePlanque;
    }
}
