<?php
    require_once('../functions.php');
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["branch"]) )
    {
        header("location: ../login.php");
        exit();
    }

    $itemsID = $_GET["invID"];

    $row = array();
    $row = items_data($itemsID);
    $desc = $row["INV_DESCRIPTION"];
    $pic = $row["INV_PIC"];
    $company = $row["COMPANY"];
    $qoh = $row["INV_QOH"];
    $unit = $row["INV_UNIT"];
    $price = $row["INV_PRICE"];
    $supcode = $row["SUP_CODE"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Item</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/edit_item.css">
  <link rel="stylesheet" href="ribbon.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel ="icon" href ="image/logo.png" type ="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="text">Edit Item</div>
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
                <li class="breadcrumb-item"><a href="LLCInventory.php">Inventory</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Items</li>
            </ol>
        </nav>
    </div>

    <main>
        <div class="alert-box">
            <?php update_inventory($itemsID); ?>
        </div>
        <h1 class="ribbon">
            <strong class="ribbon-content">EDIT ITEM</strong>
        </h1>

        <div class="setting-container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Item Information
                </div>
                <div class="panel-body">
                    <form class="form-signin" method="post" action="" enctype="multipart/form-data">
                        <label>Item Description</label>
                        <input type="text" placeholder="Description" name="updateName" class="form-control" required value="<?php echo $desc; ?>">
                        <label class="lblbox">Quantity</label>
                        <input type="number" placeholder="####" class="form-control" required value="<?php echo $qoh; ?>"  name="updateQOH">
                        <label class="lblbox">Unit</label>
                        <select class="form-select p-2" required aria-label="select example"  name="updateUnit">
                            <option value="<?php echo $unit; ?>"><?php echo $unit; ?></option>
                            <option value="pcs">pcs</option>
                            <option value="gross">gross</option>
                            <option value="sets">sets</option>
                            <option value="pairs">pairs</option>
                            <option value="bottle">bottle</option>
                            <option value="can">can</option>
                        </select>
                        <label class="lblbox">Price</label>
                        <input type="number" placeholder="P#.##" class="form-control" required value="<?php echo $price; ?>" name="updatePrice" step=".01">
                        <label class="lblbox">Supplier Name</label>
                        <select class="form-select p-2" required aria-label="select example"  name="updateSupcode">
                            <?php
                                $query = "SELECT SUP_CODE, COMPANY FROM supplier";
                        
                                $stmt = $pdo->prepare($query);
                        
                                $stmt->execute();
                        
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                
                                foreach($result as $Sup_Code){
                            ?>
                                <option value="<?php echo $Sup_Code["SUP_CODE"]; ?>"><?php echo $Sup_Code["COMPANY"]; ?></option>
                        <?php } ?>
                        </select>
                </div>
                <div class="panel-footer">
                        <button class="btn btn-primary" name="updateItem" type="submit" id="login">Save</button>&nbsp;&nbsp;
                        <a href="LLCInventory.php" class="btn btn-default" id="login">Cancel</a>
                </div>
                    </form>
            </div>     
        </div>
    </main>

  
  <!-- Scripts -->
  
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