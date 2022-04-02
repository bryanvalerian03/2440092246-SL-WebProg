<?php
    session_start();
    include("config.php");
    $_SESSION["message"] = '';
    if(isset($_POST['login'])){
        if(isset($_SESSION)){
            if(empty($_POST["username"]) || empty($_POST["password"])){
                $_SESSION["message"] = "Login Failed!";
                header("Location: login.php");
            }
            else{
                $username = $_POST["username"];
                $password = $_POST["password"];
                $str_query = "SELECT * FROM MsUser WHERE username = '$username' AND password = '$password'";
                $query = mysqli_query($connection, $str_query);
                $row = mysqli_fetch_array($query);
                if(!is_null($row)){
                    $_SESSION["row"] = $row;
                    $_SESSION["login"] = true;
                    header("Location: home.php");
                }
                else{
                    $_SESSION["message"] = "Login Failed!";
                    header("Location: login.php");
                }
            }

        }
    }

?>