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
            <a href="./home.php" style="margin-right: 1cm;">Home</a>
            <a href="./profile.php" style="text-decoration: none;margin-right:2cm">Profile</a>
            <a href="./logout.php" style="text-decoration: none;">Logout</a>
        </div>
    </nav>

    <span style="display: flex;justify-content:center;margin-top:15%;font-size:30px">
        <p >
            Hello&nbsp; <p style="font-weight: bold;"><?php echo $_SESSION["row"]["nama_depan"]." ", $_SESSION["row"]["nama_tengah"]." "  , $_SESSION["row"]['nama_belakang'] ?></p>, Selamat datang di Aplikasi Pengelolaan Keuangan
        </p>
    </span>
</body>
</html>