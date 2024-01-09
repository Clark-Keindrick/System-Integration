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
  <title>Purchase Order</title>
  <!-- Link Styles -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Purchase.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="ribbon.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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


      <div class="container">
        <div class="content">
          <form action="#">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Inventory ID</span>
                <select required >
                  <option value="">Select Inventory ID</option>
                  <option value="1">10</option>
                  <option value="2">11</option>
                  <option value="3">12</option>
                  <option value="4">13</option>
                </select>
              </div>
              <div class="input-box">
                <span class="details">Item Description</span>
                <input type="text" placeholder="Enter Item Description" required>
              </div>
              <div class="input-box">
                <span class="details">Quantity</span>
                <input type="number" placeholder="Enter quantity" required>
              </div>
              <div class="input-box">
                <span class="details">Unit</span>
                <input type="text" placeholder="Input a unit" required>
              </div>
              <div class="input-box">
                <span class="details">Price</span>
                <input type="number" placeholder="Input a price" required>
              </div>
              <div class="input-box">
                <span class="details">SHIP VIA</span>
                <input type="text" placeholder="SHIP VIA">
              </div>
              <div class="input-box">
                <span class="details">F.O.B.</span>
                <input type="text" placeholder="Enter F.O.B">
              </div>
              <div class="input-box">
                <span class="details">Shipping Terms</span>
                <input type="text" placeholder="Enter shipping terms">
              </div>
              <div class="input-box">
                <span class="details">Request ID</span>
                <select required >
                    <option value="">Select Request ID</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
              </div>
              <div class="input-box">
                <span class="details">Supplier Code</span>
                <select required >
                    <option value="">Select Supplier Code</option>
                    <option value="1">21</option>
                    <option value="2">22</option>
                    <option value="3">23</option>
                    <option value="4">24</option>
                </select>
              </div>
            </div>
            <div class="button">
              <input type="submit" value="Submit">
            </div>
        </form>
      </div>
    </div>
  </section>

  
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

</body>
</html>