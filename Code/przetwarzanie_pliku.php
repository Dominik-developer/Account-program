<!DOCTYPE html>
<?php

session_start();
 
if(!isset($_SESSION['zalogowany']))
{
    header('Location:main.php');
    exit();
}

require_once("includes.php");

/*
include("menu_out.php");
include("start.php");
include("footer.php");
include("czas.php");
include("wybor.php");
*/


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
</head>

<body>

<div class="container">

    <div class="wrapped">
        <div class="hedder">
            <div class="logo">
                    <span style="color: blue">regularne</span>.com
                    <div style="clear:both;"></div>
            </div>
        </div>

        <div class="nav">
            <ol>
                <li><a href="account.php">Strona główna</a>
                </li>
                <li><a href="wylogowanie.php" >Log out</a> 
                </li>
                
            </ol>
        </div>
    </div>

    <div class=content>

    <div class="wreszcie"> 
        <?php



// Sprawdź, czy istnieje zmienna POST z nazwą "wlasny_tekst"
    if(isset($_POST['wlasny_tekst'])) 
    {
        // Pobierz tekst z pola formularza
        $tekst = $_POST['wlasny_tekst'];
        
        // Funkcja do wyszukiwania i wypisywania adresów email z tekstu
        function wyszukaj_adresy_email($tekst) 
        {
            // Użyj wyrażenia regularnego do wyszukiwania adresów email
            preg_match_all('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/', $tekst, $adresy_email);
            
            // Jeśli znaleziono adresy email, zwróć je
            if(!empty($adresy_email[0])) 
            {
                return $adresy_email[0];
            } else {
                return array(); // Zwróć pustą tablicę, jeśli nie znaleziono adresów email
            }
        }
        
        // Wywołaj funkcję wyszukiwania
        $adresy_email = wyszukaj_adresy_email($tekst);
        
        // Wyświetlanie wyników w tabeli
        if(!empty($adresy_email)) 
        {
            echo "<table class='wynik'>";
            echo "<tr><th>Znalezione adresy e-mail:</th></tr>";
            $i = 0; // Zmienna do śledzenia przemiennej koloru tła
            foreach ($adresy_email as $adres) 
            {
                $kolor_tla = ($i % 2 == 0) ? 'white' : 'lightgray'; // Przemienne tło - białe lub szare
                echo "<tr style='background-color: $kolor_tla;'><td>$adres</td></tr>";
                $i++;
            }
            echo "</table>";
        } else {
            echo "Brak adresów email w tekście.";
        }
    }

    if(isset($_POST["submit"])) 
    {
        $nazwa_pliku = $_FILES["plik"]["name"];
        $sciezka_tymczasowa = $_FILES["plik"]["tmp_name"];
        $sciezka_docelowa = "przeslane_pliki/" . $nazwa_pliku;

        // Przeniesienie pliku z folderu tymczasowego do docelowego
        if(move_uploaded_file($sciezka_tymczasowa, $sciezka_docelowa)) 
        {
            echo "Plik został pomyślnie przesłany.<br>";

            // Otwarcie przesłanego pliku
            $plik = fopen($sciezka_docelowa, "r");
            if ($plik) 
            {
                echo "<table class='wynik'>";
                echo "<tr><th>Znalezione adresy e-mail:</th></tr>";
                $i = 0; // Zmienna do śledzenia przemiennej koloru tła
                while (($linia = fgets($plik)) !== false) 
                {
                    preg_match_all('/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}/', $linia, $matches);
                    foreach ($matches[0] as $match) 
                    {
                        $kolor_tla = ($i % 2 == 0) ? 'white' : 'lightgray'; // Przemienne tło - białe lub szare
                        echo "<tr style='background-color: $kolor_tla;'><td>$match</td></tr>";
                        $i++;
                    }
                }
                echo "</table>";
                fclose($plik);
            } else {
                echo "Wystąpił błąd podczas otwierania pliku.";
            }
        } else {
            echo "Wystąpił błąd podczas przesyłania pliku.";
        }
    }


  ?>
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