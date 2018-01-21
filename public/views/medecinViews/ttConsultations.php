<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 06/01/2018
 * Time: 20:49
 */

include 'views/template/head.php';


include 'views/secretaireViews/profileHeader.php'; ?>
<section class="container-fluid" id="main-content">
    <div class="row">
        <?php require 'views/medecinViews/profileSideBar.php'; ?>
        <div class="col s10 offset-s2">
            <?php
            $consultationRepo = \app\Config::getInstance()->getEntityManager()->getRepository(\app\R::CONSULTATION);
            $consultations = $consultationRepo->findAll();
            if ($consultations) {
                ?>
                <div class="ttMesConsultations z-depth-2">
                    <h2 class="text-center">Mes consultations</h2>
                    <div class="row">
                        <div class="col s2">
                            <b>N°</b>
                        </div>
                        <div class="col s4">
                            <b>Date</b>
                        </div>
                        <div class="col s6">
                            <b>Patient</b>
                        </div>
                    </div>
                    <?php
                    foreach ($consultations as $consultation) {
                        /**
                         * @var $consultation \app\models\Consultation
                         */
                        ?>
                        <div class="row consultation">
                            <a href="?page=detailsConsultation&id=<?= $consultation->getIdconsultation() ?>">
                                <div class="col s2">
                                    <?= $consultation->getIdconsultation() ?>
                                </div>
                                <div class="col s4">
                                    <?= $consultation->getDate()->format('d/m/Y') ?>
                                </div>
                                <div class="col s6">
                                    <?= $consultation->getPatient() ?>
                                </div>
                            </a>

                        </div>


                        <?php
                    }
                    ?>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</section>

<?php
include 'views/template/head.php';