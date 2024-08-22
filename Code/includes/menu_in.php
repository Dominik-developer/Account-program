<?php

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
?>