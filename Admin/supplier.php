<?php
    require_once('../functions.php');
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["branch"]) )
    {
        header("location: ../login.php");
        exit();
    }

    $supcode;

    if(empty($_GET["supCode"])){
      $supcode = 0;
    }
    else{
      $supcode = $_GET["supCode"];
    }

    $row = array();
    $row = supplier_data($supcode);
    if(empty($row["SUP_NAME"]) || empty($row["COMPANY"]) || empty($row["SUP_ADDRESS"]) || empty($row["SUP_CONTACT"]) || empty($row["SUP_EMAIL"])){
      $supname = "supplier's name";
      $company = "company";
      $supaddress = "address";
      $supcontact = "#####";
      $supemail = "sample@gmail.com";
    }
    else{
      $supname = $row["SUP_NAME"];
      $company = $row["COMPANY"];
      $supaddress = $row["SUP_ADDRESS"];
      $supcontact = $row["SUP_CONTACT"];
      $supemail = $row["SUP_EMAIL"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Supplier</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/supplier.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="ribbon.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel ="icon" href ="image/logo.png" type ="image/x-icon">
</head>
<body>
  <div class="header">
      <div class="text">Supplier Page</div>
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
              <li class="breadcrumb-item active" aria-current="page">Supplier</li>
          </ol>
      </nav>
  </div>

  <div class="alert-box">
        <?php add_supplier(); ?> 
  </div>

  <div class="alert-box">
        <?php update_supplier($supcode); ?> 
  </div>
  
  <section class="sup_list">
      <h1 class="ribbon">
          <strong class="ribbon-content">SUPPLIER'S LIST</strong>
      </h1>

      <div class="sup_table table-responsive-md">
            <?php  supplier_table(); ?>
        </div>
  </section>

  <section class="sup_form">
      <h1 class="ribbon2">
        <strong class="ribbon-content2">ADD NEW SUPPLIER <i class='bx bxs-user-plus'></i></strong>
      </h1>

      <div class="SUPPLIER">
        <form action="" class="needs-validation" method="post" novalidate>
          <div class="row">
            <div class="sup-input">
              <label for="supName" class="form-label">SUPPLIER'S NAME</label>
              <input type="text" placeholder="supplier's name" name="supName" id="supName" class="form-control" value="<?php echo $supname; ?>">
              <div class="invalid-feedback">
                Please input supplier's name
              </div>
            </div>
            <div class="sup-input">
              <label for="supCompany">COMPANY</label>
              <input type="text" placeholder="company" name="supCompany" id="supCompany" class="form-control" required value="<?php echo $company; ?>">
              <div class="invalid-feedback">
                Please input a company
              </div>
            </div>

            <div class="sup-input">
              <label for="supAdrs">ADDRESS</label>
              <input type="text" name="supAdrs" placeholder="address" id="supAdrs" class="form-control" required value="<?php echo $supaddress; ?>">
              <div class="invalid-feedback">
                Please input address
              </div>
            </div>

            <div class="sup-input">
              <label for="phnum">CONTACT#</label>
              <input type="number" placeholder="####" name="supPhnum" id="phnum" class="form-control" value="<?php echo $supcontact; ?>">
            </div>

            <div class="sup-input">
              <label for="emailAD">EMAIL ADDRESS</label>
              <input type="email" name="emailAD" placeholder="@email address" id="emailAD" class="form-control" value="<?php echo $supemail; ?>">
            </div>
          </div>
              <div class="supBtn">
                <div class="d-grid gap-2 col-5 mx-auto">
                    <button type="submit" class="btn btn-success btn-lg" name="add_sup"><i class='bx bxs-user-plus'></i>ADD SUPPLIER</button>
                </div>
                <div class="d-grid gap-2 col-5 mx-auto">
                    <button type="submit" class="btn btn-primary btn-lg" name="update_sup">UPDATE SUPPLIER</button>
                </div>
              </div>

          </div>
        </form>
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

  <script type="text/javascript">
        var forms = document.querySelectorAll(".needs-validation");

        Array.prototype.slice.call(forms).forEach(function(form)
        {
            form.addEventListener("submit", function(event)
            {
                if(!form.checkValidity())
                {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            });
        });
    </script>

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>
</body>
</html>