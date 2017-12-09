<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:53
 */
namespace app\models;

use app\Config;
use app\table\SpecialiteTable;

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
     * @return String
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param String $specialite
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

    public static function getAll(){
        $specialitetable = new SpecialiteTable(Config::getInstance()->getDatabase());
        return $specialitetable->getAll();
    }

    public static function getAllinJson(){
        $specialites = self::getAll();
        $tab = [];
        foreach ($specialites as $specialite){
            /**
             * @var $specialite Specialite
             */
            $tab[$specialite->getIdSpecialite()] = $specialite->getSpecialite();
        }

        return json_encode($tab);
    }

}