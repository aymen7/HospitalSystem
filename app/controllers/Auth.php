<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 02/11/2017
 * Time: 21:20
 */

class Auth extends Controller
{

    public function login(){
        $this->view('auth/login', []);
    }


}