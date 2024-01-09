<?php
    $dsn = "mysql:host=localhost;dbname=BikeProdb";
    $dbusername = "root";
    $dbpassword = "";
    global $pdo;

    try{
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Connection failed: ". $e->getMessage();
    }
?>