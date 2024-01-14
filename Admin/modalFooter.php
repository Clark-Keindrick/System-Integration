<?php 
    require_once('../functions.php');
    require_once('../database.php');
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["branch"]) )
	{
    	header("location: ../login.php");
    	exit();
	}

    $reqid = $_POST['reqid'];

    $query = "SELECT * FROM REQUISITION WHERE REQ_ID = :reqid";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":reqid", $reqid);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    echo '<a href="actions/approvedReq.php?requisitionID='.$result["REQ_ID"].'" class="btn btn-success btn-yes">APPROVE</a>';
    echo '<a href="actions/denied_req.php?requisitionID='.$result["REQ_ID"].'"  class="btn btn-danger">DECLINE</a>';
?>

