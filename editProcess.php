<?php
    session_start();
    include("config.php");


    $totalmsg = 0;
    print_r($_SESSION["row"]);

    $_SESSION["NIKerror"] = '';
    $_SESSION["HpError"] = '';
    $_SESSION["posError"] = '';
    $_SESSION["emailError"] = '';

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

        //db connection

        //NIK query
        if($_POST["NIK"] == $_SESSION["row"]["NIK"]){
            $_SESSION["NIK"] = $_POST["NIK"];
        }
        else{
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
        }

        //email query
        if($_POST["email"] == $_SESSION["row"]["email"]){
            $_SESSION["email"] = $_POST["email"];
        }
        else{
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
        if($totalmsg > 0){
            header("Location: editProfile.php");
        }
        else{
            print_r($_FILES);
            if(empty($_FILES["foto"]["name"])){
                $_SESSION['profile-pic'] = $_SESSION["row"]["foto_profil"];
            }
            else{
                $fileName = $_FILES["foto"]["name"];
                $tempName = $_FILES["foto"]["tmp_name"];
                $uploadDirectory = 'profilepic/';
                $uploaded = move_uploaded_file($tempName, $uploadDirectory.$fileName);
    
                $_SESSION['profile-pic'] = $fileName;
            }
            

            //update db without username and password
            $str_query = "UPDATE MsUser SET nama_depan = '".$_SESSION["nama-depan"]."', nama_tengah = '".$_SESSION["nama-tengah"]."', nama_belakang = '".$_SESSION["nama-belakang"]."', tempat_lahir = '".$_SESSION["tempat-lahir"]."', tanggal_lahir = '".$_SESSION["tgl-lahir"]."', NIK = '".$_SESSION["NIK"]."', NoHp = '".$_SESSION["noHp"]."', Alamat = '".$_SESSION["alamat"]."', KodePos = '".$_SESSION["kodepos"]."', warga_negara = '".$_SESSION["warga-ng"]."', foto_profil = '".$_SESSION["profile-pic"]."', email = '".$_SESSION["email"]."' WHERE username = '".$_SESSION["row"]["username"]."'";

            echo $str_query;
            if(mysqli_query($connection, $str_query)){
                $newRowQuery = "SELECT * FROM MsUser WHERE username = '".$_SESSION["row"]["username"]."'";
                $newquery = mysqli_query($connection, $newRowQuery);
                $newRow = mysqli_fetch_array($newquery);
                $_SESSION["row"] = $newRow;
                header("Location: home.php");
            }
            else{
                echo "Registration Failed <br/>".mysqli_error($connection);
            }
            
        }

    }

?>