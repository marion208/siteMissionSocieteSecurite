<?php

class entityPlanque
{
    private $idPlanque;
    private $codePlanque;
    private $adressePlanque;
    private $paysPlanque;
    private $typePlanque;

    public function __construct($idPlanque, $codePlanque, $adressePlanque, $paysPlanque, $typePlanque)
    {
        $this->idPlanque = $idPlanque;
        $this->codePlanque = $codePlanque;
        $this->adressePlanque = $adressePlanque;
        $this->paysPlanque = $paysPlanque;
        $this->typePlanque = $typePlanque;
    }

    public function getIdPlanque()
    {
        return $this->idPlanque;
    }

    public function setIdPlanque($idPlanque)
    {
        return $this->idPlanque = $idPlanque;
    }

    public function getCodePlanque()
    {
        return $this->codePlanque;
    }

    public function setCodePlanque($codePlanque)
    {
        return $this->codePlanque = $codePlanque;
    }

    public function getAdressePlanque()
    {
        return $this->adressePlanque;
    }

    public function setAdressePlanque($adressePlanque)
    {
        return $this->adressePlanque = $adressePlanque;
    }

    public function getPaysPlanque()
    {
        return $this->paysPlanque;
    }

    public function setPaysPlanque($paysPlanque)
    {
        return $this->paysPlanque = $paysPlanque;
    }

    public function getTypePlanque()
    {
        return $this->typePlanque;
    }

    public function setTypePlanque($typePlanque)
    {
        return $this->typePlanque = $typePlanque;
    }
}
