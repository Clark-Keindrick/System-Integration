<?php 
    $reqID = $_GET["reqID"];
     try{
        include "../../database.php";
        
        $query = "UPDATE REQUISITION SET REQ_ACTIVE = 0 WHERE REQ_ID = :reqID";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":reqID", $reqID);

        $stmt->execute();

        echo '<script>setTimeout(function () { window.location.href = "../requisition.php";}, 500);</script>';

        $pdo = null;
        $stmt = null;
        die();
    }
    catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
?>