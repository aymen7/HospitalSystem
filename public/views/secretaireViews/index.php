<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 05/12/2017
 * Time: 20:53
 */

include "views/template/head.php";

include 'profileHeader.php' ?>
<section class="container-fluid" id="main-content">
    <div class="row">
        <?php require 'profileSideBar.php'; ?>
        <?php require 'profileMain.php'; ?>
    </div>
</section>

<?php
include "views/template/footer.php";