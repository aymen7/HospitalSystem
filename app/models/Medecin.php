<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:47
 */

namespace app\models;

use app\Config;
use app\R;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Medecin
 * @Entity
 */
class Medecin extends User
{

    public static function getAllInJson()
    {
        $medecins = self::getAll();
        $tab = [];
        $tab['null'] = "";
        foreach ($medecins as $medecin) {
            /**
             * @var $medecin Medecin
             */
            $tab[$medecin->getIduser()] = $medecin->__toString();
        }
        return json_encode($tab);
    }

    public static function getAll($size = null, $offset = null)
    {
        $medecinRepo = Config::getInstance()->getEntityManager()->getRepository(R::MEDECIN);
        return $medecinRepo->findBy(array(), array(), $size, $offset);

    }

    /**
     * @param $id int
     */
    public static function delete($id)
    {
        $medecinTable = new MedecinTable(Config::getInstance()->getDatabase());
        $medecinTable->delete($id);
    }

    /**
     * @param $id int
     * @return Medecin
     */
    public static function find($id)
    {
        $medecinTable = new MedecinTable(Config::getInstance()->getDatabase());
        return $medecinTable->findById($id);
    }

    /**
     *
     */
    public function update()
    {
        $medecinTable = new MedecinTable(Config::getInstance()->getDatabase());
        $medecinTable->update($this);
    }

    public function getLettre()
    {
        return 'M';
    }

    public function getAvatar()
    {
        return 'images/doctor.png';
    }


    public function lastConsultations($size = null, $offset = null){
        $em = Config::getInstance()->getEntityManager()->getRepository(R::CONSULTATION);
        return $em->findBy(array('medecin' => $this->getIduser()), array('date' => 'DESC'), $size, $offset);
    }

    public function mesPatients($size = null, $offset = null){
        $em = Config::getInstance()->getEntityManager()->getRepository(R::PATIENT);
        return $em->findBy(array('user' => $this->getIduser()), array('idpatient' => 'DESC'), $size, $offset);
    }

}