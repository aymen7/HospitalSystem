<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 02/11/2017
 * Time: 23:04
 */
?>
<!-- login form wrapper it's wrap all the login div -->
<div class="container shadow" id="login-form-wrapper">
    <!-- login frame-->
    <div id="login-frame">
        <!-- frame title-->
        <h1>Hospital Me</h1>
        <!-- login form -->
        <form action="?url=auth/login" method="post" class="form-horizontal" id="login-form">
            <div class="form-group">
                <input type="text" placeholder="username" class="form-control" name="username" required>
                <span id="user-span" class="icon-span"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
            </div>
            <div class="form-group">
                <input type="password" placeholder="password" class="form-control" name="password" required>
                <span id="pass-span" class="icon-span"><i class="fa fa-lock fa-2x" aria-hidden="true"></i></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
            {{errorMessage | raw}}
        </form>
    </div><!-- end login-frame ---------------------->

</div>