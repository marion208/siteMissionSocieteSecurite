<?php

class entityMission
{
    private $idMission;
    private $titreMission;
    private $descriptionMission;
    private $nomDeCodeMission;
    private $paysMission;
    private $agentsMission;
    private $contactsMission;
    private $ciblesMission;
    private $typeMission;
    private $statutMission;
    private $planquesMission;
    private $specialiteRequisePourLaMission;
    private $dateDeDebutDeLaMission;
    private $dateDeFinDeLaMission;

    public function __construct($idMission, $titreMission, $descriptionMission, $nomDeCodeMission, $paysMission, $agentsMission, $contactsMission, $ciblesMission, $typeMission, $statutMission, $planquesMission, $specialiteRequisePourLaMission, $dateDeDebutDeLaMission, $dateDeFinDeLaMission)
    {
        $this->idMission = $idMission;
        $this->titreMission = $titreMission;
        $this->descriptionMission = $descriptionMission;
        $this->nomDeCodeMission = $nomDeCodeMission;
        $this->paysMission = $paysMission;
        $this->agentsMission = $agentsMission;
        $this->contactsMission = $contactsMission;
        $this->ciblesMission = $ciblesMission;
        $this->typeMission = $typeMission;
        $this->statutMission = $statutMission;
        $this->planquesMission = $planquesMission;
        $this->specialiteRequisePourLaMission = $specialiteRequisePourLaMission;
        $this->dateDeDebutDeLaMission = $dateDeDebutDeLaMission;
        $this->dateDeFinDeLaMission = $dateDeFinDeLaMission;
    }

    public function getIdMission()
    {
        return $this->idMission;
    }

    public function setIdMission($idMission)
    {
        return $this->idMission = $idMission;
    }

    public function getTitreMission()
    {
        return $this->titreMission;
    }

    public function setTitreMission($titreMission)
    {
        return $this->titreMission = $titreMission;
    }

    public function getDescriptionMission()
    {
        return $this->descriptionMission;
    }

    public function setDescriptionMission($descriptionMission)
    {
        return $this->descriptionMission = $descriptionMission;
    }

    public function getNomDeCodeMission()
    {
        return $this->nomDeCodeMission;
    }

    public function setNomDeCodeMission($nomDeCodeMission)
    {
        return $this->nomDeCodeMission = $nomDeCodeMission;
    }

    public function getPaysMission()
    {
        return $this->paysMission;
    }

    public function setPaysMission($paysMission)
    {
        return $this->paysMission = $paysMission;
    }

    public function getAgentsMission()
    {
        return $this->agentsMission;
    }

    public function setAgentsMission($agentsMission)
    {
        return $this->agentsMission = $agentsMission;
    }

    public function getContactsMission()
    {
        return $this->contactsMission;
    }

    public function setContactsMission($contactsMission)
    {
        return $this->contactsMission = $contactsMission;
    }

    public function getCiblesMission()
    {
        return $this->ciblesMission;
    }

    public function setCiblesMission($ciblesMission)
    {
        return $this->ciblesMission = $ciblesMission;
    }

    public function getTypeMission()
    {
        return $this->typeMission;
    }

    public function setTypeMission($typeMission)
    {
        return $this->typeMission = $typeMission;
    }

    public function getStatutMission()
    {
        return $this->statutMission;
    }

    public function setStatutMission($statutMission)
    {
        return $this->statutMission = $statutMission;
    }

    public function getPlanquesMission()
    {
        return $this->planquesMission;
    }

    public function setPlanquesMission($planquesMission)
    {
        return $this->planquesMission = $planquesMission;
    }

    public function getSpecialiteRequisePourLaMission()
    {
        return $this->specialiteRequisePourLaMission;
    }

    public function setSpecialiteRequisePourLaMission($specialiteRequisePourLaMission)
    {
        return $this->specialiteRequisePourLaMission = $specialiteRequisePourLaMission;
    }

    public function getDateDeDebutDeLaMission()
    {
        return $this->dateDeDebutDeLaMission;
    }

    public function setDateDeDebutDeLaMission($dateDeDebutDeLaMission)
    {
        return $this->dateDeDebutDeLaMission = $dateDeDebutDeLaMission;
    }

    public function getDateDeFinDeLaMission()
    {
        return $this->dateDeFinDeLaMission;
    }

    public function setDateDeFinDeLaMission($dateDeFinDeLaMission)
    {
        return $this->dateDeFinDeLaMission = $dateDeFinDeLaMission;
    }
}
