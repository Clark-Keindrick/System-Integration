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
  <title>Daily Sales</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/sales.css">
  <link rel="stylesheet" href="css/header.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
   <link rel ="icon" href ="image/logo.png" type ="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="text">Cordova Branch Daily Sales</div>
        <div class="btn-group drpdwn">
            <button class="btn btn-info btn-sm dropdown-toggle badge btn-prof" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <li class="breadcrumb-item active" aria-current="page">Daily Sales</li>
            </ol>
        </nav>
    </div>

    <main>
        <div class="inv_header bg-danger text-light">
            <h3 class="inv_label">Cordova Branch Daily Sales</h3>
            <div class="search-items searchbox">
                <form class="d-flex">
                    <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
            <h3 class="tot_item_label">Total Daily Sales: P56,790.25</h3>
        </div>

        <div class="inv_table table-responsive-md">
            <table class="table table-hover table-success table-striped text-center">
                <thead class="table-success ">
                <tr>
                    <th scope="col">SALES ID</th>
                    <th scope="col">DATE</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">UNIT</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">DISCOUNT</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">PAID</th>
                    <th scope="col">PAYABLE</th>
                    <th scope="col">MOP</th>
                    <th scope="col">INVENTORY ID</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                    <tr >
                        <td>59820</td>
                        <td>11/20/2023</td>
                        <td>3</td>
                        <td>pcs</td>
                        <td>&#8369;122.00</td>
                        <td>&#8369;0.0</td>
                        <td>&#8369;366.00</td>
                        <td>&#8369;500.00</td>
                        <td>&#8369;366.00</td>
                        <td>CASH</td>
                        <td>1010</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#fb0000'></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>59821</td>
                        <td>11/28/2023</td>
                        <td>5</td>
                        <td>bottle</td>
                        <td>&#8369;345.00</td>
                        <td>&#8369;0.0</td>
                        <td>&#8369;1725.00</td>
                        <td>&#8369;2000.00</td>
                        <td>&#8369;1725.00</td>
                        <td>CASH</td>
                        <td>1012</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#fb0000'></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>59822</td>
                        <td>12/21/2023</td>
                        <td>8</td>
                        <td>gross</td>
                        <td>&#8369;104.00</td>
                        <td>&#8369;0.0</td>
                        <td>&#8369;832.00</td>
                        <td>&#8369;100.00</td>
                        <td>&#8369;832.00</td>
                        <td>CASH</td>
                        <td>1011</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#fb0000'></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Sales<img src="image/dustbin.png" alt="..."></h5>
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