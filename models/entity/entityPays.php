<?php

class entityPays
{
    private $idPays;
    private $designationPays;

    public function __construct($idPays, $designationPays)
    {
        $this->idPays = $idPays;
        $this->designationPays = $designationPays;
    }

    public function getIdPays()
    {
        return $this->idPays;
    }

    public function setIdPays($idPays)
    {
        return $this->idPays = $idPays;
    }

    public function getDesignationPays()
    {
        return $this->designationPays;
    }

    public function setDesignationPays($designationPays)
    {
        return $this->designationPays = $designationPays;
    }
}
