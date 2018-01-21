<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 04/01/2018
 * Time: 23:51
 */


include "views/template/head.php";

include 'views/secretaireViews/profileHeader.php'; ?>
<section class="container-fluid" id="main-content">
    <div class="row">
        <?php require 'views/medecinViews/profileSideBar.php'; ?>
        <div class="col s10 offset-s2">
            <?php
            require 'ordonnance.php';
            ?>
        </div>
    </div>
</section>

<?php
include "views/template/footer.php";