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
    <title>Trash</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/trash.css">
    <link rel="stylesheet" href="css/header.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel ="icon" href ="image/logo.png" type ="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
  <div class="header">
      <div class="text">Trash</div>
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
          <li class="breadcrumb-item"><a href="#"> <i class='bx bxs-home' style='color:#36a7ff'  ></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Trash</li>
          </ol>
      </nav>
  </div>

  <section class="home-section">
   <div class="trash_container"> </div>
    <form id="TrashDetails">
      <!--table for trash-->
      <div class="table_design">
        <div>
        <table>
            <thead>
                <tr>
                    <th class="trash_tabletext">Trash Id</th>
                    <th class="trash_tabletext">Image</th>
                    <th class="trash_tabletext">Description</th>
                    <th></th>
                </tr>
            </thead>
          
          <tbody>
            <tr>
              <td class="trash_tabletext">0112</td>
              <td><img src="freewheel.jpg" alt=""></td>
              <td class="trash_tabletext" >Free Wheel</td>
              <td>
                <span class="action_btn">
                  <a  href="#">Retrieve</a>
                  <a  href="#">Remove</a>
                </span>
              </td>
            </tr>

            <tr>
              <tr>
                <td class="trash_tabletext">0113</td>
                <td><img src="bartape.jpg" alt=""></td>
                <td class="trash_tabletext">Bartape</td>
                <td>
                  <span class="action_btn">
                    <a href="#">Retrieve</a>
                    <a href="#">Remove</a>
                  </span>
                </td>
              </tr>

              <tr>
                <td class="trash_tabletext">0114</td>
                <td><img src="cst tire.jpg" alt=""></td>
                <td class="trash_tabletext">CST Tire</td>
                <td>
                  <span class="action_btn">
                    <a href="#">Retrieve</a>
                    <a href="#">Remove</a>
                  </span>
                </td>
              </tr>

              <tr>
                <td class="trash_tabletext">0114</td>
                <td><img src="CST Tubes.jpeg" alt=""></td>
                <td class="trash_tabletext">CST Tubes</td>
                <td>
                  <span class="action_btn">
                    <a href="#">Retrieve</a>
                    <a href="#">Remove</a>
                  </span>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </form> 
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