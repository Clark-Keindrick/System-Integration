<?php
    require_once('../functions.php');
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["branch"]) )
    {
        header("location: ../login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Requsitions</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/staff_req.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="ribbon.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel ="icon" href ="image/logo.png" type ="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="text">Requisition Page</div>
        <div class="btn-group drpdwn">
            <button class="btn btn-info btn-md dropdown-toggle badge" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <li class="breadcrumb-item"><a href="dashboard.php"> <i class='bx bxs-home' style='color:#36a7ff'  ></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Requsitions</li>
            </ol>
        </nav>
    </div>
    <main class="home-section">
        <h1 class="ribbon">
            <strong class="ribbon-content">STAFF'S REQUISITONS</strong>
        </h1>

        <div class="req_table table-responsive-md">
            <?php admin_requisition_table(); ?>
        </div>
    </main>

    <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Requisition from Lapu-Lapu Branch</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-logo">
                    <img src="image/logo.png" alt="">
                </div>

                <div class="headings">
                    <h4>BikePro Bike Shop</h4>
                    <p>Babang II Rd, Lapu-Lapu City, Cebu</p>
                    <p>Phone: +63-927-981-5165</p>
                    <p>Email: clarkmollejon18@gmail.com</p>
                </div>

                <h3>Requisition Form</h3>

                <div class="salutation">
                    <p>Requisition no. : 34110</p>
                    <p>Date created : 11/13/2023</p>
                    <p>Date required : 11/18/2023</p>
                </div>

                <div class="table-modal">
                    <div class="table-responsive-md mod-table mb-3">
                        <table class="table table-bordered table-hover table-striped table-secondary">
                            <thead>
                                <tr>
                                <th scope="col">Inventory #</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>1014</td>
                                <td>CST Tube 22 X 1.75</td>
                                <td>50</td>
                                <td>pcs</td>
                                <td>₱104.00</td>
                                <td>₱5200.00</td>
                                </tr>
            
                                <tr>
                                <td>1016</td>
                                <td>CST Tire 700X25C</td>
                                <td>80</td>
                                <td>pairs</td>
                                <td>₱345.00</td>
                                <td>₱27600.00</td>
                                </tr>
            
                                <tr>
                                <td>1009</td>
                                <td>Freewheel 18T Kent</td>
                                <td>20</td>
                                <td>gross</td>
                                <td>₱51.00</td>
                                <td>₱1020.00</td>
                                </tr>
            
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="closing">
                    <div class="req_by">
                        <p>Requested by:</p>
                        <span>Clark Mollejon</span>
                        <hr>
                    </div>
                    
                    <div class="req_by">
                        <p>Approved by:</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-yes">APPROVE</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">DECLINE</button>
            </div>
            </div>
        </div>
    </div>

  <!-- Scripts -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>



    <script src="script.js"></script>
</body>
</html>