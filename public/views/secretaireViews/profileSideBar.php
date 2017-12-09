<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03/11/2017
 * Time: 22:03
 */
?>
<aside class="col l2" id="sidebar">
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
            <h6><a href="#" ><i class="fa fa-home " aria-hidden="true"></i>Home</a></h6>
        </div>

       <div class="item">
           <div class="item-header" id="item-header1">
               <h6><i class="fa fa-user-md" aria-hidden="true"></i>Doctors Stat</h6>
           </div>
           <div class="item-body" id="item-body1" style="display: none">
               <h6><a href="#">sub Menu1</a></h6>
               <h6><a href="#">sub Menu2</a></h6>
               <h6><a href="#">sub Menu3</a></h6>
           </div>

       </div>
       <div class="item">
           <div class="item-header" id="item-header2">
               <h6><i class="fa fa-user" aria-hidden="true"></i> Patients Stat</h6>
           </div>
           <div class="item-body" id="item-body2" style="display: none">
               <h6><a href="#">sub Menu1</a></h6>
               <h6><a href="#">sub Menu2</a></h6>
               <h6><a href="#">sub Menu3</a></h6>
           </div>

       </div>
       <div class="item">
           <div class="item-header" id="item-header3">
               <h6><i class="fa fa-bed" aria-hidden="true"></i> Rooms Stat</h6>
           </div>
           <div class="item-body " id="item-body3" style="display: none">
               <h6><a href="#">sub Menu1</a></h6>
               <h6><a href="#">sub Menu2</a></h6>
               <h6><a href="#">sub Menu3</a></h6>
           </div>

       </div>
       <div class="item">
           <div class="item-header" id="item-header4">
               <h6><i class="fa fa-bed" aria-hidden="true"></i> Beds Stat</h6>
           </div>
           <div class="item-body " id="item-body4" style="display: none">
               <h6><a href="#">sub Menu1</a></h6>
               <h6><a href="#">sub Menu2</a></h6>
               <h6><a href="#">sub Menu3</a></h6>
           </div>

       </div>


    </div>

</aside>
