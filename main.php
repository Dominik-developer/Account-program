<!DOCTYPE html>
<?php

session_start();

if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true) 
{
    header('Location:account.php');
    exit();
}

$licznik = $_COOKIE['licznik'] ?? 0;
$licznik += 1;
setcookie('licznik',$licznik);
$komunikat = 'Wyswietleń:' .$licznik;



require_once 'includes.php ';
require_once 'connect.php';

include_once 'rejestracja.php';



?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Page.com</title>
    <meta name="description" content="Logowanie"/>
    <meta name="keywords" content="strona" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="Dominik Szczepański" />
    <link rel="stylesheet"href="regularne.css" />
    <script defer src="JS/main.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

<div class="container">

    <div class="wrapped">
        <?php
            menu_in();
        ?>
    </div>

    <div class=content>
        <?php  
            hello();
        ?>
        <div class="modal" id="modal">
            <div class="modal-header">
                <div class="title">Logowanie </div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="modal-body">
            <?php
                login();
            ?>
            </div>
       </div>
        <div class="modal" id="rejestr">
            <div class="rejestr-header">
                <div class="title">Rejestracja </div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="rejestr-body">
            <?php
                rejestracja();
            ?>
            </div>
        </div>

    </div>

    <div class="footer">
        <?php
            footer();
            echo"$komunikat";
        ?>
    </div>
</div>

<div id="overlay"></div>

</body>

</html>


