<!DOCTYPE html>

<html lang="en">
<!-------------------------- the head tag------------------------------------------>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hospital LogIn</title>
    <meta name="description" content="Hospital Log in ">
    <meta name="keywords" content="HTML,CSS,JavaScript,JQuery,Php,Ajax,responsive design,bootstrap,photoshop,web,developer">
    <meta name="author" content="Aymen Bennour ,Yassine Hamza Cherif">
    <!-- jqueru Ui-->
    <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.theme.css">
    <!-- Bootstrap -->
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- normalize css-->
    <link href="css/normalize.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- creative buttons -->
    <link rel="stylesheet" href="CreativeButtons/css/component.css">
    <!-- my style css-->
    <link rel="stylesheet" href="css/index.css" >
    <!-- font links -->
    <!-- jquery script-->
    <script src="js_files/jquery-3.1.1.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<!----------------------------- the body tag--------------------------------------->
<body>
<?php
session_start();
require_once '../app/start.php';
require_once '../app/Autoloader.php';
\app\Autoloader::register();
$app = new \app\core\App();
?>
<!-- js scripts ------------------------------>

<!-- jquery script-->
<script src="js_files/jquery-3.1.1.js"></script>
<!-- jquery ui script-->
<script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

<!-- bootstrap script-->
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<!-- my js script-->
<script src="js_files/index.js"></script>

</body><!-- end of the body tag -------------->
</html><!-- end of the document-->
