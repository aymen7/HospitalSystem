<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:47
 */
namespace app\models;
use app\Config;
use app\table\MedecinTable;
class Medecin extends User
{
    private $idSpecialite;
    private $specialite;
    private $idGrade;
    private $grade;
    /**
     * @return mixed
     */
    public function getIdSpecialite()
    {
        return $this->idSpecialite;
    }
    /**
     * @return mixed
     */
    public function getIdGrade()
    {
        return $this->idGrade;
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
     * @return Grade
     */
    public function getGrade()
    {
        return $this->grade;
    }
    /**
     * @param Grade $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }
    public static function getAll($size = null, $ofsset = null){
        $medecinTable = new MedecinTable(Config::getInstance()->getDatabase());
        return $medecinTable->getAll($size, $ofsset);
    }

    /**
     * @param $id int
     */
    public static function delete($id){
        $medecinTable = new MedecinTable(Config::getInstance()->getDatabase());
        $medecinTable->delete($id);
    }

    /**
     * @param $id int
     * @return Medecin
     */
    public static function find($id){
        $medecinTable = new MedecinTable(Config::getInstance()->getDatabase());
        return $medecinTable->findById($id);
    }

    /**
     *
     */
    public function update(){
        $medecinTable = new MedecinTable(Config::getInstance()->getDatabase());
        $medecinTable->update($this);
    }
}