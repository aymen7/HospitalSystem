<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03/11/2017
 * Time: 19:34
 */
?>
<header class="container-fluid ">
    <div class="container">
        <div class="col-lg-3" id="brand-wraper">
            <h1>Hospital Me</h1>
        </div>
        <div class="col-lg-8 row" id="search-wraper">
            <form action="" method="post" id="search-form">
                <input type="text" placeholder="search ...." class="form-control" required id="search-field" >
                <select name="search-option" id="search-option" class="form-control" required >
                    <option value="" selected disabled>categorie</option>
                    <option value="nom">Nom</option>
                    <option value="prenom">Prenom</option>
                    <option value="tel">tel</option>
                    <option value="specialite">spécialité</option>
                    <option value="grade">Grade</option>
                </select>
                <button id="search-submit" name="search-submt" type="submit" class="btn btn-default">
                    <i class="fa fa-search fa-2x" aria-hidden="true"></i>
                </button>

            </form>
        </div>
        <div class="col-lg-1" id="logOut-wraper">
            <div class="dropdown">
                <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
            </div>
        </div>

    </div><!-- end of the div-->

</header><!-- end of the header-->
