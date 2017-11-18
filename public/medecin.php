<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 18/11/2017
 * Time: 13:58
 */

session_start();
require_once '../app/Autoloader.php';
\app\Autoloader::register();
if (isset($_SESSION['user']) && unserialize($_SESSION['user']) instanceof \app\models\Medecin) {
    //redirect ajax query to searchSugesstions.php
    if(isset($_GET['ajax']) && $_GET['ajax'] == 'searchSugesstions' && isset($_GET['name'])){
        require 'ajax/searchSugesstions.php';
        die();
    }
    require "views/medecinViews/index.php";
}
else{
    header("Location: index.php");
}
