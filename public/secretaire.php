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
    } else if (isset($_GET['ajax']) && $_GET['ajax'] == 'patientsTable') {
        //ajax call for next and previous patients table
        require 'views/secretaireViews/patientsTable.php';
        die();
    } else if (isset($_GET['ajax']) && $_GET['ajax'] == 'infirmiersTable') {
        //ajax call for next and previous infirmiers table
        require 'views/secretaireViews/infirmiersTable.php';
        die();
    } else if (isset($_GET['ajax']) && $_GET['ajax'] == 'chambresTable') {
        //ajax call for next and previous infirmiers table
        require 'views/secretaireViews/chambresTable.php';
        die();
    } else if (isset($_GET['ajax']) && $_GET['ajax'] == 'detailsChambre' && isset($_GET['chambre'])) {
        //ajax call for next and previous infirmiers table
        require 'views/secretaireViews/detailsChambre.php';
        die();
    } else if (isset($_GET['ajax']) && $_GET['ajax'] == 'detailsPatient' && isset($_GET['id'])) {
        //ajax call for next and previous infirmiers table
        require 'views/secretaireViews/detailsPatient.php';
        die();
    }
    elseif (isset($_GET['ajax']) && $_GET['ajax'] == 'searchSugesstions' && isset($_GET['name'])) {
        //redirect ajax query to searchSugesstions.php
        require 'ajax/searchSugesstions.php';
        die();
    }

    if (isset($_GET['user']) && $_GET['user'] == 'medecin') {
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*-----------------------------Medecin----------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/
        if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $medecin = $entityManger->find(\app\R::MEDECIN, $id);
            $entityManger->remove($medecin);
            $entityManger->flush();

            die();
        } elseif (isset($_POST['action']) && $_POST['action'] == 'edit' && isset($_POST['nom'])
            && isset($_POST['prenom']) && isset($_POST['numTel']) && isset($_POST['specialite']) && isset($_POST['grade'])) {
            //Create or update Medecin
            $medecin = new \app\models\Medecin();
            if (isset($_POST['id'])) {
                $medecin = $entityManger->find(\app\R::MEDECIN, $_POST['id']);
            } else {
                $medecinRepo = $entityManger->getRepository(\app\R::MEDECIN);
                $med = $medecinRepo->findOneBy(array("username" => $_POST['username']));
                if (!empty($med))//username exist déja
                    header('Location: secretaire.php');
            }

            if (isset($_POST['username']))
                $medecin->setUsername($_POST['username']);
            if (isset($_POST['password'])) {
                $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $medecin->setPassword($hashed);
            }
            $medecin->setNom($_POST['nom']);
            $medecin->setPrenom($_POST['prenom']);
            $medecin->setNumTel($_POST['numTel']);

            $grade = $entityManger->find(\app\R::GRADE, $_POST['grade']);
            $medecin->setGrade($grade);

            $specialite = $entityManger->find(\app\R::SPECIALITE, $_POST['specialite']);
            $medecin->setSpecialite($specialite);

            $entityManger->merge($medecin);
            $entityManger->flush();
            header('Location: index.php');
        }
    } elseif (isset($_GET['user']) && $_GET['user'] == 'patient') {
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*----------------------------------Patient ----------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/

        if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $patient = $entityManger->find(\app\R::PATIENT, $id);
            $entityManger->remove($patient);
            $entityManger->flush();

            die();
        } elseif (isset($_POST['action']) && $_POST['action'] == 'edit' && isset($_POST['nom'])
            && isset($_POST['prenom']) && isset($_POST['numTel']) && isset($_POST['nss']) && isset($_POST['dateDeNaissance'])
            && isset($_POST['medecin'])) {
            //Create or update Patient
            $patient = new \app\models\Patient();

            if (isset($_POST['id'])) {
                $patient = $entityManger->find(\app\R::PATIENT, $_POST['id']);
            } else {
                $patientRepo = $entityManger->getRepository(\app\R::PATIENT);
                $pat = $patientRepo->findOneBy(array("nss" => $_POST['nss']));
                if (!empty($med))//nss exist déja
                    header('Location: secretaire.php');
            }

            $patient->setNom($_POST['nom']);
            $patient->setPrenom($_POST['prenom']);
            $patient->setNumTel($_POST['numTel']);
            $patient->setNss($_POST['nss']);
            $date = new DateTime($_POST['dateDeNaissance']);
            $patient->setDatedenaissance($date);

            $medecin = $entityManger->find(\app\R::MEDECIN, $_POST['medecin']);

            $patient->setUser($medecin);

            $entityManger->merge($patient);
            $entityManger->flush();
            header('Location: index.php?ajax=patientsTable');
        } elseif (isset($_GET['action']) && $_GET['action'] == 'ajouterHospitalisation' && isset($_POST['idPatient'])
        && isset($_POST['chambre']) && isset($_POST['dureeHospitalisation'])){

            $lit = new \app\models\Lit();
            $patient = $entityManger->find(\app\R::PATIENT, $_POST['idPatient']);
            $lit->setPatient($patient);
            $chambre = $entityManger->find(\app\R::CHAMBRE, $_POST['chambre']);
            $lit->setChambre($chambre);

            $duree = $_POST['dureeHospitalisation'];
            $duree = explode(' ', $duree);
            $dateDebut =  DateTime::createFromFormat('d/m/Y', $duree[0]);
            $dateFin =  DateTime::createFromFormat('d/m/Y', end($duree));

            $lit->setDatedebut($dateDebut);
            $lit->setDatefin($dateFin);

            $entityManger->persist($lit);
            $entityManger->flush();

            header('Location: index.php');
        } elseif (isset($_GET['action']) && $_GET['action'] == "modifierHospitalisation" && isset($_POST['idLit'])
        && isset($_POST['dureeHospitalisation'])){
            $lit = $entityManger->find(\app\R::LIT, $_POST['idLit']);

            $duree = $_POST['dureeHospitalisation'];
            $duree = explode(' ', $duree);
            $dateDebut =  DateTime::createFromFormat('d/m/Y', $duree[0]);
            $dateFin =  DateTime::createFromFormat('d/m/Y', end($duree));

            $lit->setDatedebut($dateDebut);
            $lit->setDatefin($dateFin);

            $entityManger->flush();
        }
    } elseif (isset($_GET['user']) && $_GET['user'] == 'infirmier') {
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*------------------------------Infirmier------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/
        /*----------------------------------------------------------------------------*/

        if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $infirmier = $entityManger->find(\app\R::INFIRMIER, $id);
            $entityManger->remove($infirmier);
            $entityManger->flush();
            die();
        } elseif (isset($_POST['action']) && $_POST['action'] == 'edit' && isset($_POST['nom'])
            && isset($_POST['prenom']) && isset($_POST['numTel']) && isset($_POST['specialite']) && isset($_POST['grade'])) {
            //Create or update Medecin
            $infirmier = new \app\models\Infirmier();
            if (isset($_POST['id'])) {
                $infirmier = $entityManger->find(\app\R::INFIRMIER, $_POST['id']);
            } else {
                $infirmierRepo = $entityManger->getRepository(\app\R::INFIRMIER);
                $inf = $infirmierRepo->findOneBy(array("username" => $_POST['username']));
                if (!empty($inf))//username exist déja
                    header('Location: index.php');
            }

            if (isset($_POST['username']))
                $infirmier->setUsername($_POST['username']);
            if (isset($_POST['password'])) {
                $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $infirmier->setPassword($hashed);
            }
            $infirmier->setNom($_POST['nom']);
            $infirmier->setPrenom($_POST['prenom']);
            $infirmier->setNumTel($_POST['numTel']);

            $grade = $entityManger->find(\app\R::GRADE, $_POST['grade']);
            $infirmier->setGrade($grade);

            $specialite = $entityManger->find(\app\R::SPECIALITE, $_POST['specialite']);
            $infirmier->setSpecialite($specialite);

            $entityManger->merge($infirmier);
            $entityManger->flush();
            header('Location: index.php');
        }
        /*-------------------------------------------------------------------------------*/
    } elseif (isset($_GET['user']) && $_GET['user'] == 'secretaire'){
        if (isset($_GET['action']) && $_GET['action'] == "addChambre" && isset($_POST['numero'])
            && isset($_POST['nombreLit'])){
            $chambre = new \app\models\Chambre();
            $chambre->setNumero($_POST['numero']);
            $chambre->setNombrelits($_POST['nombreLit']);

            $entityManger->persist($chambre);
            $entityManger->flush();
        }
    }

    require 'views/secretaireViews/index.php';
} else {
    header('Location: index.php');
}