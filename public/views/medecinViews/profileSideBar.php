<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03/11/2017
 * Time: 22:03
 */
?>
<aside class="col-lg-2" id="sidebar">
    <div id="header-wrapper">
        <img src="images/avatarMale.png" alt="user-img" id="user-img">
        <div id="legend-wrapper">
            <?php $user = unserialize($_SESSION['user']) ?>
            <h5><?= $user->getNom() . " " . $user->getPrenom() ?></h5>
            <h4><?= $user->getUsername() ?></h4>
        </div>
    </div>
    <div class="list-wrapper">
        <div id="home-wrapper">
            <h4><a href="#" ><i class="fa fa-home " aria-hidden="true"></i>Home</a></h4>
        </div>

       <div class="item">
           <div class="item-header" id="item-header1">
               <h4><i class="fa fa-user-md" aria-hidden="true"></i>Doctors Stat</h4>
           </div>
           <div class="item-body " id="item-body1">
               <h4><a href="#">sub Menu1</a></h4>
               <h4><a href="#">sub Menu2</a></h4>
               <h4><a href="#">sub Menu3</a></h4>
           </div>

       </div>
       <div class="item">
           <div class="item-header" id="item-header2">
               <h4><i class="fa fa-user" aria-hidden="true"></i>Patients Stat</h4>
           </div>
           <div class="item-body " id="item-body2">
               <h4><a href="#">sub Menu1</a></h4>
               <h4><a href="#">sub Menu2</a></h4>
               <h4><a href="#">sub Menu3</a></h4>
           </div>

       </div>
       <div class="item">
           <div class="item-header" id="item-header3">
               <h4><i class="fa fa-bed" aria-hidden="true"></i>Rooms Stat</h4>
           </div>
           <div class="item-body " id="item-body3">
               <h4><a href="#">sub Menu1</a></h4>
               <h4><a href="#">sub Menu2</a></h4>
               <h4><a href="#">sub Menu3</a></h4>
           </div>

       </div>
       <div class="item">
           <div class="item-header" id="item-header4">
               <h4><i class="fa fa-bed" aria-hidden="true"></i>Beds Stat</h4>
           </div>
           <div class="item-body " id="item-body4">
               <h4><a href="#">sub Menu1</a></h4>
               <h4><a href="#">sub Menu2</a></h4>
               <h4><a href="#">sub Menu3</a></h4>
           </div>

       </div>


    </div>

</aside>
