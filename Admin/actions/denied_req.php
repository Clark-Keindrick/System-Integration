<?php 
    $reqID = $_GET["requisitionID"];
     try{
        include "../../database.php";
        
        $query = "UPDATE REQUISITION SET REQ_STATUS = 'DENIED' WHERE REQ_ID = :reqID";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":reqID", $reqID);

        $stmt->execute();

        echo '<script>setTimeout(function () { window.location.href = "../Purchase.php";}, 500);</script>';

        $pdo = null;
        $stmt = null;
        die();
    }
    catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
?>