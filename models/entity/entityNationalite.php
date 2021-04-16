<?php

class entityNationalite
{
    private $idNationalite;
    private $designationNationalite;

    public function __construct($idNationalite, $designationNationalite)
    {
        $this->idNationalite = $idNationalite;
        $this->designationNationalite = $designationNationalite;
    }

    public function getIdNationalite()
    {
        return $this->idNationalite;
    }

    public function setIdNationalite($idNationalite)
    {
        return $this->idNationalite = $idNationalite;
    }

    public function getDesignationNationalite()
    {
        return $this->designationNationalite;
    }

    public function setDesignationNationalite($designationNationalite)
    {
        return $this->designationNationalite = $designationNationalite;
    }
}
