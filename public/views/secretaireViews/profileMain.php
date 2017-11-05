<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03/11/2017
 * Time: 22:04
 */
?>
<div class="col-lg-10" id="main-div">
    <div id="title-wrapper" class="row">
        <h4>DashBoard</h4>
        <h5>The Best Hospital System In The Market</h5>
    </div>
    <div id="stats-wrapper" class="row">
        <div class="stat shadow col-lg-3 " id="first-stat-div">
            <div class="stat-text col-lg-9">
                <span class="number"><?= count(\app\models\Patient::getAll()) ?></span>
                <span class="legend">number of patients</span>
            </div>
            <div class="stat-font col-lg-3">
                <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
            </div>
        </div>
        <div class="stat shadow col-lg-3  " id="second-stat-div">
            <div class="stat-text col-lg-9">
                <span class="number"><?= count(\app\models\Medecin::getAll()) ?></span>
                <span class="legend">number of doctors</span>
            </div>
            <div class="stat-font col-lg-3">
                <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
            </div>
        </div>
        <div class="stat shadow col-lg-3 " id="third-stat-div">
            <div class="stat-text col-lg-9">
                <span class="number">0</span>
                <span class="legend">number of rooms</span>
            </div>
            <div class="stat-font col-lg-3">
                <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
            </div>
        </div>
        <div class="stat shadow col-lg-3 " id="forth-stat-div">
            <div class="stat-text col-lg-9">
                <span class="number">0</span>
                <span class="legend">number of beds</span>
            </div>
            <div class="stat-font col-lg-3">
                <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
            </div>
        </div>


    </div>
    <div id="main-wrapper" class="row">
        <?php require 'doctorsTable.php';?>


    </div>

</div>