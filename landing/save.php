<?php
    session_start();
    $headers = getallheaders();

    if (!$_SESSION['username'])
    {
        header('location: ../registration/login.phtml');
        exit;
    }
    if ($headers["Content-type"] == "application/json") {
        $picture = json_decode(file_get_contents("php://input"), true);
    }
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        echo "Thing 1";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("INSERT INTO `images` (`image`, `name`) VALUES (:image, :name)");
        echo "Thing 2";
        $sql->bindParam(':name', $_SESSION["username"]);
        $sql->bindParam(':image', $picture["pic"]);
        echo "Thing 3";
        $sql->execute();
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
?>