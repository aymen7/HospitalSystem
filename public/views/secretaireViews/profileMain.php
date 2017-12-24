<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03/11/2017
 * Time: 22:04
 */
?>
<div class="col l10" id="main-div">
    <div id="stats-wrapper" class="row">
        <div class="stat shadow col l3" id="first-stat-div">
            <a href="?ajax=doctorsTable">
                <div class="stat-text col l9">
                    <span class="number"><?= count(\app\models\Medecin::getAll()) ?></span>
                    <span class="legend">Médecins</span>
                </div>
                <div class="stat-font col l3">
                    <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <div class="stat shadow col l3  " id="second-stat-div">
            <a href="?ajax=patientsTable">
                <div class="stat-text col l9">
                    <span class="number"><?= count(\app\models\Patient::getAll()) ?></span>
                    <span class="legend">Patients</span>
                </div>
                <div class="stat-font col l3">
                    <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
                </div>
            </a>
        </div>
        <div class="stat shadow col l3 " id="third-stat-div">
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
        <div class="stat shadow col l3 " id="forth-stat-div">
            <div class="stat-text col l9">
                <span class="number">0</span>
                <span class="legend">Lits</span>
            </div>
            <div class="stat-font col l3">
                <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div id="main-wrapper" class="row">
        <?php require 'doctorsTable.php'; ?>
    </div>
</div>