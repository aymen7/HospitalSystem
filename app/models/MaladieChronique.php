<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:46
 */

class MaladieChronique
{
    private $idMaladie;
    private $maladie;
    private $patient;
    private $medecin;

    /**
     * @return int
     */
    public function getIdMaladie()
    {
        return $this->idMaladie;
    }

    /**
     * @param int $idMaladie
     */
    public function setIdMaladie($idMaladie)
    {
        $this->idMaladie = $idMaladie;
    }

    /**
     * @return String
     */
    public function getMaladie()
    {
        return $this->maladie;
    }

    /**
     * @param String $maladie
     */
    public function setMaladie($maladie)
    {
        $this->maladie = $maladie;
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