<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:43
 */
namespace app\models;
use app\Config;
use app\R;

require_once 'User.php';

/**
 * Infirmier
 * @Entity
 */
class Infirmier extends User
{

    public static function getAll($size = null, $offset = null){
        $infirmierRepo = Config::getInstance()->getEntityManager()->getRepository(R::INFIRMIER);
        return $infirmierRepo->findBy(array(), array(), $size, $offset);

    }

}