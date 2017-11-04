<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 04/11/2017
 * Time: 19:41
 */
session_start();
session_destroy();
header('Location: index.php');