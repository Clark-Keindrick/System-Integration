<?php
    require_once('../functions.php');
    session_start();
    if(!isset($_SESSION["username"]) && !isset($_SESSION["branch"]) )
	{
    	header("location: ../login.php");
    	exit();
	}
    $session_name = $_SESSION["username"];
    $userid2 = $_SESSION["userID"];
    $row = array();
	$row = user_data($session_name);
    $last_login = $row["LAST_LOGIN"];
    $total_requests = requisition_count($userid2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="css/ribbon.css">
    <link rel ="icon" href ="dashboard-icons/logo.png" type ="image/x-icon">
</head>
<body>
    <?php include("header_sidebar.php"); ?>
    <main>
        <div class="row page-path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> <i class='bx bxs-home' style='color:#36a7ff'  ></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
        </div>

        <h1>Dashboard</h1>

        <div class="panels">
            <a href="request-made.php">
                <div class="panels-container">
                    <div class="panels-icon">
                        <i class='bx bx-edit' style='color:#ffffff'></i>
                    </div>
                    <div class="panels-stats">
                        <div class="panels-stats-box">
                            <p class="stats-num"><?php echo $total_requests; ?></p>
                            <p class="stats-label">Requests made</p>
                        </div>
                    </div>
                </div>
            </a>

            <a href="sales.php">
                <div class="panels-container">
                    <div class="panels-icon2">
                        <i class='bx bx-line-chart' style='color:#ffffff'></i>
                    </div>
                    <div class="panels-stats">
                        <div class="panels-stats-box">
                            <p class="stats-num">&#8369;13,500</p>
                            <p class="stats-label">Daily Sales</p>
                        </div>
                    </div>
                </div>
            </a>

            <div class="panels-container">
                <div class="panels-icon3">
                    <i class='bx bx-money-withdraw' style='color:#ffffff' ></i>
                </div>
                <div class="panels-stats">
                    <div class="panels-stats-box">
                        <p class="stats-num">536</p>
                        <p class="stats-label">Items Sold</p>
                    </div>
                </div>
            </div>

            <div class="panels-container" type="button" id="liveToastBtn">
                <div class="panels-icon4">
                    <i class='bx bxs-bell-ring' style='color:#ffffff' ></i>
                </div>
                <div class="panels-stats">
                    <div class="panels-stats-box">
                        <p class="stats-num">2</p>
                        <p class="stats-label">Notifications</p>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="ribbon">
            <strong class="ribbon-content">P.O.S&nbsp;System</strong>
        </h1>

        <div class="POS">
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="pos-input">
                        <label for="inventory-id" class="form-label">Inventory I.D</label>
                        <input type="number" placeholder="####" id="inventory-id" class="form-control" required>
                        <div class="invalid-feedback">
                            Please input inventory ID
                        </div>
                    </div>
                    <div class="pos-input">
                        <label for="invoice-id">Invoice I.D</label>
                        <input type="number" placeholder="####" id="invoice-id" class="form-control" required>
                        <div class="invalid-feedback">
                            Please input invoice ID
                        </div>
                    </div>

                    <div class="pos-input">
                        <label for="qnty">Quantity</label>
                        <input type="number" placeholder="####" id="qnty" class="form-control" required>
                        <div class="invalid-feedback">
                            Please input quantity
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="pos-input">
                        <label>Unit</label>
                        <select class="form-select" required aria-label="select example">
                            <option value="">Select Unit</option>
                            <option value="1">pcs</option>
                            <option value="2">gross</option>
                            <option value="3">sets</option>
                            <option value="4">pairs</option>
                            <option value="5">bottle</option>
                            <option value="6">can</option>
                        </select>
                        <div class="invalid-feedback">Please select a unit</div>
                    </div>

                    <div class="pos-input">
                        <label for="pricetag">Price</label>
                        <input type="number" placeholder="####" id="pricetag" class="form-control" required>
                        <div class="invalid-feedback">
                            Please enter the price
                        </div>
                    </div>

                    <div class="pos-input">
                        <label for="pay">Payment</label>
                        <input type="number" placeholder="####" id="pay" class="form-control" required>
                        <div class="invalid-feedback">
                            Please input payment
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="pos-input">
                        <label for="discount">Discount</label>
                        <input type="number" placeholder="####" id="discount">
                    </div>

                    <div class="pos-input">
                        <label>Mode of Payment</label>
                        <select class="form-select" required aria-label="select example">
                            <option value="">Select Mode of Payment</option>
                            <option value="1">Cash</option>
                            <option value="2">Debit Card</option>
                            <option value="3">Credit Card</option>
                            <option value="4">Cheque</option>
                            <option value="5">Mobile Phone</option>
                        </select>
                        <div class="invalid-feedback">Please select a MOP</div>
                    </div>

                    <div class="pos-input">
                        <label>Customer</label>
                        <select class="form-select" required aria-label="select example">
                            <option value="">Select Customer Type</option>
                            <option value="1">new</option>
                            <option value="2">regular</option>
                            <option value="3">VIP</option>
                        </select>
                        <div class="invalid-feedback">Please select a customer type</div>
                    </div>
                </div>

                <div class="row">
                    <div class="amounts">
                        <h3>Payable:&nbsp;&nbsp;</h3>
                        <p>&#8369;5690.00</p>
                    </div>
    
                    <div class="amounts">
                        <h3>Paid:&nbsp;&nbsp;</h3>
                        <p>&#8369;6000.00</p>
                    </div>
    
                    <div class="amounts">
                        <h3>Change:&nbsp;&nbsp;</h3>
                        <p>&#8369;310.00</p>
                    </div>
                </div>
                <div class="d-grid gap-2" style="margin-top: 50px;">
                    <button type="submit" class="btn btn-primary btn-lg">Generate Invoice</button>
                </div>
            </form>
        </div>
    </main>

    <div class="nice-toasts position-fixed bottom-0 p-3 end-0">
        <div class="toast-container position-static">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="dashboard-icons/bell.png" class="rounded me-2" alt="...">
                    <strong class="me-auto">New Notification</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Your request has been approved!
                </div>
            </div>

            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="dashboard-icons/bell.png" class="rounded me-2" alt="...">
                    <strong class="me-auto">New Notification</strong>
                    <small class="text-muted">11 minutes ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Your request has been denied!
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

    <script>
        const toastTrigger = document.getElementById('liveToastBtn')
        const toasts = document.querySelectorAll(".nice-toasts .toast");
        const basicToasts = document.querySelectorAll(".toast");
        const animateFrom = "top";
        const animateOffset = "-48px";

        if(toastTrigger){
            toastTrigger.addEventListener('click', () => {
                function getAbsoluteHeight(el) {
                const styles = window.getComputedStyle(el);
                const margin =
                    parseFloat(styles["marginTop"]) + parseFloat(styles["marginBottom"]);
                return Math.ceil(el.offsetHeight + margin);
                }
                
                basicToasts.forEach((toast) => {
                const inst = bootstrap.Toast.getOrCreateInstance(toast, {
                    autohide: false
                });
                inst.show();
                });
                toasts.forEach((toast) => {
                toast.style.position = "relative";
                toast.style[animateFrom] = animateOffset;
                
                toast.addEventListener(
                    "show.bs.toast",
                    () => {
                    console.log("showing");
                    // Additional slide animation
                    setTimeout(() => {
                        // Transition is not available until actual animation
                        const transition =
                        parseFloat(getComputedStyle(toast).transitionDuration) * 1e3;
                        toast.style.transition = `all ${
                        transition * 4
                        }ms cubic-bezier(0.165, 0.840, 0.440, 1.000), opacity ${transition}ms linear`;
                        toast.style[animateFrom] = 0;
                    }, 0);
                    },
                    {
                    once: true
                    }
                );
                
                toast.addEventListener(
                    "hide.bs.toast",
                    () => {
                    console.log("hiding");
                    toast.style.transform = `scale(0)`;
                    toast.style.marginTop = `-${getAbsoluteHeight(toast)}px`;
                    },
                    {
                    once: true
                    }
                );
                toast.addEventListener(
                    "hidden.bs.toast",
                    () => {
                    console.log("hidden");
                    },
                    {
                    once: true
                    }
                );
                
                toast.classList.add("toaster");
                const inst = bootstrap.Toast.getOrCreateInstance(toast, {
                    autohide: false
                });
                inst.show();
                });
            })
        }
        
    </script>
    
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
</body>
</html>