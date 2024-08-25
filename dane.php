<!DOCTYPE html>
<?php

session_start();
 
if(!isset($_SESSION['zalogowany']))
{
    header('Location:main.php');
    exit();
}

require_once 'includes.php';

?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Account.com</title>
    <meta name="description" content="Konto usera"/>
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="Dominik Szczepański" />
    <link rel="stylesheet"href="regularne.css" type="text/css" />
</head>

<body>

<div class="container">

    <div class="wrapped">
        <?php
            menu_out();
        ?>
    </div>

    <div class=content>
        <?php
           user();
        ?>
    </div>


    <div class="footer">
        <?php
            footer();
           
        ?>
    </div>
</div>

</body>

</html>
