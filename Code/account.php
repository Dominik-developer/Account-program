<!DOCTYPE html>
<?php

session_start();
 
if(!isset($_SESSION['zalogowany']))
{
    header('Location:main.php');
    exit();
}



include("menu_out.php");
include("start.php");
include("footer.php");
include("czas.php");
include("wybor.php");

include("user.php");


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
    <script defer src="licznik.js"></script>
    <script defer src="main.js"></script>
    <script defer src="reload.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
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

<script>
  /*      window.onload = function() {
            openModal();
        };

        function openModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'block';
            
            setTimeout(function() {
                modal.style.display = 'none';
            }, 3200); // 3,2s
        }

*/
</script>  



</body>

</html>

