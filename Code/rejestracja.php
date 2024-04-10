<?php
	
if (isset($_POST['email']))
{
    //Udana walidacja? Załóżmy, że tak!
    $wszystko_OK=true;
    
    //Sprawdź poprawność nickname'a
    $name = $_POST['name'];
    
    //Sprawdzenie długości nicka
    
    if (!preg_match('/^[a-zA-Z]{3,15}$/', $name)) 
    {
        $wszystko_OK=false;
        $_SESSION['e_name']="Nie poprawne imię!";
    }
    
    /*if ((strlen($name)<3) || (strlen($name)>20))
    {
        $wszystko_OK=false;
        $_SESSION['e_name']="Imię musi posiadać od 3 do 15 znaków!";
    }

    if (ctype_alnum($name)==false)
    {
        $wszystko_OK=false;
        $_SESSION['e_name']="Imię może składać się tylko z liter (bez polskich znaków)";
    }*/
    
    // Sprawdź poprawność adresu email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
    {
        $wszystko_OK=false;
        $_SESSION['e_email']="Niepoprawny adres e-mail!";
    }

    if (!preg_match('/^[a-zA-Z0-9]{1,10}@[a-zA-Z0-9]{1,6}\.[a-zA-Z]{2,3}$/', $email))
    {
        $wszystko_OK=false;
        $_SESSION['e_email']="Nie poprawny adres e-mail!";
    }
    

    //Sprawdź poprawność hasła
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    
    /*if ((strlen($password_1)<8) || (strlen($password_1)>20))
    {
        $wszystko_OK=false;
        $_SESSION['e_password']="Hasło musi posiadać od 8 do 20 znaków!";
    }
    */
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&-])[A-Za-z\d@$!%*?&-]{8,20}$/', $password_1))
    {
        $wszystko_OK=false;
        $_SESSION['e_password']="Za słabe lub nie poprawne hasło!";
    } 
    if ($password_1!=$password_2)
    {
        $wszystko_OK=false;
        $_SESSION['e_password']="Podane hasła nie są identyczne!";
    }	

    $password_hash = password_hash($password_1, PASSWORD_DEFAULT);
    
    //Czy zaakceptowano regulamin?
    if (!isset($_POST['regulamin']))
    {
        $wszystko_OK=false;
        $_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
    }				
    
    //Bot or not? Oto jest pytanie!
    $sekret = "6LdIm24pAAAAAIWwRM5eJ8HfrXRaDdeU89vlKZHH";
    
    $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
    
    $odpowiedz = json_decode($sprawdz);
    
    if ($odpowiedz->success==false)
    {
        $wszystko_OK=false;
        $_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
    }		
    
    //Zapamiętaj wprowadzone dane
    $_SESSION['fr_name'] = $name;
    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_password_1'] = $password_1;
    $_SESSION['fr_password_2'] = $password_2;
    if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
    
    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    
    try 
    {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno!=0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            //Czy email już istnieje?
            $rezultat = $polaczenie->query("SELECT id FROM users WHERE email='$email'");
            
            if (!$rezultat) throw new Exception($polaczenie->error);
            
            $ile_takich_maili = $rezultat->num_rows;
            if($ile_takich_maili>0)
            {
                $wszystko_OK=false;
                $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
            }		

            
            if ($wszystko_OK==true)
            {
                //Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
                
                if ($polaczenie->query("INSERT INTO users VALUES (NULL, '$name', '$password_hash', '$email')"))
                {
                    $_SESSION['udanarejestracja']=true;
                    header('Location: account.php');
                }
                else
                {
                    throw new Exception($polaczenie->error);
                }
                
            }
            
            $polaczenie->close();
        }
        
    }
    catch(Exception $e)
    {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
        echo 'informacja deweloperska:' .$e;
    }
    
}

function rejestracja()
{
?>
<div>

<form method="post">
	
    <input type="text" value="<?php
        if (isset($_SESSION['fr_name']))
        {
            echo $_SESSION['fr_name'];
            unset($_SESSION['fr_name']);
        }
    ?>" name="name" placeholder="Imię:" /><br />
    
    <?php
        if (isset($_SESSION['e_name']))
        {
            echo '<div class="error">'.$_SESSION['e_name'].'</div>';
            unset($_SESSION['e_name']);
        }
    ?>
    <br /> 

    <input type="text" value="<?php
        if (isset($_SESSION['fr_email']))
        {
            echo $_SESSION['fr_email'];
            unset($_SESSION['fr_email']);
        }
    ?>" name="email" placeholder="E-mail:" /><br />
    
    <?php
        if (isset($_SESSION['e_email']))
        {
            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
            unset($_SESSION['e_email']);
        }
    ?>    
    <br /> 
    
    <input type="password"  value="<?php
        if (isset($_SESSION['fr_password_1']))
        {
            echo $_SESSION['fr_password_1'];
            unset($_SESSION['fr_password_1']);
        }
    ?>" name="password_1" placeholder="Twoje hasło:"/><br />
    
    <?php
        if (isset($_SESSION['e_password']))
        {
            echo '<div class="error">'.$_SESSION['e_password'].'</div>';
            unset($_SESSION['e_password']);
        }
    ?>		
    <br />
    
    <input type="password" value="<?php
        if (isset($_SESSION['fr_password_2']))
        {
            echo $_SESSION['fr_password_2'];
            unset($_SESSION['fr_password_2']);
        }
    ?>" name="password_2" placeholder="Powtórz hasło:"/><br /><br>
    
    <label>
        <input style="text-align:left"; type="checkbox" name="regulamin" <?php
        if (isset($_SESSION['fr_regulamin']))
        {
            echo "checked";
            unset($_SESSION['fr_regulamin']);
        }
            ?>/> Akceptuję regulamin
    </label>
    
    <?php
        if (isset($_SESSION['e_regulamin']))
        {
            echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
            unset($_SESSION['e_regulamin']);
        }
    ?>	
    <br><br>
    <div class="g-recaptcha" data-sitekey="6LdIm24pAAAAAH4_1Xzx5sHGRzLgBRNfjJ0P4hzq"></div>
    
    <?php
        if (isset($_SESSION['e_bot']))
        {
            echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
            unset($_SESSION['e_bot']);
        }
    ?>	
    
    <br />
    
    <input type="submit" value="Zarejestruj się" />
    
</form>

</div>

<?php
}
?>
