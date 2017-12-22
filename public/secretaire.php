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
    $entityManger = \app\Config::getInstance()->getEntityManager();

    if (isset($_GET['ajax']) && $_GET['ajax'] == 'doctorsTable') {
        //ajax call for next and previous doctors table
        require 'views/secretaireViews/doctorsTable.php';
        die();
    } elseif(isset($_GET['ajax']) && $_GET['ajax'] == 'searchSugesstions' && isset($_GET['name'])){
        //redirect ajax query to searchSugesstions.php
        require 'ajax/searchSugesstions.php';
        die();
    }
    if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['id'])){
        $id = $_POST['id'];
        $medecin = $entityManger->find(\app\R::MEDECIN, $id);
        $entityManger->remove($medecin);
        $entityManger->flush();

        die();
    } elseif (isset($_POST['action']) && $_POST['action'] == 'edit' && isset($_POST['id']) && isset($_POST['nom'])
        && isset($_POST['prenom']) && isset($_POST['numTel']) && isset($_POST['specialite']) && isset($_POST['grade'])){
        $medecin = \app\models\Medecin::find($_POST['id']);
        $medecin->setNom($_POST['nom']);
        $medecin->setPrenom($_POST['prenom']);
        $medecin->setNumTel($_POST['numTel']);
        $medecin->setIdGrade($_POST['grade']);
        $medecin->setIdSpecialite($_POST['specialite']);
        $medecin->update();
        die();
    } elseif (isset($_POST['action']) && $_POST['action'] == 'edit' && isset($_POST['id']) && isset($_POST['nom'])
        && isset($_POST['prenom']) && isset($_POST['numTel']) && isset($_POST['specialite']) && isset($_POST['grade'])) {
    }

        require 'views/secretaireViews/index2.php';
} else {
    header('Location: index.php');
}