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
  <title>P.O Form Made</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/POmade.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="ribbon.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel ="icon" href ="image/logo.png" type ="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="text">P.O Form Made</div>
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
                <li class="breadcrumb-item active" aria-current="page">P.O Form Made</li>
            </ol>
        </nav>
    </div>
    <main class="home-section">
        <h1 class="ribbon">
            <strong class="ribbon-content">P.O Form Made</strong>
        </h1>

        <div class="inv_table table-responsive-md">
            <table class="table table-hover table-striped text-center">
                <thead class="table-primary">
                <tr>
                    <th scope="col">REQUEST ID</th>
                    <th scope="col">REQUISITIONER</th>
                    <th scope="col">DATE</th>
                    <th scope="col">SUPPLIER CODE</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                    <tr >
                        <td>57093</td>
                        <td>CLARK MOLLEJON</td>
                        <td>11/18/2023</td>
                        <td>20395</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#poForm"><img src="image/eye.png" alt="..."></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#POdelete"><i class='bx bx-x'></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>57094</td>
                        <td>JOHN ALBERT TORREON</td>
                        <td>10/23/2023</td>
                        <td>20396</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#poForm"><img src="image/eye.png" alt="..."></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#POdelete"><i class='bx bx-x'></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>67095</td>
                        <td>BRYAN RACOMA</td>
                        <td>12/23/2023</td>
                        <td>20397</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#poForm"><img src="image/eye.png" alt="..."></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#POdelete"><i class='bx bx-x'></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="modal fade modal1" id="poForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="poFormLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-header1 bg-info">
                        <h5 class="modal-title modal-title1" id="poFormLabel">Print P.O Form ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body1">
                        <div>
                            <div class="POheader mb-4">
                                <div class="compName">
                                    <img src="image/logo.png" alt="...">
                                    <h3>BikePro Bicycle Shop</h3>
                                    <p>St. Address: <span>Babag II Road, Lapu-Lapu City</span></p>
                                    <p>Contact #: <span>09165376140</span></p>
                                </div>
                                <div class="poDate">
                                    <h3 class="poTitle">PURCHASE ORDER</h3>
                                    <div class="poDate2"><p>Date: <span>12/31/2023</span></p></div>
                                    <div class="poDate2"><p>PO #: <span>657201</span></p></div>
                                </div>
                            </div>

                            <div class="POaddress">
                                <div class="vendor">
                                    <h4 class="adrslbl">VENDOR</h4>
                                    <p>Company: <span>Cebu Kent Cycle</span></p>
                                    <p>Vendor name: <span>Lucio Katigbak</span></p>
                                    <p>Address: <span>Maugikay, Mandaue City</span></p>
                                    <p>Vendor name: <span>09279815165</span></p>
                                </div>
                                <div class="shipto">
                                    <h4 class="adrslbl">SHIP TO</h4>
                                    <p>Name: <span>12/31/2023</span></p>
                                    <p>Company: <span>657201</span></p>
                                    <p>St. Address: <span>Babag II Road, Lapu-Lapu City</span></p>
                                    <p>Contact #: <span>09165376140</span></p>
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
                                            <td>CLARK MOLLEJON</td>
                                            <td>Air & Land</td>
                                            <td>Shipping Point</td>
                                            <td>Cost, Insurance & Freight</td>
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
                                        <tr >
                                            <td>1010</td>
                                            <td>Bar Take T-35 Pink</td>
                                            <td>5</td>
                                            <td>&#8369;122.00</td>
                                            <td>Pairs</td>
                                            <td>&#8369;610.00</td>
                                        </tr>

                                        <tr >
                                            <td>1012</td>
                                            <td>CST Tire 700X25C</td>
                                            <td>12</td>
                                            <td>&#8369;345.00</td>
                                            <td>Pairs</td>
                                            <td>&#8369;4140.00</td>
                                        </tr>
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
                                        <p>&#8369;4750.00</p>
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
                                        <p>&#8369;4750.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer1">
                        <button type="button" class="btn btn-success btn-yes" data-bs-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade modal2" id="POdelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="POdeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger modal-header2">
                    <h5 class="modal-title modal-title2" id="POdeleteLabel">Delete Purchase Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body2">
                    Are you sure you want to delete this P.O Form?
                </div>
                <div class="modal-footer modal-footer2">
                    <button type="button" class="btn btn-outline-danger btn-yes2" data-bs-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">No</button>
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