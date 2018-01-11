<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:53
 */

namespace app\models;

use app\Config;
use app\R;

/**
 * Specialite
 *
 * @Table(name="specialite")
 * @Entity
 */
class Specialite
{
    const MEDECIN = false;
    const INFIRMIER = true;
    /**
     * @var integer
     *
     * @Column(name="idSpecialite", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idspecialite;
    /**
     * @var string
     *
     * @Column(name="specialite", type="string", length=30, nullable=false)
     */
    private $specialite;
    /**
     * @var boolean
     *
     * @Column(name="type", type="boolean", nullable=false)
     */
    private $type;

    public static function getAllinJson($type = null)
    {
        $specialites = self::getAll($type);
        $tab = [];
        foreach ($specialites as $specialite) {
            /**
             * @var $specialite Specialite
             */
            $tab[$specialite->getIdSpecialite()] = $specialite->getSpecialite();
        }

        return json_encode($tab);
    }

    public static function getAll($type = null)
    {
        $specialiteRepo = Config::getInstance()->getEntityManager()->getRepository(R::SPECIALITE);
        if (!isset($type))
            return $specialiteRepo->findAll();
        return $specialiteRepo->findBy(array('type' => $type));
    }

    /**
     * @return int
     */
    public function getIdspecialite()
    {
        return $this->idspecialite;
    }

    /**
     * @param int $idspecialite
     */
    public function setIdspecialite($idspecialite)
    {
        $this->idspecialite = $idspecialite;
    }

    /**
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param string $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
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

    public function __toString()
    {
        return $this->specialite;
    }

}


