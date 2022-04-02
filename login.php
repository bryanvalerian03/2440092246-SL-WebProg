<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body style="background-color:#fbfdac">
    <?php
        session_start();
        if($_SESSION["login"]){
            header("location:./home.php");
        }
    ?>
    <h2 style="text-align: center;margin-top:5%">Login</h2>
    <div class="box" style="width: 40%;margin:7% 30% 30% 30%;background-color:#ace6fd;text-align:center">
        <form action="./loginProcess.php" method="POST">
            <div class="username" style="margin-bottom:20px;padding-top:20px">
                <label for="username" style="margin-right: 1cm;">Username</label>
                <input type="text" name="username">
            </div>

            <div class="password" >
                <label for="password" style="margin-right:1.1cm">Password</label>
                <input type="password" name="password" id="">
            </div>
            <span style="color: red;"><?php if(isset($_SESSION["message"])) echo $_SESSION["message"]  ?></span>

            <div class="buttons" style="display: flex;justify-content:center;padding-bottom:20px;padding-top:20px">
                <input type="submit" name="login" value="Login" style="background-color: #adf59f;padding:2px 10px 2px 10px;cursor:pointer;margin-right:1cm">
                <a href="./index.php" style="background-color: #fdd7ac;padding:2px 10px 2px 10px;cursor:pointer;text-decoration:none;border:1.8px solid black;">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>