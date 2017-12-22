<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:41
 */
namespace app\models;


use app\Config;
use app\R;

/**
 * app\Grade
 *
 * @Entity
 * @Table(name="grade")
 */
class Grade
{
    /**
     * @var integer
     *
     * @Column(name="idGrade", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idgrade;

    /**
     * @var string
     *
     * @Column(name="grade", type="string", length=30, nullable=false)
     */
    private $grade;

    /**
     * @var boolean
     *
     * @Column(name="type", type="boolean", nullable=false)
     */
    private $type;

    public static function getAll(){
        $gradeRepo = Config::getInstance()->getEntityManager()->getRepository(R::GRADE);
        return $gradeRepo->findAll();
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

    /**
     * @return int
     */
    public function getIdgrade()
    {
        return $this->idgrade;
    }

    /**
     * @param int $idgrade
     */
    public function setIdgrade($idgrade)
    {
        $this->idgrade = $idgrade;
    }

    /**
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param string $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return bool
     */
    public function isType()
    {
        return $this->type;
    }

    /**
     * @param bool $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}

