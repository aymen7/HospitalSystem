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
    if (isset($_GET['ajax']) && $_GET['ajax'] == 'doctorsTable') {
        //ajax call for next and previous doctors table
        require 'views/secretaireViews/doctorsTable.php';
        die();
    }
    require 'views/secretaireViews/index.php';
} else {
    header('Location: index.php');
}