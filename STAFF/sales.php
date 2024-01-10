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
    <title>Daily Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="css/sales.css">
    <link rel="stylesheet" href="css/ribbon.css">
    <link rel ="icon" href ="dashboard-icons/logo.png" type ="image/x-icon">
</head>
<body>
    <?php include("header_sidebar.php"); ?>
    <main>
        <div class="row page-path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> <i class='bx bxs-home' style='color:#36a7ff' ></i></a></li>
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daily Sales</li>
                </ol>
              </nav>
        </div>

        <h1 class="ribbon">
            <strong class="ribbon-content">TOTAL DAILY SALES:&nbsp; <span>₱13,000.00</span></strong>
        </h1>

        <div class="inv_table table-responsive-md">
            <table class="table table-hover table-striped text-center">
                <thead class="table-warning">
                  <tr>
                    <th scope="col">SALES ID</th>
                    <th scope="col">ITEM</th>
                    <th scope="col">QTY</th>
                    <th scope="col">UNIT</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">DISCOUNT</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">INVENTORY ID</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>5830</td>
                      <td>Freewheel 18T Kent</td>
                      <td>5</td>
                      <td>PCS</td>
                      <td>₱51.00</td>
                      <td>₱0.0</td>
                      <td>₱255.00</td>
                      <td>1009</td>
                      <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' ></i></a>
                      </td>
                    </tr>

                    <tr>
                        <td>5831</td>
                        <td>Bar Tape T-35 Pink</td>
                        <td>2</td>
                        <td>PAIRS</td>
                        <td>₱122.00</td>
                        <td>₱0.0</td>
                        <td>₱244.00</td>
                        <td>1010</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' ></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>5832</td>
                        <td>CST Tire 700X25C</td>
                        <td>2</td>
                        <td>BOTTLE</td>
                        <td>₱345.00</td>
                        <td>₱0.0</td>
                        <td>₱690.00</td>
                        <td>1016</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' ></i></a>
                        </td>
                    </tr>
                </tbody>
              </table>
        </div>
    </main>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Sales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete sales?
                </div>
                <div class="modal-footer">
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