<?php
    session_start();
    $_SESSION["message"] = '';
    if(isset($_POST['login'])){
        if(isset($_SESSION)){
            if(empty($_POST["username"]) || empty($_POST["password"])){
                $_SESSION["message"] = "Login Failed!";
                header("Location: login.php");
            }
            else if($_POST["username"] == $_SESSION["username"] && $_POST["password"] == $_SESSION["password"]){
                
                header("Location: home.php");
            }
            else{
                $_SESSION["message"] = "Login Failed!";
                header("Location: login.php");
            }
        }
    }

?>