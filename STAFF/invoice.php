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
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="css/invoice.css">
    <link rel="stylesheet" href="css/ribbon.css">
    <link rel ="icon" href ="dashboard-icons/logo.png" type ="image/x-icon">
</head>
<body>
    <?php include("header_sidebar.php"); ?>
    <main>
        <div class="row page-path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> <i class='bx bxs-home' style='color:#36a7ff'  ></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                </ol>
              </nav>
        </div>

        <h1 class="ribbon">
            <strong class="ribbon-content">ADD INVOICE</strong>
        </h1>

        <div class="d-grid d-md-flex justify-content-md-end btn-container">
            <button class="btn btn-dark btn-lg" type="button"><i class='bx bxs-add-to-queue' style='color:#ffffff'></i>Add new</button>
        </div>
        <div class="inv_table table-responsive-md">
            <table class="table table-hover table-striped text-center">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">INVOICE ID</th>
                    <th scope="col">STORE</th>
                    <th scope="col">BRANCH</th>
                    <th scope="col">CASHIER</th>
                    <th scope="col">CUSTOMER</th>
                    <th scope="col">DATE</th>
                    <th scope="col">TIME</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>00010</td>
                      <td>BIKEPRO</td>
                      <td>LAPU-LAPU</td>
                      <td>JULIE VILLAHERMOSA</td>
                      <td>GUEST</td>
                      <td>11/12/2023</td>
                      <td>7:58</td>
                      <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#invcModal"><i class='bx bx-money' ></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' ></i></a>
                      </td>
                    </tr>

                    <tr>
                        <td>00011</td>
                        <td>BIKEPRO</td>
                        <td>LAPU-LAPU</td>
                        <td>Bryan Racoma</td>
                        <td>Regular</td>
                        <td>11/12/2023</td>
                        <td>5:31</td>
                        <td>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#invcModal"><i class='bx bx-money'></i></a>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash'></i></a>
                        </td>
                    </tr>

                    <tr>
                    <td>00012</td>
                    <td>BIKEPRO</td>
                    <td>LAPU-LAPU</td>
                    <td>John Torreon</td>
                    <td>VIP</td>
                    <td>11/12/2023</td>
                    <td>4:40</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#invcModal"><i class='bx bx-money'></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash'></i></a>
                    </td>
                    </tr>
                </tbody>
              </table>
        </div>

        <div class="modal fade" id="invcModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-success text-white">
                  <h5 class="modal-title" id="exampleModalLabel">Print Receipt?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <img src="dashboard-icons/logo.png" alt="" class="mod-img">
                    </div>

                    <div class="headings">
                        <h2>BikePro Bike Shop</h2>
                        <p>Babang II Rd, Lapu-Lapu City, Cebu</p>
                        <p>Phone: +63-927-981-5165</p>
                        <p>Email: clarkmollejon18@gmail.com</p>
                    </div>

                    <div class="details">
                        <h2>SALES INVOICE</h2>
                        <p>CASHIER &nbsp;&nbsp;&nbsp;&nbsp;: <span>Clark Mollejon</span></p>
                        <p>INVOICE NO &nbsp;: <span>11023</span></p>
                        <p>CUSTOMER &nbsp;&nbsp;&nbsp;: <span>Guest</span></p>
                        <p>DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span>November 13th, 2023</span></p>
                        <p>TIME &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span>3:32:16 AM</span></p>
                    </div>

                    <table class="table table-sm receipt">
                        <tbody>
                          <tr>
                            <td class="headers">ITEM</td>
                            <td class="headers">QTY</td>
                            <td class="headers">UNIT</td>
                            <td class="headers">PRICE</td>
                          </tr>
                          <tr>
                            <td class="data">Bar Tape T-35 Pink</td>
                            <td class="data">2</td>
                            <td class="data">pairs</td>
                            <td class="data">₱244.00</td>
                          </tr>
                          <tr>
                            <td class="data">Freewheel 18T Kent</td>
                            <td class="data">5</td>
                            <td class="data">pcs</td>
                            <td class="data">₱255.00</td>
                          </tr>
                          <tr>
                            <td class="data">CST Tire 700X25C</td>
                            <td class="data">2</td>
                            <td class="data">bottle</td>
                            <td class="data">₱690.00</td>
                          </tr>
                        </tbody>
                    </table>

                    <div class="payments">
                        <div class="inv-row">
                            <p>TOTAL</p>
                            <p>₱1,189.00</p>
                        </div>
                        
                        <div class="inv-row">
                            <p>DISCOUNT<span>(0.0):</span></p>
                            <p>₱0.00</p>
                        </div>

                        <div class="inv-row">
                            <p>PAYABLE</p>
                            <p>₱1,189.00</p>
                        </div>

                        <div class="inv-row">
                            <p>PAID:</p>
                            <p>₱2,000.00</p>
                        </div>

                        <div class="inv-row">
                            <p>BALANCE:</p>
                            <p>₱11.00</p>
                        </div>

                        <div class="inv-row">
                            <p>PAID VIA:</p>
                            <p>CASH</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
                  <button type="button" class="btn btn-outline-primary">Print</button>
                </div>
              </div>
            </div>
          </div>
    </main>

    <div class="modal2 modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header2 modal-header bg-danger">
                    <h5 class="modal-title modal-title2" id="staticBackdropLabel">Delete Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body2">
                    Are you sure you want to delete this invoice?
                </div>
                <div class="modal-footer modal-footer2">
                    <button type="button" class="btn btn-danger btn-yes" data-bs-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
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