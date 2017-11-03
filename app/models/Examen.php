<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:38
 */
namespace app\models;

class Examen
{
    private $idExamen;
    private $demande;
    private $effectue;
    private $consultation;


    /**
     * @return int
     */
    public function getIdExamen()
    {
        return $this->idExamen;
    }

    /**
     * @param int $idExamen
     */
    public function setIdExamen($idExamen)
    {
        $this->idExamen = $idExamen;
    }

    /**
     * @return String
     */
    public function getDemande()
    {
        return $this->demande;
    }

    /**
     * @param String $demande
     */
    public function setDemande($demande)
    {
        $this->demande = $demande;
    }

    /**
     * @return int
     */
    public function getEffectue()
    {
        return $this->effectue;
    }

    /**
     * @param int $effectue
     */
    public function setEffectue($effectue)
    {
        $this->effectue = $effectue;
    }

    /**
     * @return Consultation
     */
    public function getConsultation()
    {
        return $this->consultation;
    }

    /**
     * @param Consultation $consultation
     */
    public function setConsultation($consultation)
    {
        $this->consultation = $consultation;
    }


}