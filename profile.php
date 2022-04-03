<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        *{
            margin:0;
        }
    </style>
</head>
<body style="background-color:#cad1ff">
        <?php  session_start();
        $_SESSION["emailError"] = "";
        $_SESSION["NIKerror"] = ""; 
        if(!$_SESSION["login"]){
            header("location:./login.php");
        }
        // print_r($_SESSION["row"]); 
        ?>
    <nav style="display:flex; justify-content:space-between;background-color:#f9ffca;height:1cm;">
        <p style="float: left;margin-top:0.2cm;margin-left:0.5cm">Aplikasi Pengelolaan Keuangan</p>
        <div class="menu" style="margin-top:0.2cm;margin-right:1cm">
            <a href="./home.php" style="text-decoration: none;margin-right: 1cm;">Home</a>
            <a href="./profile.php" style="margin-right:2cm">Profile</a>
            <a href="./logout.php" style="text-decoration: none;">Logout</a>
        </div>
    </nav>

    <p style="text-align: center;margin-top:20px;margin-bottom:30px;font-weight:bolder;font-size:25px">Profil Pribadi</p>
    <div class="names" style="display: flex;justify-content:space-between;margin-bottom:1cm">
            <div class="nama-depan" style="margin-left: 2cm;display:flex;">
                <p>Nama Depan &nbsp; <p style="font-weight: bolder;"><?php echo $_SESSION["row"]["nama_depan"] ?></p></p>
            </div>

            <div class="nama-tengah" style="display:flex;">
                <p>Nama Tengah &nbsp; <p style="font-weight: bolder;"><?php echo $_SESSION["row"]["nama_tengah"] ?></p></p>

            </div>

            <div class="nama-belakang" style="margin-right: 6.3cm;display:flex;">
                <p>Nama Belakang &nbsp; <p style="font-weight: bolder;"><?php echo $_SESSION["row"]["nama_belakang"] ?></p></p>
            </div>
        </div>

        <div class="info-2" style="display:flex;justify-content:space-between;margin-bottom:1cm">
            <div class="tempat-lahir" style="margin-left:2cm;display:flex">
                <p>Tempat Lahir &nbsp; <p style="font-weight: bolder;"><?php echo $_SESSION["row"]["tempat_lahir"] ?></p></p>
            </div>

            <div class="tgl-lahir" style="display:flex">
                <p>Nama depan &nbsp; <p style="font-weight: bolder;"><?php echo $_SESSION["row"]["tanggal_lahir"] ?></p></p>
            </div>

            <div class="NIK" style="margin-right:3.05cm;display:flex">
                <p>NIK &emsp;&emsp;&emsp;&emsp;&emsp; <p style="font-weight: bolder;"><?php echo $_SESSION["row"]["NIK"] ?></p></p>
            </div>
        </div>

        <div class="info-3" style="display:flex;justify-content:space-between;margin-bottom:1cm">
            <div class="warga" style="margin-left:2cm;display:flex">
                <p>Warga Negara &nbsp; <p style="font-weight: bolder;"><?php echo $_SESSION["row"]["warga_negara"] ?></p></p>
            </div>

            <div class="email" style="display:flex;margin-left:3cm">
                <p>Email &nbsp; <p style="font-weight: bolder;margin-left:1.2cm"><?php echo $_SESSION["row"]["email"] ?></p></p>
            </div>

            <div class="hp" style="margin-right:3.9cm;display:flex">
                <p>No HP &emsp;&emsp;&emsp;&emsp; <p style="font-weight: bolder;"><?php echo $_SESSION["row"]["NoHp"] ?></p></p>
            </div>

        </div>

        <div class="info-4" style="display:flex;justify-content:space-between;margin-bottom:1cm">
            <div class="alamat" style="margin-left: 2cm;display:flex">
                <p>Alamat &nbsp; <p style="font-weight: bolder;"><?php echo $_SESSION["row"]["Alamat"] ?></p></p>
            </div>

            <div class="kode" style="display:flex;margin-right:3.4cm">
                <p>Kode Pos &nbsp; <p style="font-weight: bolder;margin-left:0.6cm"><?php echo $_SESSION["row"]["KodePos"] ?></p></p>
            </div>

            <div class="profile" style="display:flex;margin-right:3.9cm">
                <p style="margin-right: 1cm;">Foto Profil</p>
                <img src="./profilepic/<?php echo $_SESSION["row"]['foto_profil'] ?>" alt="foto" width="100" height="100">
            </div>
        </div>

        <a href="./editProfile.php" style="margin-left:2cm">Edit Profile</a>
</body>
</html>