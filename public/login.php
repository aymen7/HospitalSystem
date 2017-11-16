<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 04/11/2017
 * Time: 18:48
 */
session_start();
require_once '../app/Autoloader.php';
\app\Autoloader::register();
if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if (\app\models\User::isUser($_POST['username'], $_POST['password'])) {
            header('Location: ?url=home/index');
        } else {
            $errorLogin = true;
        }
    }
}
if (!isset($_SESSION['user'])) {
    require 'views/loginViews/login-form.php';
} else {
    header('Location: index.php');
}
