<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 02/11/2017
 * Time: 21:20
 */
use app\models\User;
class Auth extends Controller
{
    public function index()
    {
        $this->view('auth/index', []);
    }
    public function login()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            if (User::isUser($_POST['username'], $_POST['password'])) {
                header('Location: ?url=home/index');
            } else {
                $this->view('auth/index', [
                    'errorMessage' => "<label id='login-error-msg'>wrong username/password combination</label>"
                ]);
            }
        }
    }
}