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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="css/request-made.css">
    <link rel="stylesheet" href="css/ribbon.css">
    <link rel ="icon" href ="dashboard-icons/logo.png" type ="image/x-icon">
</head>
<body>
    <?php include("header_sidebar.php"); ?>
    <main>
        <div class="row page-path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php"> <i class='bx bxs-home' style='color:#36a7ff' ></i></a></li>
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Request Made</li>
                </ol>
              </nav>
        </div>

        <h1 class="ribbon">
            <strong class="ribbon-content">REQUISITION STATUS</strong>
        </h1>

        <div class="inv_table table-responsive-md">
            <table class="table table-hover table-striped text-center">
                <thead class="table-success">
                  <tr>
                    <th scope="col">REQUEST ID</th>
                    <th scope="col">DATE</th>
                    <th scope="col">DATE REQUIRED</th>
                    <th scope="col">AUTHOR</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">USER ID</th>
                    <th scope="col">ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>23240</td>
                      <td>July 27, 2023</td>
                      <td>August 9, 2023</td>
                      <td>Clark Mollejon</td>
                      <td>APPROVED</td>
                      <td>14451</td>
                      <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#requestModal"><img src="image/eye.png" alt="..."></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' ></i></a>
                      </td>
                    </tr>

                    <tr>
                        <td>23241</td>
                        <td>September 10, 2023</td>
                        <td>September 20, 2023</td>
                        <td>Clark Mollejon</td>
                        <td>DENIED</td>
                        <td>14451</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#requestModal"><img src="image/eye.png" alt="..."></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' ></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>23242</td>
                        <td>NOVEMMBER 13, 2023</td>
                        <td>NOVEMMBER 23, 2023</td>
                        <td>Clark Mollejon</td>
                        <td>PENDING</td>
                        <td>14451</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#requestModal"><img src="image/eye.png" alt="..."></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' ></i></a>
                        </td>
                    </tr>
                </tbody>
              </table>
        </div>
    </main>

    <div class="modal2 modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header2 modal-header bg-danger">
                    <h5 class="modal-title modal-title2" id="staticBackdropLabel">Delete Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body2">
                    Are you sure you want to delete this request?
                </div>
                <div class="modal-footer modal-footer2">
                    <button type="button" class="btn btn-danger btn-yes" data-bs-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">View Requests</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-logo">
                    <img src="dashboard-icons/logo.png" alt="">
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
                        <span>Julie Anne Villahermosa</span>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Exit</button>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>