<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03/11/2017
 * Time: 22:04
 */
?>
<div class="col s10 offset-s2" id="main-div">
    <div id="stats-wrapper" class="row">
        <div class="stat shadow col l3 tooltipped" id="first-stat-div" data-position="bottom" data-delay="50"
             data-tooltip="Accéder à la liste des médecins">
            <a href="?ajax=doctorsTable" >
                <div class="stat-text col l9">
                    <span class="number"><?= count(\app\models\Medecin::getAll()) ?></span>
                    <span class="legend">Médecins</span>
                </div>
                <div class="stat-font col l3">
                    <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <div class="stat shadow col l3 tooltipped" id="second-stat-div" data-position="bottom" data-delay="50"
             data-tooltip="Accéder à la liste des patients">
            <a href="?ajax=patientsTable" >
                <div class="stat-text col l9">
                    <span class="number"><?= count(\app\models\Patient::getAll()) ?></span>
                    <span class="legend">Patients</span>
                </div>
                <div class="stat-font col l3">
                    <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <div class="stat shadow col l3 tooltipped" id="third-stat-div" data-position="bottom" data-delay="50"
             data-tooltip="Accéder à la liste des infirmiers">
            <a href="?ajax=infirmiersTable">
                <div class="stat-text col l9">
                    <span class="number"><?= count(\app\models\Infirmier::getAll()) ?></span>
                    <span class="legend">Infirmiers</span>
                </div>
                <div class="stat-font col l3">
                    <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <div class="stat shadow col l3 tooltipped" id="forth-stat-div" data-position="bottom" data-delay="50"
             data-tooltip="Accéder à la liste des chambres">
            <a href="?ajax=chambresTable" >
                <div class="stat-text col l9">
                    <span class="number"><?= count(\app\models\Chambre::getAll()); ?></span>
                    <span class="legend">Chambre</span>
                </div>
                <div class="stat-font col l3">
                    <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
                </div>
            </a>
        </div>
    </div>
    <div id="main-wrapper" class="row">
        <?php require 'doctorsTable.php'; ?>
    </div>
</div>