<?php

class entityContact
{
    private $idContact;
    private $nomContact;
    private $prenomContact;
    private $dateDeNaissanceContact;
    private $nomDeCodeContact;
    private $nationaliteContact;

    public function __construct($idContact, $nomContact, $prenomContact, $dateDeNaissanceContact, $nomDeCodeContact, $nationaliteContact)
    {
        $this->idContact = $idContact;
        $this->nomContact = $nomContact;
        $this->prenomContact = $prenomContact;
        $this->dateDeNaissanceContact = $dateDeNaissanceContact;
        $this->nomDeCodeContact = $nomDeCodeContact;
        $this->nationaliteContact = $nationaliteContact;
    }

    public function getIdContact()
    {
        return $this->idContact;
    }

    public function setIdContact($idContact)
    {
        return $this->idContact = $idContact;
    }

    public function getNomContact()
    {
        return $this->nomContact;
    }

    public function setNomContact($nomContact)
    {
        return $this->nomContact = $nomContact;
    }

    public function getPrenomContact()
    {
        return $this->prenomContact;
    }

    public function setPrenomContact($prenomContact)
    {
        return $this->prenomContact = $prenomContact;
    }

    public function getDateDeNaissanceContact()
    {
        return $this->dateDeNaissanceContact;
    }

    public function setDateDeNaissanceContact($dateDeNaissanceContact)
    {
        return $this->dateDeNaissanceContact = $dateDeNaissanceContact;
    }

    public function getCodeDIdentificationContact()
    {
        return $this->nomDeCodeContact;
    }

    public function setCodeDIdentificationContact($nomDeCodeContact)
    {
        return $this->nomDeCodeContact = $nomDeCodeContact;
    }

    public function getNationaliteContact()
    {
        return $this->nationaliteContact;
    }

    public function setNationaliteContact($nationaliteContact)
    {
        return $this->nationaliteContact = $nationaliteContact;
    }
}
