<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 18/11/2017
 * Time: 14:36
 */

include '../template/head.php';

include 'views/secretaireViews/profileHeader.php'; ?>
<section class="container-fluid" id="main-content">
    <div class="row">
    <?php require 'views/medecinViews/profileSideBar.php'; ?>
        <div class="col s10 offset-s2">
            <?php
            require 'mainProfile.php';
            ?>
        </div>
    </div>
</section>

<?php
include '../template/footer.php';

?>