<html><body>
<?php
include "../config/database.php";

session_start();

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // $sql = "DROP DATABASE Camagru IF EXISTS";
    // $conn->exec($sql);

    $sql = "CREATE DATABASE IF NOT EXISTS Camagru";
    $conn->exec($sql);
    echo "Database created!<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS `user_info` (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `username` VARCHAR(64) NOT NULL,
        `email` VARCHAR(64) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `valid` INT NOT NULL DEFAULT 0
        )";
    $conn->exec($sql);
    echo "user_info table created!<br>";
    $sql = "CREATE TABLE IF NOT EXISTS `images` (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `image` LONGBLOB not NULL,
        `name` VARCHAR(255) NOT NULL,
        `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		-- likes INT NOT NULL DEFAULT '0'
        )";
    $conn->exec($sql);
    echo "images table created!<br>";
    session_destroy();
    unset($_SESSION);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>
</body></html>