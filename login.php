<?php

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
?>