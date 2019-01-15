<?php
session_start();
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
include "../config/database.php";

if (isset($_POST["submit"])) {
    // exit;
    
    if ($_POST["password"] == $_POST["confirm_password"]) {
        // echo 'sdsdsdsdsdsdsdsdsdsd';
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = $conn->prepare("SELECT * FROM `user_info` WHERE `username` = :username OR `email` = :email");
            $sql->bindParam(':username', $_POST["username"]);
            $sql->bindParam(':email', $_POST["email"]);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC); 
            // echo '<pre>';
            // print_r($result);
            // exit;

            if ($result) {
                header("Location: ./registration.phtml?error=2");
                exit;
            }
            else {
                $hash = hash("whirlpool", $_POST["password"]);
                $sql = $conn->prepare("INSERT INTO `user_info` (`username`, `email`, `password`) VALUES (:username, :email, :password)");
                $sql->bindParam(':username', $_POST["username"]);
                $sql->bindParam(':email', $_POST["email"]);
                $sql->bindParam(':password', $hash);
                $sql->execute();
                header("Location: ./login.phtml");
                // echo "User has been created!";
            }
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    } else {
        header("Location: ./registration.phtml?error=1");
        exit;
    }
}
?>