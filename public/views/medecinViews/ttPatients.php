<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 06/01/2018
 * Time: 20:49
 */

include "views/template/head.php";

include 'views/secretaireViews/profileHeader.php'; ?>
<section class="container-fluid" id="main-content">
    <div class="row">
        <?php require 'views/medecinViews/profileSideBar.php'; ?>
        <div class="col s10 offset-s2">
            <?php
            $medecin = unserialize($_SESSION['user']);
            /**
             * @var $medecin \app\models\Medecin
             */
            $patients = $medecin->mesPatients();

            if ($patients) {
                ?>
                <div class="ttMesPatients z-depth-2">
                    <h2 class="text-center">Mes patients</h2>
                    <div class="row">
                        <div class="col s1">
                            <b>N°</b>
                        </div>
                        <div class="col s3">
                            <b>Nom</b>
                        </div>
                        <div class="col s3">
                            <b>Prénom</b>
                        </div>
                        <div class="col s2">
                            <b>Date de naissance</b>
                        </div>
                        <div class="col s3">
                            <b>N°SS</b>
                        </div>
                    </div>
                    <?php
                    foreach ($patients as $patient) {
                        /**
                         * @var $patient \app\models\Patient
                         */
                        ?>
                        <div class="row patient">
                            <a href="?page=detailsPatient&id=<?= $patient->getIdpatient() ?>">
                                <div class="col s1">
                                    <?= $patient->getIdpatient() ?>
                                </div>
                                <div class="col s3">
                                    <?= $patient->getNom() ?>
                                </div>
                                <div class="col s3">
                                    <?= $patient->getPrenom() ?>
                                </div>
                                <div class="col s2">
                                    <?= $patient->getDatedenaissance()->format('d/m/Y')?>
                                </div>
                                <div class="col s3">
                                    <?= $patient->getNss()?>
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
include "views/template/footer.php";