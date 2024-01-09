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
  <title>Invoice</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/invoice.css">
  <link rel="stylesheet" href="css/header.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel ="icon" href ="logo.png" type ="image/x-icon">
</head>
<body>
  <div class="header">
      <div class="text">Invoice Page</div>
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
              <li class="breadcrumb-item active" aria-current="page">Invoice</li>
          </ol>
      </nav>
  </div>

  <section class="home-section">
    <div class="container">
      <div class="invoice-container">
        <div class="top-section">
          <div class="address">
            <div class="address-content">
              <h1>Company Name</h1>
              <p>6000 MJ Cuenco, Cebu City, Cebu, Philippines</p>
            </div>
          </div>
          <div class="contact">
            <div class="contact-content">
              <div class="email">Email : <span class="span"></span>company@gmail.com</div><br>
              <div class="number">Contact : <span class="span"></span>09161275985</div>
            </div>
          </div>
        </div>
        <div class="billing-invoice">
          <div class="title">Billing Invoice</div>
          <div class="des">
            <p class="code">
              #12345 - 8827
            </p>
            <p class="issue">   Issued : <span>  Dec. 12, 2023</span></p>
          </div>
        </div>
        <br>
        <div class="billing-to">
          <div class="billed-sec">
            <div class="address-content">
              <h1>Billed To</h1>
              <p>Juan De la Cruz</p>
              <p>juandelacruz@gmail.com</p>
              <p>+87645 8783</p>
            </div>
          </div>
          <div class="Addr-cont">
            <div class="contact-content">
              <div class="title-r"> Shipping Address <span class="ship-add"></span></div>
              <div class="ship-add">7723 Masamong St. Marikina, Philippines </div>
            </div>
          </div>
        </div>
        <div class="table">
          <table><tr>
            <th> # </th>
            <th> Product Name </th>
            <th> Qty </th>
            <th> Unit Price </th>
            <th> Subtotal </th>
            <th> Shipping </th>
            <th> Total </th>
          </tr>
          <tr>
            <td> 1 </td>
            <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </td>
            <td> 2 pc </td>
            <td> 250 BDT </td>
            <td> 250 BDT </td>
            <td> 0 BDT </td>
            <td> 0 BDT </td>
          </tr>
          <tr>
            <td> 2 </td>
            <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </td>
            <td> 2 pc </td>
            <td> 250 BDT </td>
            <td> 250 BDT </td>
            <td> 0 BDT </td>
            <td> 0 BDT </td>
          </tr>
          <tr>
            <td> 3 </td>
            <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </td>
            <td> 2 pc </td>
            <td> 250 BDT </td>
            <td> 250 BDT </td>
            <td> 0 BDT </td>
            <td> 0 BDT </td>
          </tr>
          <tr>
            <td> 4 </td>
            <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </td>
            <td> 2 pc </td>
            <td> 250 BDT </td>
            <td> 250 BDT </td>
            <td> 0 BDT </td>
            <td> 0 BDT </td>
          </tr>
          <tr>
            <td> 5 </td>
            <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </td>
            <td> 2 pc </td>
            <td> 250 BDT </td>
            <td> 250 BDT </td>
            <td> 0 BDT </td>
            <td> 0 BDT </td>
          </tr></table>
        </div>
      </div>
  </section>

  
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