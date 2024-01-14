<?php 
    $reqID = $_GET["reqID"];
     try{
        include "../../database.php";
        
        $query = "UPDATE REQUISITION SET REQ_ACTIVE = 1 WHERE REQ_ID = :reqID";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":reqID", $reqID);

        $stmt->execute();

        echo '<script>setTimeout(function () { window.location.href = "../deleted_requisition.php";}, 500);</script>';

        $pdo = null;
        $stmt = null;
        die();
    }
    catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
?>