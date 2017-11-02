<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:54
 */

class TypeExamen
{
    private $idTypeExamen;
    private $analyse;
    private $resultat;
    private $examen;

    /**
     * @return int
     */
    public function getIdTypeExamen()
    {
        return $this->idTypeExamen;
    }

    /**
     * @param int $idTypeExamen
     */
    public function setIdTypeExamen($idTypeExamen)
    {
        $this->idTypeExamen = $idTypeExamen;
    }

    /**
     * @return String
     */
    public function getAnalyse()
    {
        return $this->analyse;
    }

    /**
     * @param String $analyse
     */
    public function setAnalyse($analyse)
    {
        $this->analyse = $analyse;
    }

    /**
     * @return String
     */
    public function getResultat()
    {
        return $this->resultat;
    }

    /**
     * @param String $resultat
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;
    }

    /**
     * @return Examen
     */
    public function getExamen()
    {
        return $this->examen;
    }

    /**
     * @param Examen $examen
     */
    public function setExamen($examen)
    {
        $this->examen = $examen;
    }


}