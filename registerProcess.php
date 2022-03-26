<?php
    session_start();

    print_r($_FILES);

    $totalmsg = 0;

    $_SESSION["NIKerror"] = '';
    $_SESSION["HpError"] = '';
    $_SESSION["posError"] = '';
    $_SESSION["pwError"] = '';

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

        $_SESSION["nama-depan"] = $_POST["nama-depan"];
        $_SESSION["nama-tengah"] = $_POST["nama-tengah"];
        $_SESSION["nama-belakang"] = $_POST["nama-belakang"];
        $_SESSION["tempat-lahir"] = $_POST["tempat-lahir"];
        $_SESSION["tgl-lahir"] = $_POST["tgl-lahir"];
        $_SESSION["NIK"] = $_POST["NIK"];
        $_SESSION["warga-ng"] = $_POST["warga-ng"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["noHp"] = $_POST["noHp"];
        $_SESSION["alamat"] = $_POST["alamat"];
        $_SESSION["kodepos"] = $_POST["kodepos"];
        $_SESSION["username"] = $_POST["username"];
        

        echo $totalmsg;
        if($totalmsg > 0){
            header("Location: register.php");
        }
        else{
            $fileName = $_FILES["foto"]["name"];
            $tempName = $_FILES["foto"]["tmp_name"];
            $uploadDirectory = 'profilepic/';
            $uploaded = move_uploaded_file($tempName, $uploadDirectory.$fileName);

            $_SESSION['profile-pic'] = $fileName;
            $_SESSION['registered'] = true;
            echo "true";
            header("Location: welcome.php");
        }

    }

?>