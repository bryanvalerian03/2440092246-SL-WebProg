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

    <p style="text-align: center;margin-top:20px;margin-bottom:30px;font-weight:bolder;font-size:25px">Edit Profile</p>
    <form method="POST" action="./editProcess.php" enctype="multipart/form-data">
        <div class="names" style="display: flex;justify-content:space-between;margin-bottom:0.5cm">
            <div class="nama-depan" style="margin-left: 2cm;display:flex;flex-direction:column">
                <div class="isiplace">
                    <label for="nama-depan">Nama Depan</label>
                    <input type="text" name="nama-depan" value="<?php echo $_SESSION["row"]["nama_depan"] ?>">
                </div>
                
            </div>

            <div class="nama-tengah" style="display:flex;flex-direction:column">
                <div class="isiplace">
                    <label for="nama-tengah">Nama Tengah</label>
                    <input type="text" name="nama-tengah" value="<?php echo $_SESSION["row"]["nama_tengah"] ?>">
                </div>

            </div>

            <div class="nama-belakang" style="margin-right: 2cm;display:flex;flex-direction:column">
                <div class="isiplace">
                    <label for="nama-belakang">Nama Belakang</label>
                    <input type="text" name="nama-belakang" value="<?php echo $_SESSION["row"]["nama_belakang"] ?>">
                </div>
            </div>
        </div>

        <div class="info-2" style="display:flex;justify-content:space-between;margin-bottom:0.5cm">
            <div class="tempat-lahir" style="margin-left:2cm">
                <div class="isiplace">
                    <label for="tempat-lahir">Tempat Lahir</label>
                    <input type="text" name="tempat-lahir" value="<?php echo $_SESSION["row"]["tempat_lahir"] ?>">
                </div>
            </div>

            <div class="tgl-lahir">
                <div class="isiplace">
                    <label for="tgl-lahir" style="margin-right:0.7cm">Tgl Lahir</label>
                    <input type="date" name="tgl-lahir" id="" value="<?php echo $_SESSION["row"]["tanggal_lahir"] ?>"style="width: 4.4cm;margin-left:8px">
                </div>
            </div>

            <div class="NIK" style="margin-right:2cm">
                <div class="isiplace">
                    <label for="NIK" style="margin-right:1.85cm;">NIK</label>
                    <input type="text" name="NIK" style="margin-left: 5px;" value="<?php echo $_SESSION["row"]["NIK"] ?>" >
                </div>
                <span><?php if(isset($_SESSION["NIKerror"])) echo $_SESSION["NIKerror"]?></span>
            </div>
        </div>

        <div class="info-3" style="display:flex;justify-content:space-between;margin-bottom:0.5cm">
            <div class="warga" style="margin-left:2cm">
                <div class="isiplace">
                    <label for="warga-ng">Warga Negara</label>
                    <input type="text" name="warga-ng" value="<?php echo $_SESSION["row"]["warga_negara"] ?>">
                </div>
            </div>

            <div class="email">
                <div class="isiplace">
                    <label for="email" style="margin-right:1.45cm">Email</label>
                    <input type="email" name="email" id="" value="<?php echo $_SESSION["row"]["email"] ?>">
                </div>
                <span><?php if(isset($_SESSION["emailError"])) echo $_SESSION["emailError"]?></span>
            </div>

            <div class="hp" style="margin-right:2cm">
                <div class="isiplace">
                    <label for="noHp" style="margin-right:1.6cm">No HP</label>
                    <input type="text" name="noHp" value="<?php echo $_SESSION["row"]["NoHp"] ?>">
                    
                </div>
                <span><?php if(isset($_SESSION["HpError"])) echo $_SESSION["HpError"]?></span>
            </div>

        </div>

        <div class="info-4" style="display:flex;justify-content:space-between;margin-bottom:0.5cm">
            <div class="alamat" style="margin-left: 2cm;">
                <div class="isiplace">
                    <label for="alamat" style="margin-right:1.2cm">Alamat</label>
                    <textarea name="alamat" id="" cols="20" rows="4" style="vertical-align: top;" ><?php echo $_SESSION["row"]["Alamat"] ?></textarea>
                </div>
            </div>

            <div class="kode">
                <div class="isiplace">
                    <label for="kodepos" style="margin-right:0.85cm">Kode Pos</label>
                    <input type="text" name="kodepos" value="<?php echo $_SESSION["row"]["KodePos"] ?>">
                </div>
                <span><?php if(isset($_SESSION["posError"])) echo $_SESSION["posError"]?></span>
            </div>

            <div class="profile">
                <div class="isiplace">
                    <label for="foto" style="margin-right: 0.75cm;">Foto Profil</label>
                    <input type="file" name="foto" id="" value="asd">
                </div>
                <img src="./profilepic/<?php echo $_SESSION["row"]['foto_profil'] ?>" alt="foto" width="100" height="100" style="margin-left:2.8cm;margin-top:0.5cm">
            </div>
        </div>

        <div class="buttons" style="display: flex;justify-content:flex-end;margin-right:2.3cm">
            <button onclick="window.history.go(-1)" style="background-color: #99d6ed;padding:2px 10px 2px 10px;cursor:pointer;margin-right:1cm" >Kembali</button>
            <a href="./welcome.php">
                <input type="submit" name="submit" value="Update" style="background-color: #c6ed99;padding:2px 10px 2px 10px;cursor:pointer">
            </a>
        </div>
    </form>
</body>
</html>