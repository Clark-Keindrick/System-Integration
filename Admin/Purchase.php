<?php
    require_once('../functions.php');
    require_once('../database.php');
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["branch"]) )
    {
        header("location: ../login.php");
        exit();
    }

    $query2 = "SELECT PO_STATUS FROM PURCHASE_ORDER WHERE PO_STATUS = 'PROCESSING'";

    $stmt2 = $pdo->prepare($query2);

    $stmt2->execute();

    $result = $stmt2->fetch(PDO::FETCH_ASSOC); 

    if(empty($result)){
        $button = '<input type="submit" value="Add P.O Form Number" name="addPO">';
    }
    else{
        $button = '';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Purchase Order</title>
  <!-- Link Styles -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Purchase.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="ribbon.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel ="icon" href ="image/logo.png" type ="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="text">Purchase Page</div>
        <div class="btn-group drpdwn">
            <button class="btn btn-info btn-sm dropdown-toggle badge" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                BikePro Admin
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="prof-pic.php"><img src="image/user.png" alt="image" >Change Profile Pic</a></li>
                <li><a class="dropdown-item" href="admin-settings.php"><img src="image/settings.png" alt="image">Settings</a></li>
                <li><a class="dropdown-item" href="logout.php"><img src="image/sign-out.png" alt="image" width="20px" style="width:20px; margin-left: 4px;">Logout</a></li>
            </ul>
        </div>
    </div>

  <?php include("sidebar.php");?>

   <div class="row page-path">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"> <i class='bx bxs-home' style='color:#36a7ff'></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Purchase Order</li>
            </ol>
        </nav>
    </div>
    <section class="home-section">
        <div class="rib-container">
          <h1 class="ribbon">
              <strong class="ribbon-content">FILL UP THE PURCHASE ORDER FORM</strong>
          </h1>
        </div>

        <div class="req_table table-responsive-md">
            <?php PO_requisition_table(); ?>
        </div>

        <div class="POcontainer">
            <div class="container">
              <div class="content">
                <form action="#" method="post">
                  <div class="user-details">
                    <div class="input-box">
                      <span class="details">SHIP VIA</span>
                      <input type="text" placeholder="SHIP VIA" name="shipVia">
                    </div>
                    <div class="input-box">
                      <span class="details">F.O.B.</span>
                      <input type="text" placeholder="Enter F.O.B" name="FOB">
                    </div>
                    <div class="input-box">
                      <span class="details">Shipping Terms</span>
                      <input type="text" placeholder="Enter shipping terms" name="terms">
                    </div>
                    <div class="input-box">
                      <span class="details">Request ID</span>
                      <select required name="REQID">
                          <option value="">Select Request ID</option>
                          <?php
                              include("../database.php");

                              $query2= "SELECT REQ_ID FROM REQUISITION WHERE REQ_STATUS = 'PENDING'";
                      
                              $stmt2 = $pdo->prepare($query2);
                      
                              $stmt2->execute();
                      
                              $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                              
                              foreach($result2 as $reqID){
                          ?>
                              <option value="<?php echo $reqID["REQ_ID"]; ?>"><?php echo $reqID["REQ_ID"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                  </div>
                  <div class="button">
                    <?php echo $button;  ?>
                  </div>
                </form>
              </div>
                <?php add_POForm(); ?>
            </div>

          <div class="container">
              <div class="content">
                <form action="#"  method="post">
                  <div class="user-details">
                    <div class="input-box">
                      <span class="details">Item Name</span>
                      <select required name="itemID">
                        <option value="">Select Inventory Item</option>
                        <?php
                              include("../database.php");

                              $query2 = "SELECT * FROM PURCHASE_ORDER, REQUISITION, REQUISITION_ITEM WHERE PURCHASE_ORDER.REQ_ID = REQUISITION.REQ_ID AND REQUISITION.REQ_ID = REQUISITION_ITEM.REQ_ID
                                         AND PO_STATUS = 'PROCESSING' AND PO_ACTIVE = 1";
                      
                              $stmt2 = $pdo->prepare($query2);
                      
                              $stmt2->execute();
                      
                              $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                              
                              foreach($result2 as $item){
                          ?>
                              <option value="<?php echo $item["INV_ID"]; ?>"><?php echo $item["ITEM_DESCRIPTION"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="input-box">
                      <span class="details">P.O #</span>
                      <select required name="poNumber">
                        <option value="">Select P.O Number</option>
                        <?php
                              include("../database.php");

                              $query2 = "SELECT PO_NO FROM PURCHASE_ORDER WHERE PO_STATUS = 'PROCESSING' AND PO_ACTIVE = 1";
                      
                              $stmt2 = $pdo->prepare($query2);
                      
                              $stmt2->execute();
                      
                              $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                              
                              foreach($result2 as $poNUM){
                          ?>
                              <option value="<?php echo $poNUM["PO_NO"]; ?>"><?php echo $poNUM["PO_NO"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="input-box">
                      <span class="details">Unit</span>
                      <select required name="itemUnit">
                        <option value="">Select Unit</option>
                        <option value="pcs">pcs</option>
                        <option value="gross">gross</option>
                        <option value="sets">sets</option>
                        <option value="pairs">pairs</option>
                        <option value="bottle">bottle</option>
                        <option value="can">can</option>
                      </select>
                    </div>
                    <div class="input-box">
                      <span class="details">Price</span>
                      <input type="number" placeholder="Input a price" required name="itemPrice" step=".01">
                    </div>
                    <div class="input-box">
                      <span class="details">Quantity</span>
                      <input type="number" placeholder="Enter quantity" required name="itemQTY">
                    </div>
                  </div>
                  <div class="button2">
                    <input type="submit" value="Add P.O Items" name="addPoItem">
                  </div>
              </form>
            </div>
              <?php Purchase_items(); ?>
          </div>
      </div>
  </section>

  <section class="mb-5 table-sec">
      <div class="table-responsive-md rq-table mb-3">
          <?php PO_item_list(); ?>
      </div>
      <button type="submit" class="btn btn-primary col-2" onclick="location.href='actions/updatePO.php'"><i class='bx bx-skip-next' style='color:#ffffff'  ></i>PROCEED</button>
  </section>

  <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="exampleModalLabel">Requisition from Lapu-Lapu Branch</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  
              </div>
              <div class="modal-footer">

              </div>
            </div>
        </div>
    </div>

  
  <!-- Scripts -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous">
    </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="script.js"></script>

    <script type='text/javascript'>
        $(document).ready(function(){
            $('.requestID').click(function(){
                var reqid= $(this).data('id');
                $.ajax({
                    url: '../STAFF/requestForm.php',
                    type: 'post',
                    data: {reqid: reqid},
                    success: function(response){ 
                        $('.modal-body').html(response); 
                        $('#requestModal').modal('show'); 
                    }
                });
            });
        });
    </script>

<script type='text/javascript'>
        $(document).ready(function(){
            $('.requestID').click(function(){
                var reqid= $(this).data('id');
                $.ajax({
                    url: 'modalFooter.php',
                    type: 'post',
                    data: {reqid: reqid},
                    success: function(response){ 
                        $('.modal-footer').html(response); 
                        $('#requestModal').modal('show'); 
                    }
                });
            });
        });
    </script>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>
</body>
</html>