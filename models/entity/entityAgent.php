<?php

class entityAgent
{
    private $idAgent;
    private $nomAgent;
    private $prenomAgent;
    private $dateDeNaissanceAgent;
    private $codeDIdentificationAgent;
    private $nationaliteAgent;
    private $specialitesAgent;

    public function __construct($idAgent, $nomAgent, $prenomAgent, $dateDeNaissanceAgent, $codeDIdentificationAgent, $nationaliteAgent, $specialitesAgent)
    {
        $this->idAgent = $idAgent;
        $this->nomAgent = $nomAgent;
        $this->prenomAgent = $prenomAgent;
        $this->dateDeNaissanceAgent = $dateDeNaissanceAgent;
        $this->codeDIdentificationAgent = $codeDIdentificationAgent;
        $this->nationaliteAgent = $nationaliteAgent;
        $this->specialitesAgent = $specialitesAgent;
    }

    public function getIdAgent()
    {
        return $this->idAgent;
    }

    public function setIdAgent($idAgent)
    {
        return $this->idAgent = $idAgent;
    }

    public function getNomAgent()
    {
        return $this->nomAgent;
    }

    public function setNomAgent($nomAgent)
    {
        return $this->nomAgent = $nomAgent;
    }

    public function getPrenomAgent()
    {
        return $this->prenomAgent;
    }

    public function setPrenomAgent($prenomAgent)
    {
        return $this->prenomAgent = $prenomAgent;
    }

    public function getDateDeNaissanceAgent()
    {
        return $this->dateDeNaissanceAgent;
    }

    public function setDateDeNaissanceAgent($dateDeNaissanceAgent)
    {
        return $this->dateDeNaissanceAgent = $dateDeNaissanceAgent;
    }

    public function getCodeDIdentificationAgent()
    {
        return $this->codeDIdentificationAgent;
    }

    public function setCodeDIdentificationAgent($codeDIdentificationAgent)
    {
        return $this->codeDIdentificationAgent = $codeDIdentificationAgent;
    }

    public function getNationaliteAgent()
    {
        return $this->nationaliteAgent;
    }

    public function setNationaliteAgent($nationaliteAgent)
    {
        return $this->nationaliteAgent = $nationaliteAgent;
    }

    public function getSpecialitesAgent()
    {
        return $this->specialitesAgent;
    }

    public function setSpecialitesAgent($specialitesAgent)
    {
        return $this->specialitesAgent = $specialitesAgent;
    }
}
