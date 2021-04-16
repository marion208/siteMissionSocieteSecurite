<?php

class entityAdministrateur
{
    private $idAdmin;
    private $nomAdmin;
    private $prenomAdmin;
    private $mailAdmin;
    private $motDePasseAdmin;
    private $dateDeCreationAdmin;

    public function __construct($idAdmin, $nomAdmin, $prenomAdmin, $mailAdmin, $motDePasseAdmin, $dateDeCreationAdmin)
    {
        $this->idAdmin = $idAdmin;
        $this->nomAdmin = $nomAdmin;
        $this->prenomAdmin = $prenomAdmin;
        $this->mailAdmin = $mailAdmin;
        $this->motDePasseAdmin = $motDePasseAdmin;
        $this->dateDeCreationAdmin = $dateDeCreationAdmin;
    }

    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    public function setIdAdmin($idAdmin)
    {
        return $this->idAdmin = $idAdmin;
    }

    public function getNomAdmin()
    {
        return $this->nomAdmin;
    }

    public function setNomAdmin($nomAdmin)
    {
        return $this->nomAdmin = $nomAdmin;
    }

    public function getPrenomAdmin()
    {
        return $this->prenomAdmin;
    }

    public function setPrenomAdmin($prenomAdmin)
    {
        return $this->prenomAdmin = $prenomAdmin;
    }

    public function getMailAdmin()
    {
        return $this->mailAdmin;
    }

    public function setMailAdmin($mailAdmin)
    {
        return $this->mailAdmin = $mailAdmin;
    }

    public function getMotDePasseAdmin()
    {
        return $this->motDePasseAdmin;
    }

    public function setMotDePasseAdmin($motDePasseAdmin)
    {
        return $this->motDePasseAdmin = $motDePasseAdmin;
    }

    public function getDateDeCreationAdmin()
    {
        return $this->dateDeCreationAdmin;
    }

    public function setDateDeCreationAdmin($dateDeCreationAdmin)
    {
        return $this->dateDeCreationAdmin = $dateDeCreationAdmin;
    }
}
