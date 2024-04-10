<?php

session_start();

if((!isset($_POST['login'])) || (!isset($_POST['password'])))
{
    header('Location:main.php');
    exit();
}

require_once"connect.php";

$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

if ($polaczenie->connect_errno!=0) 
{
    echo "Error:".$polaczenie->connect_errno;
}
else
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    $login =htmlentities($login, ENT_QUOTES, "UTF-8");
    

   

    if($rezultat = @$polaczenie->query(sprintf("SELECT*FROM users WHERE email='%s' ", 
    mysqli_real_escape_string($polaczenie,$login) )))

    {
        $ileu_userow = $rezultat->num_rows;
        if($ileu_userow >0)
        {
            $wiersz = $rezultat->fetch_assoc();

            if(password_verify($password,$wiersz["password"]))
            {
                $_SESSION['zalogowany'] = true;

                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['email'] = $wiersz['email'];
                $_SESSION['name']=$wiersz['name'];
                $_SESSION['content']=$wiersz['content'];
                

                unset($_SESSION['blad']);

                $rezultat->free_result();
                header('Location:account.php');
            }else{
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location:main.php');

            }

            //echo ''.$user.'';

        }else{
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            header('Location:main.php');

        }
    }

    $polaczenie->close();
}