<!DOCTYPE html>
<?php

session_start();
 
if(!isset($_SESSION['zalogowany']))
{
    header('Location:main.php');
    exit();
}

require_once 'includes.php ';



?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Account.com</title>
    <meta name="description" content="Konto usera"/>
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="Dominik " />
    <link rel="stylesheet"href="styles.css" type="text/css" />
    <script defer src="JS/licznik.js"></script>
    <script defer src="JS/main.js"></script>
    <script defer src="JS/reload.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            start();
        ?>
        <div class="modal_new" id="myModal">
            <div class="modal_new-content">
                <span class="close_new">&times;</span>
                <p id="modalText"></p>
            </div>
        </div>

        <div class="modal" id="dane">
            <div class="dane-header">
                <div class="title">Twoje dane</div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="dane-body">
            <?php
                user();
            ?>
            </div>
       </div>


        <div class="modal" id="time">
            <div class="modal-header">
                <div class="title">Czas do końca roku </div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="modal-body">
            <?php
                czas();
            ?>
            </div>
       </div>

       <div class="modal" id="search">
            <div class="rejestr-header">
                <div class="title">Wyszukiwanie w tekście </div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="rejestr-body">
            <?php
                wybor();
            ?>
            </div>
        </div>

    </div>

    <div class="footer">
        <?php
            footer();
        ?>
    </div>
</div>

<div id="overlay"></div>



</body>

</html>

