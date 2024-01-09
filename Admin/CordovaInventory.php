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
  <title>Cordova Inventory</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/Inventory.css">
  <link rel="stylesheet" href="css/header.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel ="icon" href ="image/logo.png" type ="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="text">Inventory</div>
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
                <li class="breadcrumb-item active" aria-current="page">Inventory</li>
            </ol>
        </nav>
    </div>

    <div class="btns-switch">
        <button type="button" class="btn btn-lg btn-info btn-add" onclick="location.href='add_inventory.php'"><i class='bx bxs-cart-add' undefined ></i>Add New Item</button>
        <button type="button" class="btn btn-lg btn-dark btn-switch" onclick="location.href='LLCInventory.php'"><i class='bx bx-arrow-back' style='color:#ffffff'></i>Lapu-Lapu Branch</button>
    </div>
  
    <main>
        <div class="inv_header bg-success text-light">
            <h3 class="inv_label">Cordova Branch Inventory</h3>
            <div class="search-items searchbox">
                <form class="d-flex">
                    <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Search</button>
                </form>
            </div>
            <h3 class="tot_item_label">Total Items: 56</h3>
        </div>

        <div class="item-list">
            <div class="card border-success bg-light border-3" style="width: 17rem;">
                <div class="card-header bg-transparent border-success">
                    <a href="edit_item.php"><i class='bx bxs-edit' style='color:#06c700'></i></a>
                    <p>Freewheel 18T Kent</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#ff0003'></i></a>
                </div>
                <img src="image/freewheel.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="first-row">
                        <p class="card-text">ID: <span>1009</span></p>
                        <p class="card-text">Unit: <span>pcs</span></p>
                    </div>
                    <div class="second-row">
                        <p class="card-text">Price: <span>&#8369;51.00</span></p>
                        <p class="card-text">Stocks: <span>25</span></p>
                    </div>
                    <div class="third-row">
                        <p class="card-text">Supplier: <span>1125</span></p>
                        <p class="card-text">Updated: <span>12/28/2023</span></p>
                    </div>
                </div>
            </div>

            <div class="card border-success bg-light border-3" style="width: 17rem;">
                 <div class="card-header bg-transparent border-success">
                    <a href="edit_item.php"><i class='bx bxs-edit' style='color:#06c700'></i></a>
                    <p>Bar Tape T-35 Pink</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#ff0003'></i></a>
                </div>
                <img src="image/bartape.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="first-row">
                        <p class="card-text">ID: <span>1010</span></p>
                        <p class="card-text">Unit: <span>pairs</span></p>
                    </div>
                    <div class="second-row">
                        <p class="card-text">Price: <span>&#8369;122.00</span></p>
                        <p class="card-text">Stocks: <span>33</span></p>
                    </div>
                    <div class="third-row">
                        <p class="card-text">Supplier: <span>1125</span></p>
                        <p class="card-text">Updated: <span>12/31/2023</span></p>
                    </div>
                </div>
            </div>

            <div class="card border-success bg-light border-3" style="width: 17rem;">
                <div class="card-header bg-transparent border-success">
                    <a href="edit_item.php"><i class='bx bxs-edit' style='color:#06c700'></i></a>
                    <p>CST Tube 22 X 1.75</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#ff0003'></i></a>
                </div>
                <img src="image/CST Tubes.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="first-row">
                        <p class="card-text">ID: <span>1011</span></p>
                        <p class="card-text">Unit: <span>gross</span></p>
                    </div>
                    <div class="second-row">
                        <p class="card-text">Price: <span>&#8369;104.00</span></p>
                        <p class="card-text">Stocks: <span>17</span></p>
                    </div>
                    <div class="third-row">
                        <p class="card-text">Supplier: <span>1126</span></p>
                        <p class="card-text">Updated: <span>12/30/2023</span></p>
                    </div>
                </div>
            </div>

            <div class="card border-success bg-light border-3" style="width: 17rem;">
                <div class="card-header bg-transparent border-success">
                    <a href="edit_item.php"><i class='bx bxs-edit' style='color:#06c700'></i></a>
                    <p>CST Tire 700X25C</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#ff0003'></i></a>
                </div>
                <img src="image/cst tire.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="first-row">
                        <p class="card-text">ID: <span>1012</span></p>
                        <p class="card-text">Unit: <span>bottle</span></p>
                    </div>
                    <div class="second-row">
                        <p class="card-text">Price: <span>&#8369;345.00</span></p>
                        <p class="card-text">Stocks: <span>23</span></p>
                    </div>
                    <div class="third-row">
                        <p class="card-text">Supplier: <span>1126</span></p>
                        <p class="card-text">Updated: <span>11/28/2023</span></p>
                    </div>
                </div>
            </div>

            <div class="card border-success bg-light border-3" style="width: 17rem;">
                <div class="card-header bg-transparent border-success">
                    <a href="edit_item.php"><i class='bx bxs-edit' style='color:#06c700'></i></a>
                    <p>Freewheel 18T Kent</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#ff0003'></i></a>
                </div>
                <img src="image/freewheel.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="first-row">
                        <p class="card-text">ID: <span>1013</span></p>
                        <p class="card-text">Unit: <span>pcs</span></p>
                    </div>
                    <div class="second-row">
                        <p class="card-text">Price: <span>&#8369;51.00</span></p>
                        <p class="card-text">Stocks: <span>25</span></p>
                    </div>
                    <div class="third-row">
                        <p class="card-text">Supplier: <span>1127</span></p>
                        <p class="card-text">Updated: <span>10/25/2023</span></p>
                    </div>
                </div>
            </div>

            <div class="card border-warning bg-light border-5" style="width: 17rem;">
                <div class="card-header bg-transparent border-success">
                    <a href="edit_item.php"><i class='bx bxs-edit' style='color:#06c700'></i></a>
                    <p>CST Tube 22 X 1.75</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#ff0003'></i></a>
                </div>
                <img src="image/CST Tubes.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="first-row">
                        <p class="card-text">ID: <span>1014</span></p>
                        <p class="card-text">Unit: <span>gross</span></p>
                    </div>
                    <div class="second-row">
                        <p class="card-text">Price: <span>&#8369;104.00</span></p>
                        <p class="card-text">Stocks: <span>5</span></p>
                    </div>
                    <div class="third-row">
                        <p class="card-text">Supplier: <span>1127</span></p>
                        <p class="card-text">Updated: <span>10/31/2023</span></p>
                    </div>
                </div>
            </div>

            <div class="card border-success bg-light border-3" style="width: 17rem;">
                <div class="card-header bg-transparent border-success">
                    <a href="edit_item.php"><i class='bx bxs-edit' style='color:#06c700'></i></a>
                    <p>Bar Tape T-35 Pink</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#ff0003'></i></a>
                </div>
                <img src="image/bartape.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="first-row">
                        <p class="card-text">ID: <span>1015</span></p>
                        <p class="card-text">Unit: <span>pairs</span></p>
                    </div>
                    <div class="second-row">
                        <p class="card-text">Price: <span>&#8369;122.00</span></p>
                        <p class="card-text">Stocks: <span>33</span></p>
                    </div>
                    <div class="third-row">
                        <p class="card-text">Supplier: <span>1128</span></p>
                        <p class="card-text">Updated: <span>11/30/2023</span></p>
                    </div>
                </div>
            </div>

            <div class="card border-danger bg-light border-5" style="width: 17rem;">
                 <div class="card-header bg-transparent border-success">
                    <a href="edit_item.php"><i class='bx bxs-edit' style='color:#06c700'></i></a>
                    <p>CST Tire 700X25C</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bxs-trash' style='color:#ff0003'></i></a>
                </div>
                <img src="image/cst tire.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="first-row">
                        <p class="card-text">ID: <span>1016</span></p>
                        <p class="card-text">Unit: <span>bottle</span></p>
                    </div>
                    <div class="second-row">
                        <p class="card-text">Price: <span>&#8369;345.00</span></p>
                        <p class="card-text">Stocks: <span>0</span></p>
                    </div>
                    <div class="third-row">
                        <p class="card-text">Supplier: <span>1129</span></p>
                        <p class="card-text">Updated: <span>12/28/2023</span></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Item<img src="image/dustbin.png" alt="..."></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-yes" data-bs-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
  
  <!-- Scripts -->
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
  <script src="script.js"></script>

</body>
</html>