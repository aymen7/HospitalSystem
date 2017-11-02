<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:49
 */

class Ordonnace
{
    private $idOrdonnance;
    private $medicament;
    private $quantite;
    private $remarque;
    private $consultation;

    /**
     * @return int
     */
    public function getIdOrdonnance()
    {
        return $this->idOrdonnance;
    }

    /**
     * @param int $idOrdonnance
     */
    public function setIdOrdonnance($idOrdonnance)
    {
        $this->idOrdonnance = $idOrdonnance;
    }

    /**
     * @return String
     */
    public function getMedicament()
    {
        return $this->medicament;
    }

    /**
     * @param String $medicament
     */
    public function setMedicament($medicament)
    {
        $this->medicament = $medicament;
    }

    /**
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return String
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * @param String $remarque
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;
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