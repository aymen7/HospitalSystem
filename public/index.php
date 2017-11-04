
<?php
session_start();
require_once '../app/Autoloader.php';
\app\Autoloader::register();
if (!isset($_SESSION['user']))
    header('Location: login.php');
else {
    $user = unserialize($_SESSION['user']);
    if ($user instanceof \app\models\Secretaire)
        header('Location: secretaire.php');
    else if ($user instanceof \app\models\Medecin)
        header('Location: medecin.php');
    else if ($user instanceof \app\models\Infirmier)
        header('Location: infirmier');

}
?>
