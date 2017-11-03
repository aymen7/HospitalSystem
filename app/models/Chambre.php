<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:29
 */
namespace app\models;
class Chambre
{
    private $idChambre;
    private $numero;
    private $nombreLits;

    /**
     * @return int
     */
    public function getIdChambre()
    {
        return $this->idChambre;
    }

    /**
     * @param int $idChambre
     */
    public function setIdChambre($idChambre)
    {
        $this->idChambre = $idChambre;
    }

    /**
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return int
     */
    public function getNombreLits()
    {
        return $this->nombreLits;
    }

    /**
     * @param int $nombreLits
     */
    public function setNombreLits($nombreLits)
    {
        $this->nombreLits = $nombreLits;
    }


}