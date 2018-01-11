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


    /**
     * Nouvelle consultation
     */
    if (isset($_GET['action']) && $_GET['action'] == 'consultation'){
        if (isset($_GET['idPatient']) && isset($_GET['rapportConsultation'])){
            $em = \app\Config::getInstance()->getEntityManager();
            $consultation = new \app\models\Consultation();
            $patient = $em->find(\app\R::PATIENT, $_GET['idPatient']);
            if ($patient instanceof \app\models\Patient){
                $consultation->setPatient($patient);
                $medecin = $em->getReference(\app\R::MEDECIN, unserialize($_SESSION['user'])->getIduser());
                $consultation->setMedecin($medecin);

                $consultation->setDate(new DateTime());
                $consultation->setRapport($_GET['rapportConsultation']);

                if (isset($_GET['medicament']) && isset($_GET['quantite']) && isset($_GET['remarqueMedicament'])){
                    $quantites = $_GET['quantite'];
                    $remarques = $_GET['remarqueMedicament'];
                    $i = 0;
                    $ordonnance = new \app\models\Ordonnance();
                    foreach ($_GET['medicament'] as $medicament) {
                        $ligne = new \app\models\LigneOrdonnance();
                        $ligne->setMedicament($medicament);
                        $ligne->setQuantite($quantites[$i]);
                        $ligne->setRemarque($remarques[$i]);
                        $i++;

                        $ligne->setOrdonnance($ordonnance);
                        $em->persist($ligne);

                    }
                    $ordonnance->setConsultation($consultation);
                    $em->persist($ordonnance);
                }

                if (isset($_GET['examen'])){
                    $examen = new \app\models\Examen();
                    foreach ($_GET['examen'] as $examenDemande){
                        $typeExamen = new \app\models\Typeexamen();
                        $typeExamen->setAnalyse($examenDemande);

                        $typeExamen->setExamen($examen);
                        $em->persist($typeExamen);
                    }

                    $examen->setConsultation($consultation);
                    $em->persist($examen);
                }


                $em->persist($consultation);
                $em->flush();
                header('Location: index.php');
            }
        }
    }

    if (isset($_GET['page']) && $_GET['page'] == "consultation"){
        require "views/medecinViews/indexConsultation.php";
        die();
    } elseif (isset($_GET['page']) && $_GET['page'] == 'detailsConsultation'){
        require 'views/medecinViews/indexDetailsConsultation.php';
        die();
    } elseif (isset($_GET['page']) && $_GET['page'] == 'detailsPatient'){
        require 'views/medecinViews/indexDetailsPatient.php';
        die();
    } elseif (isset($_GET['page']) && $_GET['page'] == 'mesConsultation'){
        require 'views/medecinViews/ttConsultations.php';
        die();
    } elseif (isset($_GET['page']) && $_GET['page'] == 'mesPatients'){
        require 'views/medecinViews/ttPatients.php';
        die();
    }

    require "views/medecinViews/index.php";
}
else{
    header("Location: index.php");
}
