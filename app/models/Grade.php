<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:41
 */
namespace app\models;

use app\Config;
use app\table\GradeTable;

class Grade
{

    private $idGrade;
    private $grade;
    private $type;

    const MEDECIN = 0;
    const INFERMIER = 1;

    /**
     * @return int
     */
    public function getIdGrade()
    {
        return $this->idGrade;
    }

    /**
     * @param int $idGrade
     */
    public function setIdGrade($idGrade)
    {
        $this->idGrade = $idGrade;
    }

    /**
     * @return String
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param String $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
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
        $gradeTable = new GradeTable(Config::getInstance()->getDatabase());
        return $gradeTable->getAll();
    }

    public static function getAllinJson() {
        $grades = self::getAll();
        $tab = [];
        foreach ($grades as $grade) {
            /**
             * @var $grade Grade
             */
            $tab[$grade->getIdGrade()] = $grade->getGrade();
        }

        return json_encode($tab);
    }
}