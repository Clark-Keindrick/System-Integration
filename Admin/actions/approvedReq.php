<?php 
    require_once('../../functions.php');
    $reqID = $_GET["requisitionID"];
    session_start();
    $session_name = $_SESSION["username"];
    $row = array();
	$row = user_data($session_name);
    $fname = $row["USER_FIRSTNAME"];
    $lname = $row["USER_LASTNAME"];
    $approval = $fname ." ". $lname;

     try{
        include "../../database.php";
        
        $query = "UPDATE REQUISITION SET REQ_STATUS = 'APPROVED', APPROVED_BY = :admins WHERE REQ_ID = :reqID";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":reqID", $reqID);
        $stmt->bindParam(":admins", $approval);

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