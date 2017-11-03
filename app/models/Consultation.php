<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:35
 */
namespace app\models;

class Consultation
{
    private $idConsultation;
    private $date;
    private $rapport;
    private $patient;
    private $medecin;

    /**
     * @return int
     */
    public function getIdConsultation()
    {
        return $this->idConsultation;
    }

    /**
     * @param int $idConsultation
     */
    public function setIdConsultation($idConsultation)
    {
        $this->idConsultation = $idConsultation;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return String
     */
    public function getRapport()
    {
        return $this->rapport;
    }

    /**
     * @param String $rapport
     */
    public function setRapport($rapport)
    {
        $this->rapport = $rapport;
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

    /**
     * @return Medecin
     */
    public function getMedecin()
    {
        return $this->medecin;
    }

    /**
     * @param Medecin $medecin
     */
    public function setMedecin($medecin)
    {
        $this->medecin = $medecin;
    }



}