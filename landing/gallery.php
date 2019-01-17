<?php
session_start();
include "../config/database.php";
?>
<html>
    <head>
        <link href="gallery.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div class="background"></div>
    <div class="icons">
            <a href="../landing/profile.php"><img src="../resources/user.png" alt="profile"></a>
            <a href="../landing/camera.PHP"><img src="../resources/camera.png" alt="camera"></a>
            <!-- <a href="../landing/gallery.php"><img src="../resources/heart.png" alt="like"></a> -->
            <a href="../landing/landing.php"><img src="../resources/shop.png" alt="home"></a>
        </div>
        <div class="username">
        <?php
            echo $_SESSION['username'];
        ?>
        </div>
    </body>
</html>