<?php

/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 21/03/2017
 * Time: 14:52
 */

/**
 * Class Autoloader
 * @package Tutoriel
 */

namespace app;
class Autoloader
{
    /**
     * Enregistre notre autoloader
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class)
    {
        require_once '../vendor/autoload.php';

        if (strpos($class, 'app') == 0){
            if (strpos($class, __NAMESPACE__ . '\\') === 0) {
                $class = str_replace(__NAMESPACE__ . '\\', '', $class);
                $class = str_replace('\\', '/', $class);
                require __DIR__ . '\\' . $class . '.php';
            }
        }else{


        }
    }
}