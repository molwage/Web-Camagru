<?php
session_start();
include "../config/database.php";

if (!$_SESSION['username'])
    {
        header('location: ../registration/login.phtml');
        exit;
    }
?>
<html>
    <head>
        <link href="landing.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="background"></div>
        <div class="username">
        <?php
            echo $_SESSION['username'];
        ?>
        </div>
        <div class="icons">
            <img src="../resources/user.png" alt="profile">
            <a href="../landing/camera.PHP"><img src="../resources/camera.png" alt="camera"></a>
            <img src="../resources/heart.png" alt="like">
            <img src="../resources/shop.png" alt="home">
        </div>
        <?php
        $username = $_SESSION['username'];
        // echo '<pre>';
        // print_r($_SESSION);
        // if($_SESSION[$username])
        // echo "$username";
        ?>
    </body>
</html>