<?php

session_start();
include "../config/database.php";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
}
catch (PDOException $error)
{
    $error->get_message();
}

$username = $_SESSION['username'];

if (isset($_POST['update_username']))
{
    $new_username = $_POST['new_username'];
   
    $push = $conn->prepare("UPDATE user_info SET `username` = '$new_username' WHERE (`username` = '$username')");
    $push->execute();

    header ("location: ../registration/login.phtml");
}
if (isset($_POST['update-password']))
{
    $new_password=$_POST['new-password'];
    $hnew_password = hash("whirlpool", $new_password);

    $push = $conn->prepare("UPDATE user_info SET `password` = '$hnew_password' WHERE (`username` = '$username')");
    $push->execute();
}


?>
<html>
    <head>
        <link href="profile.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="background"></div>
        <div class="username">
        <?php
            echo $_SESSION['username'];
        ?>
        </div>
        <div class="icons">
            <a href="../landing/camera.PHP"><img src="../resources/camera.png" alt="camera"></a>
            <a href="../landing/gallery.php"><img src="../resources/heart.png" alt="like"></a>
            <a href="../landing/landing.php"><img src="../resources/shop.png" alt="home"></a>
        </div>
            <div class="edit_box">
            <div class="inputs">
                
                <form method="POST" action="profile.php">
                    <input type="text" placeholder="Change username" name="new_username">
                    <input type="submit" value="Edit Profile" name="update_username"><br>
                </form>
                <form method="POST" action="profile.php">
                    <input type="password" placeholder="Change password" name="new-password">
                    <input type="submit" value="Edit Profile" name="update-password"><br>
                    <!-- <input type="password" placeholder="Confirm password" name="username"> -->
                    <!-- <input type="submit" value="Edit Profile" name="edit"> -->
                </form>
            </div>
            </div>
    </body>
</html>