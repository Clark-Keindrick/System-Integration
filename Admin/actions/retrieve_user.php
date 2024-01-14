<?php 
    $id = $_GET["userid"];
     try{
        include "../../database.php";
        
        $query = "UPDATE user_accounts SET USER_ACTIVE = 1 WHERE USER_ID = :userID";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":userID", $id);

        $stmt->execute();

        echo '<script>setTimeout(function () { window.location.href = "../deleted_users.php";}, 500);</script>';

        $pdo = null;
        $stmt = null;
        die();
    }
    catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
?>