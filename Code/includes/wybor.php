
<?php
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
?>
