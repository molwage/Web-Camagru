<?php
session_start();

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
}

if (!$_SESSION['username'])
{
    header('location: ../registration/login.phtml');
    exit;
}
$username = $_SESSION['username'];

if (isset($_REQUEST['image']))
{
    $img_data = $_REQUEST['image'];
    echo($img_data);
    exit;
    $trimmed_data = preg_replace('/ /', "+", $img_data);
    $push=$conn->prepare("INSERT INTO images (`image`, `name`) VALUES(:image, (SELECT id FROM user_info WHERE(`username` = '$username')))");
    $push->execute(['image'=>$trimmed_data]);
    
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
            <a id="capture" class="button-cam">Capture</a>
            <a type="button" id="save" class="button-cam">Save Image</a>
            <canvas id="canvas"  width="400" height="300"></canvas>
            <img id="photo" src="https://picsum.photos/400/300/?random" alt="your_picture">
        </div>
        <div class="icons">
            <a href="../landing/profile.php"><img src="../resources/user.png" alt="profile"></a>
            <a href="../landing/gallery.php"><img src="../resources/heart.png" alt="like"></a>
            <a href="../landing/landing.php"><img src="../resources/shop.png" alt="home"></a>
        </div>
    </body>
    </html>
    <script src="js/photo.js" type="text/javascript"></script>
