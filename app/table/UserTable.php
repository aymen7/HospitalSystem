<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 03/11/2017
 * Time: 18:16
 */

namespace app\table;


use app\Config;
use app\models\User;

class UserTable extends Table
{

    /**
     * get user by his username
     * return user (Medecin, Infermier, Secretaire) if username exist else false
     * @param $username String
     * @return User
     */
    public function getUser($username)
    {
        $user = $this->db->prepare("SELECT * FROM user WHERE username = ?", array($username), User::class, true);
        if (!$user instanceof User)
            return null;
        if ($user->getPoste() == 'S') {
            $secretaireTable = new SecretaireTable(Config::getInstance()->getDatabase());
            return $secretaireTable->findById($user->getIdUser());
        } else if ($user->getPoste() == 'M') {
            $medecinTable = new MedecinTable(Config::getInstance()->getDatabase());
            return $medecinTable->findById($user->getIdUser());
        } else if ($user->getPoste() == 'I') {
            $infirmierTable = new InfirmierTable(Config::getInstance()->getDatabase());
            return $infirmierTable->findById($user);
        }
        return null;
    }
}