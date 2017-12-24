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

/**
 * Medecin
 * @Entity
 */
class Medecin extends User
{

    public static function getAll($size = null, $offset = null){
        $medecinRepo = Config::getInstance()->getEntityManager()->getRepository(R::MEDECIN);
        return $medecinRepo->findBy(array(), array(), $size, $offset);

    }

    public static function getAllInJson(){
        $medecins = self::getAll();
        $tab = [];
        $tab['null'] = "";
        foreach ($medecins as $medecin){
            /**
             * @var $medecin Medecin
             */
            $tab[$medecin->getIduser()] = $medecin->__toString();
        }
        return json_encode($tab);
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

    public function getLettre(){
        return 'M';
    }

    public function getAvatar(){
        return 'images/doctor.png';
    }
}