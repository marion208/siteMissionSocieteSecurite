<?php

class entityCible
{
    private $idCible;
    private $nomCible;
    private $prenomCible;
    private $dateDeNaissanceCible;
    private $nomDeCodeCible;
    private $nationaliteCible;

    public function __construct($idCible, $nomCible, $prenomCible, $dateDeNaissanceCible, $nomDeCodeCible, $nationaliteCible)
    {
        $this->idCible = $idCible;;
        $this->nomCible = $nomCible;
        $this->prenomCible = $prenomCible;
        $this->dateDeNaissanceCible = $dateDeNaissanceCible;
        $this->nomDeCodeCible = $nomDeCodeCible;
        $this->nationaliteCible = $nationaliteCible;
    }

    public function getIdCible()
    {
        return $this->idCible;
    }

    public function setIdCible($idCible)
    {
        return $this->idCible = $idCible;
    }

    public function getNomCible()
    {
        return $this->nomCible;
    }

    public function setNomCible($nomCible)
    {
        return $this->nomCible = $nomCible;
    }

    public function getPrenomCible()
    {
        return $this->prenomCible;
    }

    public function setPrenomCible($prenomCible)
    {
        return $this->prenomCible = $prenomCible;
    }

    public function getDateDeNaissanceCible()
    {
        return $this->dateDeNaissanceCible;
    }

    public function setDateDeNaissanceCible($dateDeNaissanceCible)
    {
        return $this->dateDeNaissanceCible = $dateDeNaissanceCible;
    }

    public function getCodeDIdentificationCible()
    {
        return $this->nomDeCodeCible;
    }

    public function setCodeDIdentificationCible($nomDeCodeCible)
    {
        return $this->nomDeCodeCible = $nomDeCodeCible;
    }

    public function getNationaliteCible()
    {
        return $this->nationaliteCible;
    }

    public function setNationaliteCible($nationaliteCible)
    {
        return $this->nationaliteCible = $nationaliteCible;
    }
}
