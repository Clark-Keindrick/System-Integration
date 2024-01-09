<?php 
    $code = $_GET["supCode"];
     try{
        include "../../database.php";
        
        $query = "UPDATE supplier SET SUP_ACTIVE = 0 WHERE SUP_CODE = :supcode";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":supcode", $code);

        $stmt->execute();

        echo '<script>setTimeout(function () { window.location.href = "../supplier.php";}, 500);</script>';

        $pdo = null;
        $stmt = null;
        die();
    }
    catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
?>