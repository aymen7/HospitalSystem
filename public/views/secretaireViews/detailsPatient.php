<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 26/12/2017
 * Time: 21:48
 */

use app\models\Medecin;

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $patient = \app\Config::getInstance()->getEntityManager()->find(\app\R::PATIENT, $_GET['id']);
    if ($patient instanceof \app\models\Patient) {
        /**
         * @var $patient \app\models\Patient
         */
        ?>
        <div class="detailsPatient">
            <div class="row">
                <div class="col s6">
                    <div class="card col s12 z-depth-2">
                        <div class="card-content">
                            <h3><b>Informations patient:</b></h3>
                            <div class="col s6">
                                <b>Nom:</b> <?= $patient->getNom() ?>
                            </div>
                            <div class="col s6">
                                <b>Prénom:</b> <?= $patient->getPrenom() ?>
                            </div>
                            <div class="col s12">
                                <b>Date de Naissance:</b> <?= $patient->getDatedenaissance()->format('d/m/Y') ?>
                            </div>
                            <div class="col s12">
                                <b>N° téléphone:</b> <?= $patient->getNumtel() ?>
                            </div>
                            <div class="col s12">
                                <b>N° de sécurité sociale:</b> <?= $patient->getNss() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s6">
                    <div class="card col s12 z-depth-2">
                        <div class="card-content">
                            <h3><b>Suivi par:</b></h3>
                            <?php $medecin = $patient->getUser() ?>
                            <div class="col s6">
                                <b>Nom:</b> <?php if ($medecin instanceof Medecin) echo $medecin->getNom(); ?>
                            </div>
                            <div class="col s6">
                                <b>Prénom:</b> <?php if ($medecin instanceof Medecin) echo $medecin->getPrenom(); ?>
                            </div>
                            <div class="col s12">
                                <b>N°
                                    téléphone:</b> <?php if ($medecin instanceof Medecin) echo $medecin->getNumtel(); ?>
                            </div>
                            <div class="col s12">
                                <b>Grade:</b> <?php
                                if ($medecin instanceof Medecin) echo $medecin->getGrade() ?>
                            </div>
                            <div class="col s12">
                                <b>Spécialité:</b> <?php if ($medecin instanceof Medecin) echo $medecin->getSpecialite(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s6">
                    <div class="card col s12 z-depth-2">

                        <h4><b>Consultations:</b></h4>
                        <?php

                        foreach ($patient->getConsultations() as $consultation) {
                            /**
                             * @var $consultation \app\models\Consultation
                             */
                            ?>
                                <div class="consultation row">
                                    <div class="col s6">
                                        <b>Date:</b> <?= $consultation->getDate()->format('d/m/Y'); ?>
                                    </div>
                                    <div class="col s6">
                                        <b>Faite par:</b> <?= $consultation->getMedecin() ?>
                                    </div>
                                </div>

                            <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col s6">
                    <div class="card col s12 z-depth-2">
                        <div class="card-content col s12">
                            <h4><b>Hospitalisations:</b></h4>
                            <?php
                            foreach ($patient->getLits() as $lit) {
                                /**
                                 * @var $lit \app\models\Lit
                                 */
                                ?>
                                <div class="hospitalisation row">
                                    <div class="col s6">
                                        <b>De</b> <?= $lit->getDatedebut()->format('d/m/Y') ?>
                                        <b>à</b> <?= $lit->getDatefin()->format('d/m/Y') ?>
                                    </div>
                                    <div class="col s6">
                                        <b>Chambre:</b> <?= $lit->getChambre()->getNumero() ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger"
                           href="#addHospitalisationModal"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "addHospitalisationModal.php";
    }

} else {
    header('HTTP/1.1 500 Internal Server');
}
?>

