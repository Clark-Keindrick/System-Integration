<?php
    require_once('../functions.php');
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["branch"]) )
	{
    	header("location: ../login.php");
    	exit();
	}
    $userID = $_SESSION["userID"];
    $branch = $_SESSION["branch"];
    $total_items = total_items($branch);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventory</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="general.css">
        <link rel="stylesheet" href="css/inventory.css">
        <link rel ="icon" href ="dashboard-icons/logo.png" type ="image/x-icon">
    </head>
    <body>
    <?php include("header_sidebar.php"); ?>
        <main>
            <div class="row page-path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> <i class='bx bxs-home' style='color:#36a7ff'  ></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                    </ol>
                </nav>
            </div>

            <div class="inv_header bg-dark text-light">
                <h3 class="inv_label">Inventory</h3>
                <div class="search-items searchbox">
                    <form class="d-flex">
                        <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <h3 class="tot_item_label">Total Items: <?php echo $total_items; ?></h3>
            </div>

            <div class="item-list">
                <?php inventory_item($userID, $branch); ?>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous">
        </script>
    </body>
</html>