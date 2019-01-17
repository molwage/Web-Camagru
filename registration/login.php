<?php
session_start();
echo "<pre>";
var_dump($_POST);
echo "</pre>";
include "../config/database.php";
if (isset($_POST["submit"])) {
    // if ($_POST["password"] == $_POST["confirm_password"]) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->prepare("SELECT * FROM `user_info` WHERE `username` = :username AND `password` = :password");
            $sql->bindParam(':username', $_POST["username"]);
            $hash = hash("whirlpool", $_POST["password"]);
            $sql->bindParam(':password', $hash);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);             
            if ($result) {    
                usleep(100000);
                $_SESSION['username'] = $_POST['username']; 
                header("Location: ../landing/landing.php");
                exit;
            }
            else {
                header("Location: ./login.phtml?error=1");
                exit;
            }
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    // } else {
    //     header("Location: ./registration.phtml?error=1");
    //     exit;
    // }
}
?>