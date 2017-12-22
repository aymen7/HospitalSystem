<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 21/12/2017
 * Time: 16:44
 */
require_once 'app/Config.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(\app\Config::getInstance()->getEntityManager());