<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 03/11/2017
 * Time: 22:44
 */
session_start();
require_once '../app/Autoloader.php';

\app\Autoloader::register();
if (isset($_SESSION['user']) && unserialize($_SESSION['user']) instanceof \app\models\Secretaire) {
    if (isset($_GET['ajax']) && $_GET['ajax'] == 'doctorsTable' && isset($_GET['start'])) {
        //ajax call for next and previous doctors table
        $url = 'views/secretaireViews/doctorsTable.php';
        require $url;
        die();
    }
    require 'views/secretaireViews/index.php';
} else {
    header('Location: index.php');
}