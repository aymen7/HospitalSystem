<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 21/03/2017
 * Time: 14:54
 */

namespace app;


class Config
{
    private static $instanse = null;
    private $settings = [];
    private $db;

    /**
     * Config constructor.
     * La classe Config est singleton
     */
    private function __construct()
    {
        $this->settings['DB_NAME'] = 'chu';
        $this->settings['DB_USER'] = 'root';
        $this->settings['DB_PASS'] = '';
        $this->settings['DB_HOST'] = 'localhost';
    }

    /**
     * @return Config Instance qui contient tt les configs du site
     */
    public static function getInstance()
    {
        if (self::$instanse === null) {
            self::$instanse = new Config();
        }
        return self::$instanse;
    }

    public function get($key)
    {
        if (isset($this->settings[$key]))
            return $this->settings[$key];
        else
            return null;
    }

    /**
     * @return Db Instance de la base de donnée
     */
    public function getDatabase()
    {
        if ($this->db === null) {
            $this->db = new Db($this->settings['DB_NAME'], $this->settings['DB_USER'], $this->settings['DB_PASS'], $this->settings['DB_HOST']);
        }
        return $this->db;
    }


}