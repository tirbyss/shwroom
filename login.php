<?php 
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <style>
        *{
            margin: 0;
            padding: 0;
            text-decoration: none;
            font-family: 'Quicksand',sans-serif;

        }
        body{
            background: url('assets/img/bg.png');
            background-size: cover;
            background-color: #181818;
        }

        form{
            justify-content: center;
            align-items: center;
            display: flex;
            margin-top: 90px;
        }
        .card{
            background-color: #181818;
            border-radius: 15px;
            width: 35vw;
            height: 45vh;
            color: white;
            justify-content: center;
            align-items: center;
            display: flex;
        }
        .card p {
            /* Font-family: Poppins; */
            Font-style: Medium;
            Font-size: 32px;
            Line-height: 38px;
            Line-height: 120%;
            text-Align: Left;
            Vertical-align: Top;
        }
        input{
            width: 300px;
            /* top: ; */
        }
        input .usn{
            box-sizing: border-box;

            /* position: absolute; */
            left: 29.93%;
            right: 28.75%;
            top: 42.29%;
            bottom: 53.61%;

            background: #FFFFFF;
            border: 1px solid #181818;
            border-radius: 10px;
        }
        input .psw{
            box-sizing: border-box;

            /* position: absolute; */
            left: 29.93%;
            right: 28.75%;
            top: 54.39%;
            bottom: 41.5%;

            background: #FFFFFF;
            border: 1px solid #181818;
            border-radius: 10px;
        }
        a{
        margin-left: 220px;
        }

    </style>
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
        <!-- bacground img -->
        <!-- <div class="bg">
        <img class="green-car" src="img/green_car.png" alt=""> -->
            <!-- <img class="grey-car" src="img/Aventador_ultimae_model_mobile.png" alt=""> -->
        <!-- </div> -->
        <!-- card -->
<div class="wrapper">
    <div class="card">
        <table>
                <tr >
                    <td><p>Login</p> <img src="" alt=""></td>
                </tr>
                    <tr>
                        <td>Masukan Username</td>
                    </tr>
                    <tr>
                        <td ><input class="usn" type="text" class="text-box" name="username" placeholder="Username.."></td>
                    </tr>
                    <tr>
                        <td>Masukan Password</td>
                    </tr>
                    <tr>
                        <td><input class="psw" type="password" class="text-box" name="pass" placeholder="Password.."></td>
                    </tr>
                    <tr>
                        <td><a href="#" class="btn-back">back</a>
                        <button type="submit" class="btn-login" name="login">Login</button></td>
                    </tr>
                </table>
            
        </div>
        </div>

    </form>

    <?php 
    if(isset($_POST["login"])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        if($username == "admin" && $pass == "1234"){
            header("Location: our_product.php");
        }else{
            echo "<script>
            alert('Username atau Password anda salah');
            </script>";
        }
    }
    ?>
</body>
</html>