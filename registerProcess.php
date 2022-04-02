<?php
    session_start();
    include("config.php");


    $totalmsg = 0;

    $_SESSION["NIKerror"] = '';
    $_SESSION["HpError"] = '';
    $_SESSION["posError"] = '';
    $_SESSION["pwError"] = '';
    $_SESSION["emailError"] = '';
    $_SESSION["usernameError"] = '';
    $_SESSION["login"] = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(strlen($_POST["NIK"]) != 16){
            $_SESSION["NIKerror"] = "NIK should be 16 digits";
            $totalmsg += 1;
        }
        if(strlen($_POST["noHp"]) < 11 || strlen($_POST["noHp"]) > 12){
            $_SESSION["HpError"] = "NoHp should be at least 11 digits";
            $totalmsg += 1;
        }
        if(strlen($_POST["kodepos"]) != 5){
            $_SESSION["posError"] = "Kode Pos should be 5 digits";
            $totalmsg += 1;
        }
        if($_POST["pw-1"] != $_POST["pw-2"]){
            $_SESSION["pwError"] = "Password doesn't match";
            $totalmsg += 1;
        }else $_SESSION["password"] = $_POST["pw-1"];

        //db connection
        //username query
        $str_query = "SELECT username FROM MsUser WHERE username = '".$_POST["username"]."'";
        echo $str_query;
        $query = mysqli_query($connection, $str_query);
        $row = mysqli_fetch_array($query);
        print_r($row["username"]);

        if(!is_null($row)){
            $_SESSION["usernameError"] = "Username already exists";
            echo $_SESSION["usernameError"];
            $totalmsg += 1;
        }
        else{
            $_SESSION["username"] = $_POST["username"];
        }

        //NIK query
        $str_query = "SELECT NIK FROM MsUser WHERE NIK = '".$_POST["NIK"]."'";
        echo $str_query;
        $query = mysqli_query($connection, $str_query);
        $row = mysqli_fetch_array($query);
        print_r($row["NIK"]);

        if(!is_null($row)){
            $_SESSION["NIKerror"] = "NIK already exists";
            echo $_SESSION["NIKerror"];
            $totalmsg += 1;
        }
        else{
            $_SESSION["NIK"] = $_POST["NIK"];
        }

        //email query
        $str_query = "SELECT email FROM MsUser WHERE email = '".$_POST["email"]."'";
        echo $str_query;
        $query = mysqli_query($connection, $str_query);
        $row = mysqli_fetch_array($query);
        print_r($row["email"]);

        if(!is_null($row)){
            $_SESSION["emailError"] = "Email already exists";
            echo $_SESSION["emailError"];
            $totalmsg += 1;
        }
        else{
            $_SESSION["email"] = $_POST["email"];
        }

        $_SESSION["nama-depan"] = $_POST["nama-depan"];
        $_SESSION["nama-tengah"] = $_POST["nama-tengah"];
        $_SESSION["nama-belakang"] = $_POST["nama-belakang"];
        $_SESSION["tempat-lahir"] = $_POST["tempat-lahir"];
        $_SESSION["tgl-lahir"] = date("Y-m-d", strtotime($_POST["tgl-lahir"]));
        $_SESSION["warga-ng"] = $_POST["warga-ng"];
        $_SESSION["noHp"] = $_POST["noHp"];
        $_SESSION["alamat"] = $_POST["alamat"];
        $_SESSION["kodepos"] = $_POST["kodepos"];
        

        echo $totalmsg;
        echo $_SESSION["tgl-lahir"];
        if($totalmsg > 0){
            header("Location: register.php");
        }
        else{
            $fileName = $_FILES["foto"]["name"];
            $tempName = $_FILES["foto"]["tmp_name"];
            $uploadDirectory = 'profilepic/';
            $uploaded = move_uploaded_file($tempName, $uploadDirectory.$fileName);

            $_SESSION['profile-pic'] = $fileName;
            
            //insert to db
            $str_query = "INSERT INTO MsUser VALUES ('".$_SESSION["username"]."', '".$_SESSION["password"]."', '".$_SESSION["nama-depan"]."', '".$_SESSION["nama-tengah"]."', '".$_SESSION["nama-belakang"]."', '".$_SESSION["tempat-lahir"]."', '".$_SESSION["tgl-lahir"]."', '".$_SESSION["NIK"]."', '".$_SESSION["noHp"]."', '".$_SESSION["alamat"]."', '".$_SESSION["kodepos"]."', '".$_SESSION["warga-ng"]."', '".$_SESSION["profile-pic"]."', '".$_SESSION["email"]."')";

            if(mysqli_query($connection, $str_query)){
                header("Location: welcome.php");
            }
            else{
                echo "Registration Failed <br/>".mysqli_error($connection);
            }
            
        }

    }

?>