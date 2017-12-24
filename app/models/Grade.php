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
    const MEDECIN = false;
    const INFIRMIER = true;
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

    public static function getAllinJson($type = null)
    {
        $grades = self::getAll($type);
        $tab = [];
        foreach ($grades as $grade) {
            /**
             * @var $grade Grade
             */
            $tab[$grade->getIdGrade()] = $grade->getGrade();
        }

        return json_encode($tab);
    }

    public static function getAll($type = null)
    {
        $gradeRepo = Config::getInstance()->getEntityManager()->getRepository(R::GRADE);
        if (!isset($type))
            return $gradeRepo->findAll();
        return $gradeRepo->findBy(array('type' => $type));
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

