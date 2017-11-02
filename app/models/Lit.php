<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:45
 */

class Lit
{
    private $idLit;
    private $dateDebut;
    private $dateFin;
    private $chambre;
    private $patient;

    /**
     * @return int
     */
    public function getIdLit()
    {
        return $this->idLit;
    }

    /**
     * @param int $idLit
     */
    public function setIdLit($idLit)
    {
        $this->idLit = $idLit;
    }

    /**
     * @return DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param DateTime $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param DateTime $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return Chambre
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * @param Chambre $chambre
     */
    public function setChambre($chambre)
    {
        $this->chambre = $chambre;
    }

    /**
     * @return Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @param Patient $patient
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
    }


}