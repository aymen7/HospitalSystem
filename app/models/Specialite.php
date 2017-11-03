<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:53
 */
namespace app\models;

class Specialite
{
    private $idSpecialite;
    private $specialite;
    private $type;

    const MEDECIN = 0;
    const INFERMIER = 1;

    /**
     * @return int
     */
    public function getIdSpecialite()
    {
        return $this->idSpecialite;
    }

    /**
     * @param int $idSpecialite
     */
    public function setIdSpecialite($idSpecialite)
    {
        $this->idSpecialite = $idSpecialite;
    }

    /**
     * @return Specialite
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param Specialite $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}