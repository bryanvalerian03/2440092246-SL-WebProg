<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span{
            color: red;
        }
    </style>
</head>
<body style="background-color: #c2f0f7;">
    <?php
    session_start();
    if(isset($_SESSION["registered"])) header("Location: login.php")
    ?>
    <p style="text-align: center;">Register</p>
    <form method="POST" action="./registerProcess.php" enctype="multipart/form-data">
        <div class="names" style="display: flex;justify-content:space-between;margin-bottom:0.5cm">
            <div class="nama-depan" style="margin-left: 2cm;display:flex;flex-direction:column">
                <div class="isiplace">
                    <label for="nama-depan">Nama Depan</label>
                    <input type="text" name="nama-depan" required>
                </div>
                
            </div>

            <div class="nama-tengah" style="display:flex;flex-direction:column">
                <div class="isiplace">
                    <label for="nama-tengah">Nama Tengah</label>
                    <input type="text" name="nama-tengah" required>
                </div>

            </div>

            <div class="nama-belakang" style="margin-right: 2cm;display:flex;flex-direction:column">
                <div class="isiplace">
                    <label for="nama-belakang">Nama Belakang</label>
                    <input type="text" name="nama-belakang" required>
                </div>
            </div>
        </div>

        <div class="info-2" style="display:flex;justify-content:space-between;margin-bottom:0.5cm">
            <div class="tempat-lahir" style="margin-left:2cm">
                <div class="isiplace">
                    <label for="tempat-lahir">Tempat Lahir</label>
                    <input type="text" name="tempat-lahir" required>
                </div>
            </div>

            <div class="tgl-lahir">
                <div class="isiplace">
                    <label for="tgl-lahir" style="margin-right:0.7cm">Tgl Lahir</label>
                    <input type="date" name="tgl-lahir" id="" value="dd/mm/yyyy" style="width: 4.4cm;margin-left:8px">
                </div>
            </div>

            <div class="NIK" style="margin-right:2cm">
                <div class="isiplace">
                    <label for="NIK" style="margin-right:1.85cm;">NIK</label>
                    <input type="text" name="NIK" style="margin-left: 5px;" required>
                </div>
                <span><?php if(isset($_SESSION["NIKerror"])) echo $_SESSION["NIKerror"]?></span>
            </div>
        </div>

        <div class="info-3" style="display:flex;justify-content:space-between;margin-bottom:0.5cm">
            <div class="warga" style="margin-left:2cm">
                <div class="isiplace">
                    <label for="warga-ng">Warga Negara</label>
                    <input type="text" name="warga-ng" required>
                </div>
            </div>

            <div class="email">
                <div class="isiplace">
                    <label for="email" style="margin-right:1.45cm">Email</label>
                    <input type="email" name="email" id="" required>
                </div>
            </div>

            <div class="hp" style="margin-right:2cm">
                <div class="isiplace">
                    <label for="noHp" style="margin-right:1.6cm">No HP</label>
                    <input type="text" name="noHp" required>
                </div>
                <span><?php if(isset($_SESSION["HpError"])) echo $_SESSION["HpError"]?></span>
            </div>

        </div>

        <div class="info-4" style="display:flex;justify-content:space-between;margin-bottom:0.5cm">
            <div class="alamat" style="margin-left: 2cm;">
                <div class="isiplace">
                    <label for="alamat" style="margin-right:1.2cm">Alamat</label>
                    <textarea name="alamat" id="" cols="20" rows="4" style="vertical-align: top;" required></textarea>
                </div>
            </div>

            <div class="kode">
                <div class="isiplace">
                    <label for="kodepos" style="margin-right:0.85cm">Kode Pos</label>
                    <input type="text" name="kodepos" required>
                </div>
                <span><?php if(isset($_SESSION["posError"])) echo $_SESSION["posError"]?></span>
            </div>

            <div class="profile">
                <div class="isiplace">
                    <label for="foto" style="margin-right: 0.75cm;">Foto Profil</label>
                    <input type="file" name="foto" id="" value="Silahkan Pilih Foto" required>
                </div>
            </div>
        </div>

        <div class="info-5" style="display:flex;justify-content:space-between;margin-bottom:0.5cm">
            <div class="username" style="margin-left: 2cm;">
                <div class="isiplace">
                    <label for="username" style="margin-right:0.7cm">Username</label>
                    <input type="text" name="username" required>
                </div>
            </div>

            <div class="pw-1">
                <div class="isiplace">
                    <label for="pw-1" style="margin-right: 0.4cm;">Password 1</label>
                    <input type="password" name="pw-1" id="" required>
                </div>
                <span><?php if(isset($_SESSION["pwError"])) echo $_SESSION["pwError"]?></span>
            </div>

            <div class="pw-2" style="margin-right: 2cm;">
                <div class="isiplace">
                    <label for="pw-2" style="margin-right:0.9cm">Password 2</label>
                    <input type="password" name="pw-2" id="" required>
                </div>
            </div>
        </div>

        <div class="buttons" style="display: flex;justify-content:flex-end;margin-right:2.3cm">
            <button onclick="window.history.go(-1)" style="background-color: #99d6ed;padding:2px 10px 2px 10px;cursor:pointer;margin-right:1cm" >Kembali</button>
            <a href="./welcome.php">
                <input type="submit" name="submit" value="Register" style="background-color: #c6ed99;padding:2px 10px 2px 10px;cursor:pointer">
            </a>
        </div>
    </form>
</body>

</html>
