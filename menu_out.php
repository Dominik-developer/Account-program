<?php
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
?>