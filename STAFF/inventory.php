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
                <h3 class="tot_item_label">Total Items: 56</h3>
            </div>

            <div class="item-list">
                <div class="card border-success bg-light border-3" style="width: 17rem;">
                    <div class="card-header bg-transparent border-success">Freewheel 18T Kent</div>
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
                    </div>
                </div>

                <div class="card border-success bg-light border-3" style="width: 17rem;">
                    <div class="card-header bg-transparent border-success">Bar Tape T-35 Pink</div>
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
                    </div>
                </div>

                <div class="card border-success bg-light border-3" style="width: 17rem;">
                    <div class="card-header bg-transparent border-success">CST Tube 22 X 1.75</div>
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
                    </div>
                </div>

                <div class="card border-success bg-light border-3" style="width: 17rem;">
                    <div class="card-header bg-transparent border-success">CST Tire 700X25C</div>
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
                    </div>
                </div>

                <div class="card border-success bg-light border-3" style="width: 17rem;">
                    <div class="card-header bg-transparent border-success">Freewheel 18T Kent</div>
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
                    </div>
                </div>

                <div class="card border-warning bg-light border-5" style="width: 17rem;">
                    <div class="card-header bg-transparent border-success">CST Tube 22 X 1.75</div>
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
                    </div>
                </div>

                <div class="card border-success bg-light border-3" style="width: 17rem;">
                    <div class="card-header bg-transparent border-success">Bar Tape T-35 Pink</div>
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
                    </div>
                </div>

                <div class="card border-danger bg-light border-5" style="width: 17rem;">
                    <div class="card-header bg-transparent border-success">CST Tire 700X25C</div>
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
                    </div>
                </div>
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