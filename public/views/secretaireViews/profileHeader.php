<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03/11/2017
 * Time: 19:34
 */
?>
<header class="container-fluid ">
    <div class="row">
        <div class="col l3" id="brand-wraper">
            <h4>Hospital Me</h4>
        </div>
        <div class="col l8 row" id="search-wraper">
            <div class="search-form input-field">
                <span id="search-span"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input type="text" placeholder="Rechercher..." id="search-bar" class="form-control">
                <div class="search-suggestions">
                </div>
            </div>
        </div>
        <div class="col l1" id="logOut-wraper">
            <a class="dropdown-button btn btn-flat white-text" data-activates='dropdown1' href="#">
                <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
            </a>
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </div>

    </div><!-- end of the div-->

</header><!-- end of the header-->
