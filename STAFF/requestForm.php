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

    $userid2 = $_SESSION["userID"];
    $session_name = $_SESSION["username"];
    $row = array();
	$row = user_data($session_name);
    $row2 = array();
	$row2 = business_data();
    $company = $row2["NAME"];
    $email = $row2["CONTACT"];
    $staddress= $row2["ST_ADDRESS"];
    $phone= $row2["PHONE"];

    $query = "SELECT * FROM REQUISITION WHERE REQ_ID = :reqid";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":reqid", $reqid);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    
    $reqno = $result["REQ_ID"];
    $created = $result["REQ_DATE"];
    $required = $result["REQ_DATEREQ"];
    $author3 = $result["REQ_AUTHOR"];
    $approved = $result["APPROVED_BY"];
?>
    <div class="modal-logo">
        <img src="../STAFF/dashboard-icons/logo.png" alt="">
    </div>

    <div class="headings">
        <h4><?php echo $company; ?></h4>
        <p><?php echo $staddress; ?></p>
        <p><?php echo $phone; ?></p>
        <p><?php echo $email; ?></p>
    </div>

    <h3>Requisition Form</h3>

    <div class="salutation">
            <p>Requisition no. : <?php echo $reqno; ?></p>
            <p>Date created : <?php echo $created; ?></p>
            <p>Date required : <?php echo $required; ?></p>
    </div>

    <div class="table-modal">
        <div class="table-responsive-md mod-table mb-3">
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-secondary">
                    <tr>
                    <th scope="col">Item #</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Inventory ID</th>
                    <th scope="col">Supplier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query2 = "SELECT * FROM INVENTORY, SUPPLIER, REQUISITION, REQUISITION_ITEM WHERE REQUISITION_ITEM.REQ_ID = :requestID
                                   AND REQUISITION_ITEM.REQ_ID = REQUISITION.REQ_ID AND REQUISITION_ITEM.INV_ID = INVENTORY.INV_ID AND 
                                   INVENTORY.SUP_CODE = SUPPLIER.SUP_CODE";

                        $stmt2 = $pdo->prepare($query2);
                
                        $stmt2->bindParam(":requestID", $reqid);
                
                        $stmt2->execute();
                
                        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC); 

                        if(!empty($result2)){
                            foreach($result2 as $row3){
                                echo '<tr >
                                        <td>'.$row3["ITEM_ID"].'</td>
                                        <td>'.$row3["ITEM_DESCRIPTION"].'</td>
                                        <td>'.$row3["ITEM_QTY"].'</td>
                                        <td>'.$row3["ITEM_UNIT"].'</td>
                                        <td>'.$row3["INV_ID"].'</td>
                                        <td>'.$row3["COMPANY"].'</td>
                                     </tr>';
                            }
                        }
                        else{
                            echo '<div class="alert-box">
                                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                                        <div class="alert_label">
                                            No requisitions available !
                                        </div>
                                    </div>
                                </div>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="closing">
        <div class="req_by">
            <p>Requested by:</p>
            <span><?php echo $author3; ?></span>
            <hr>
        </div>
        
        <div class="req_by">
            <p>Approved by:</p>
            <span><?php echo $approved; ?></span>
            <hr>
        </div>
    </div>