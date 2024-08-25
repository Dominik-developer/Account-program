<?php


// header functions
function menu_in()
{
?>
<div class="hedder">
       <div class="logo">
            <span style="color: blue">regularne</span>.com
            <div style="clear:both;"></div>
        </div>
</div>

<div class="nav">
    <ol>
        <li><a href="#">Strona główna</a>

        </li>
        <li><a href="#">Kontakt</a>
            <ul>
                <li><a href="#">Mail</a></li>
                <li><a href="#">Telefon</a></li>
            </ul>
        </li>
        <li><button id="loginButton" data-modal-target="#modal">Log in</button>
        </li>
        <li><button id="rejestrButton" data-modal-target="#rejestr">Sign in</button>
        </li>
    </ol>
</div>

<?php
}
function menu_out()
{
?>
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
        <li><button id="daneButton" data-modal-target="#dane">Twoje dane</button> 
        </li>
        <li><a href="#">Kontakt</a>
            <ul>
                <li><a href="#">Mail</a></li>
                <li><a href="#">Telefon</a></li>
            </ul>
        </li>
        <li><button id="timeButton" data-modal-target="#time">Odliczanie</button>
        </li>
        <li><button id="searchButton" onclick="start()"; data-modal-target="#search">Szukaj w tekście</button>
        </li>
        <li><a href="wylogowanie.php" >Log out</a> 
        </li>
        
    </ol>
</div>

<?php
}


// main functions
function start()
{
?>
<div id="witam">
            <p></p>
            <?php
                echo "<p> Witaj ".$_SESSION['name']."!<p>"; 
            ?>
        </div>

<?php
}
function czas()
{
?>
<div class="czas">
    <p>Czas pozostały do końca roku:</p><br>
    <div id="licznik"></div>
</div>

<?php
}
function hello()
{
?>

<div class="hello">
   <p> Witam na stronie</p>
   
    
</div>

<?php
}
function user()
{
?>
<div style="text-align: center" class="profil">

<h2>Oto Twoje dane:</h2>

    <table>
        <thead>
            <tr>
                <th>Imię</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php
                         echo "<p> ".$_SESSION["name"]."</p>";
                    ?>
                </td>
                <td>
                    <?php
                        echo "<p> ".$_SESSION["email"]."</p>";
                    ?>
                </td>
            </tr>           
        </tbody>
    </table>
</div>

<?php
}
function nowy()
{
?>

<div class="zakladanie">

<form action="account.php" method="post">
<fieldset>
    <legend>
        Szczegóły konta:
    </legend>
<label>
    Imię:
    <input type="text" name="name" size="30" maxlength="15" required="required" >
</label>
<br />
<label>
    E-mail:
    <input type="email" name="email" size="30" maxlength="30" required="required" >
</label>
<br />
<label>
    Hasło:
    <input type="password" name="password" size="30" maxlength="50" required="required" >
</label>
<br />
</fieldset>

<fieldset>
    <legend>
        Kilka informacji o Tobie:
    </legend>
<label>
    Opis profilu:
    <textarea rows="4" cold="20" id="content">
    </textarea>
</label>
</fieldset>

<input type="submit" value="Załóż konto" />
</form>
</div>

<?php
}
function login()
{
?>
    <div class="center">
        <form action="logowanie.php" method="POST">
        
                <input type="text" name="login" placeholder="Login:" required="required" >
                <br><br>
                <input type="password" name="password" placeholder="Hasło:" maxlenght="20" required="required">
                <br><br>
                <input type="submit" value="Zaloguj się">
                <br><br>
        </form>
        <?php
        
            if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
        ?>
        </div>
    </div>


<?php
} 


// footer functions
function footer()
{
?>
    Dominik Szczepański - regularne.com &copy; 2024  
<?php
}


// other functions
function wybor()
{
?>

<div class="szukanie" id="wybor">
        
    <p>Wybierz sposób w jaki przekażesz nam teskt w którym chcesz by program znalazał adresy e-mail <p>
        <br><br><br>
    <button onclick="plik()" style="font-size:15px; margin-right: 10px;";>Załaduj plik z tekstem</button>
        
    <button onclick="tekst()" style="font-size:15px; margin-right: 10px;";>Wpisz tekst samodzielnie</button>
</div>

<div class="szukanie" id="plik">

    <p>Załącz plik w którym chcesz znaleść adresy e-mail</p>
        <br>
    <form class="orbit" action="przetwarzanie_pliku.php" method="post" enctype="multipart/form-data">
        <br>
    
    <input style="border: 2px solid black; text-align:center;"  type="file" name="plik" id="plik" accept=".txt" required="required">
        <br>
    <input type="submit" value="Prześlij"name="submit">

    </form>
        <br>
    <button onclick="back()"; style="font-size:15px;";>Powrót</button>

</div>

<div class="szukanie" id="tekst">
        
    <p>Wpisz tekst w którym chcesz znaleść adresy e-mail</p>
        <br>
    <form class="orbit" method="POST" action="przetwarzanie_pliku.php">
        <br>
    <textarea id="wlasny_tekst" name="wlasny_tekst" rows="4" cols="47" required="required" placeholder="Wpisz tekst"></textarea>
        <br>
    <input type="submit" value="Prześlij">

    </form>
        <br>
    <button onclick="back()"; style="font-size:15px;";>Powrót</button>

</div>
        
<?php

}