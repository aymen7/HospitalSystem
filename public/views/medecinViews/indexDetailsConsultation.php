<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 04/01/2018
 * Time: 23:51
 */

include "../template/head.php";

 include 'views/secretaireViews/profileHeader.php'; ?>
<section class="container-fluid" id="main-content">
    <div class="row">
        <?php require 'views/medecinViews/profileSideBar.php'; ?>
        <div class="col s10 offset-s2">
            <?php
            require 'detaisConsultation.php';
            ?>
        </div>
    </div>
</section>

<?php
include "../template/footer.php";