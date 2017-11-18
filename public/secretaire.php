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
    } elseif(isset($_GET['ajax']) && $_GET['ajax'] == 'searchSugesstions' && isset($_GET['name'])){
        //redirect ajax query to searchSugesstions.php
        require 'ajax/searchSugesstions.php';
        die();
    }
    if (isset($_GET['do']) && $_GET['do'] == 'delete' && isset($_GET['id'])){
        $id = $_GET['id'];
        \app\models\Medecin::delete($id);
        die();
    } elseif (isset($_GET['do']) && $_GET['do'] == 'update' && isset($_GET['id']) && isset($_GET['nom'])
        && isset($_GET['prenom']) && isset($_GET['numTel'])){
        $medecin = \app\models\Medecin::find($_GET['id']);
        $medecin->setNom($_GET['nom']);
        $medecin->setPrenom($_GET['prenom']);
        $medecin->setNumTel($_GET['numTel']);
        $medecin->update();
        die();
    }
    require 'views/secretaireViews/index.php';
} else {
    header('Location: index.php');
}