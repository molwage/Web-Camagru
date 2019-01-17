<?php

session_start();
include "../config/database.php";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $edit=$conn->prepare("UPDATE user_info SET `username`='new_username'");
    
}
catch (PDOException $error)
{
    $error->get_message();
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
            <!-- <a href="../landing/profile.php"><img src="../resources/user.png" alt="profile"></a> -->
            <a href="../landing/camera.PHP"><img src="../resources/camera.png" alt="camera"></a>
            <a href="../landing/gallery.php"><img src="../resources/heart.png" alt="like"></a>
            <a href="../landing/landing.php"><img src="../resources/shop.png" alt="home"></a>
        </div>
            <div class="edit_box">
            <div class="inputs"><form>
            <input type="text" placeholder="Change username" name="new_username"><br>
            <input type="text" placeholder="Change email" name="username"><br>
            <input type="password" placeholder="Change password" name="edit"><br>
            <input type="text" placeholder="Confirm new password" name="username"><br>
            <input type="submit" value="Edit Profile" name="edit">
            </form></div>
            </div>
    </body>
</html>