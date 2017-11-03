<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:47
 */
namespace app\models;
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


}