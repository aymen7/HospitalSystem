<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03/11/2017
 * Time: 22:03
 */
?>
<aside class="col s2" id="sidebar">
    <div id="header-wrapper">
        <img src="images/avatarMale.png" alt="user-img" id="user-img">
        <div id="legend-wrapper">
            <?php $user = unserialize($_SESSION['user']) ?>
            <h6><?= $user->getNom() . " " . $user->getPrenom() ?></h6>
            <h5><?= $user->getUsername() ?></h5>
        </div>
    </div>
    <div class="list-wrapper">
        <div id="home-wrapper">
            <h6><a href="index.php" ><i class="fa fa-home " aria-hidden="true"></i>Home</a></h6>
        </div>

       <div class="item">
           <div class="item-header" id="item-header1">
               <a href="?ajax=doctorsTable" class="link"><h6><i class="fa fa-user-md" aria-hidden="true"></i>Médecins</h6></a>
           </div>

       </div>
       <div class="item">
           <div class="item-header" id="item-header2">
               <a href="?ajax=patientsTable" class="link"><h6><i class="fa fa-user" aria-hidden="true"></i>Patients</h6></a>
           </div>
       </div>
        <div class="item">
            <div class="item-header" id="item-header3">
                <a href="?ajax=infirmiersTable" class="link"><h6><i class="fa fa-user-md" aria-hidden="true"></i>Infirmiers</h6></a>
            </div>
        </div>
       <div class="item">
           <div class="item-header" id="item-header4">
               <a href="?ajax=chambresTable" class="link"><h6><i class="fa fa-bed" aria-hidden="true"></i>Chambres</h6></a>
           </div>
       </div>
    </div>

</aside>
