<?php 
    require_once('../functions.php');
    require_once('../database.php');
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["branch"]) )
	{
    	header("location: ../login.php");
    	exit();
	}

    $poNum = $_POST['PONUM'];

    $userid = $_SESSION["userID"];
    $session_name = $_SESSION["username"];
    $row = array();
    $row = business_data();
    $company = $row["NAME"];
    $email = $row["CONTACT"];
    $staddress= $row["ST_ADDRESS"];
    $phone= $row["PHONE"];

    $row2 = array();
    $row2 = PO_details($poNum);
    $SUPname = $row2["SUP_NAME"];
    $SUPcompany = $row2["COMPANY"];
    $SUPaddress = $row2["SUP_ADDRESS"];
    $SUPemail = $row2["SUP_EMAIL"];

    $row = user_data($session_name);
    $admin = $row["USER_FIRSTNAME"]." ".$row["USER_LASTNAME"];


    $query = "SELECT * FROM PURCHASE_ORDER, REQUISITION WHERE PURCHASE_ORDER.REQ_ID = REQUISITION.REQ_ID AND PO_NO = :ponum";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":ponum", $poNum);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    $requisitioner = $result["REQ_AUTHOR"];
    $shipvia = $result["SHIP_VIA"];
    $FOB = $result["FOB"];
    $terms = $result["SHIPPING_TERMS"];
    $date = $result["PO_DATE"];
    $POnumber = $result["PO_NO"];

    $totalPOPay = total_PO_Payment($poNum);
    $totalPOPay = number_format($totalPOPay);
	
?>
    <div>
        <div class="POheader mb-4">
            <div class="compName">
                <img src="image/logo.png" alt="...">
                <h3>BikePro Bicycle Shop</h3>
                <p>St. Address: <span><?php echo $staddress; ?></span></p>
                <p>Contact #: <span><?php echo $phone; ?></span></p>
            </div>
            <div class="poDate">
                <h3 class="poTitle">PURCHASE ORDER</h3>
                <div class="poDate2"><p>Date: <span><?php echo $date; ?></span></p></div>
                <div class="poDate2"><p>PO #: <span><?php echo $POnumber; ?></span></p></div>
            </div>
        </div>

        <div class="POaddress">
            <div class="vendor">
                <h4 class="adrslbl">VENDOR</h4>
                <p>Company: <span><?php echo $SUPcompany; ?></span></p>
                <p>Vendor name: <span><?php echo $SUPname; ?></span></p>
                <p>Address: <span><?php echo $SUPaddress; ?></span></p>
                <p>Email: <span><?php echo $SUPemail; ?></span></p>
            </div>
            <div class="shipto">
                <h4 class="adrslbl">SHIP TO</h4>
                <p>Name: <span><?php echo $admin; ?></span></p>
                <p>Company: <span><?php echo $company; ?></span></p>
                <p>St. Address: <span><?php echo $staddress; ?></span></p>
                <p>Contact #: <span><?php echo $phone; ?></span></p>
            </div>
        </div>

        <div class="table-responsive-md tbl-details">
            <table class="table text-center table-bordered border-dark">
                <thead>
                <tr>
                    <th scope="col">REQUESITIONER</th>
                    <th scope="col">SHIP VIA</th>
                    <th scope="col">F.O.B.</th>
                    <th scope="col">SHIPPING TERMS</th>
                </tr>
                </thead>
                <tbody>
                    <tr >
                        <td><?php echo $requisitioner; ?></td>
                        <td><?php echo $shipvia; ?></td>
                        <td><?php echo $FOB; ?></td>
                        <td><?php echo $terms; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-responsive-md tbl-details">
            <table class="table text-center table-bordered border-dark">
                <thead>
                <tr>
                    <th scope="col">ITEM #</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">UNIT</th>
                    <th scope="col">TOTAL</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $query2 = "SELECT * FROM PO_ITEM, INVENTORY WHERE PO_NO = :poNUM AND PO_ITEM.INV_ID = INVENTORY.INV_ID";

                        $stmt2 = $pdo->prepare($query2);
                
                        $stmt2->bindParam(":poNUM", $poNum);
                
                        $stmt2->execute();
                
                        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC); 

                        if(!empty($result2)){
                            foreach($result2 as $row3){
                                echo '<tr >
                                        <td>'.$row3["INV_ID"].'</td>
                                        <td>'.$row3["INV_DESCRIPTION"].'</td>
                                        <td>'.$row3["PO_ITEM_QTY"].'</td>
                                        <td>'.$row3["PO_ITEM_PRICE"].'</td>
                                        <td>'.$row3["PO_ITEM_UNIT"].'</td>
                                        <td>'.'&#8369;'.number_format($row3["PO_ITEM_QTY"] * $row3["PO_ITEM_PRICE"]).'</td>
                                    </tr>';
                            }
                        }
                        else{
                            echo '<div class="alert-box">
                                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                                        <div class="alert_label">
                                            No Purchase Item Available !
                                        </div>
                                    </div>
                                </div>';
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="POfooter">
            <div class="comment">
                <div class="comment-title">
                    <p>Comments or Special Instructions</p>
                </div>
            </div>

            <div class="POsubtotal">
                <div class="subtotals">
                    <p>SUBTOTAL</p>
                    <p>&#8369;<?php echo $totalPOPay; ?></p>
                </div>
                <div class="subtotals">
                    <p>TAX</p>
                    <p>-</p>
                </div>
                <div class="subtotals">
                    <p>SHIPPING</p>
                    <p>-</p>
                </div>
                <div class="subtotals">
                    <p>OTHER</p>
                    <p>-</p>
                </div>
                <hr>
                <div class="subtotals">
                    <p>TOTAL</p>
                    <p>&#8369;<?php echo $totalPOPay; ?></p>
                </div>
            </div>
        </div>
    </div>