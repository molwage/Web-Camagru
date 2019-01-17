<?php
session_start();

if (!$_SESSION['username'])
    {
        header('location: ../registration/login.phtml');
        exit;
    }
?>
<html>
    <head>
        <link href="camera.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="background"></div>
        <div class="username">
        <?php
            echo $_SESSION['username'];
        ?>
        </div>
        <div class="booth">
            <video id="video" autoplay="true" width="400" height="300"></video>
            <a href="#" id="capture" class="button-cam">Capture</a>
            <a href="#" id="save" class="button-cam">Save Image</a>
            <canvas id="canvas"  width="400" height="300"></canvas>
            <img id="photo" src="https://picsum.photos/400/300/?random" alt="your_picture">
        </div>
        <div class="icons">
            <a href="../landing/profile.php"><img src="../resources/user.png" alt="profile"></a>
            <!-- <a href="../landing/camera.PHP"><img src="../resources/camera.png" alt="camera"></a> -->
            <a href="../landing/gallery.php"><img src="../resources/heart.png" alt="like"></a>
            <a href="../landing/landing.php"><img src="../resources/shop.png" alt="home"></a>
        </div>
    </body>
    </html>
    <!-- <?php
        $headers = getallheaders();
        print_r($headers);
    ?> -->
    <script src="js/photo.js" type="text/javascript"></script>
