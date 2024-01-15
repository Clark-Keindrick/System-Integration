<?php 
    $ponum = $_GET["poNUM"];
     try{
        include "../../database.php";
        
        $query = "UPDATE PURCHASE_ORDER SET PO_ACTIVE = 1 WHERE PO_NO = :ponumber";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":ponumber", $ponum);

        $stmt->execute();

        echo '<script>setTimeout(function () { window.location.href = "../deletedPOForm.php";}, 500);</script>';

        $pdo = null;
        $stmt = null;
        die();
    }
    catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
?>