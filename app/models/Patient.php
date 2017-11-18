<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:50
 */
namespace app\models;

use app\Config;
use app\table\PatientTable;

class Patient
{
    private $idPatient;
    private $nom;
    private $prenom;
    private $dateDeNaissance;
    private $numTel;
    private $nss;

    /**
     * @return int
     */
    public function getIdPatient()
    {
        return $this->idPatient;
    }

    /**
     * @param int $idPatient
     */
    public function setIdPatient($idPatient)
    {
        $this->idPatient = $idPatient;
    }

    /**
     * @return String
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param String $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return String
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param String $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return DateTime
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * @param DateTime $dateDeNaissance
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
    }

    /**
     * @return String
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * @param String $numTel
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;
    }

    /**
     * @return String
     */
    public function getNss()
    {
        return $this->nss;
    }

    /**
     * @param mixed String
     */
    public function setNss($nss)
    {
        $this->nss = $nss;
    }


    public static function getAll(){
        $patientTable = new PatientTable(Config::getInstance()->getDatabase());
        return $patientTable->getAll();
    }

    public function getLettre(){
        return 'P';
    }

    public function getAvatar(){
        return 'images/patient.png';
    }
}