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
    <title>Requisition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="css/requisition.css">
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
                <li class="breadcrumb-item active" aria-current="page">Requisition</li>
                </ol>
              </nav>
        </div>

        <h1 class="ribbon">
            <strong class="ribbon-content">REQUISITION FORM</strong>
        </h1>

        <div class="form-container">
            <div class="add-form bg-light">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div style="font-weight: 600;">
                      Add a request first
                    </div>
                  </div>
                <form action="" class="needs-validation" novalidate>
                    <div class="form-group begin-row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border-2 border-secondary" id="author" required placeholder="author">
                            <label for="author">Author</label>
                            <div class="invalid-tooltip">Provide an author</div>
                        </div>
    
                        <div class="input-group date" id="datepicker" name="datePicker">
                            <input type="text" class="form-control datepick border-2 border-secondary" required placeholder="Date Required">
                            <span class="input-group-append ">
                                <span class="input-group-text bg-white border-2 border-dark">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                            <div class="invalid-tooltip">Please select a date</div>
                        </div>
                    </div>
    
                    <div class="btn-container">
                        <button type="submit" class="btn btn-outline-primary col-4" >Add Request</button>
                    </div>
                </form>
            </div>

            <div class="add-form-2 bg-light">
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div style="font-weight: 600;">
                      Add items to your request
                    </div>
                  </div>
                <form action="" class="needs-validation" novalidate>
                    <div class="form-group begin-row">
                        <div class="form-floating mb-4">
                            <input type="number" class="form-control" required id="quantity" placeholder="###">
                            <label for="quantity">Quantity</label>
                            <div class="invalid-feedback">Provide Quantity</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="number" class="form-control" required id="Inv_id" placeholder="###">
                            <label for="Inv_id">Inventory ID</label>
                            <div class="invalid-feedback">Provide Iventory ID</div>
                        </div>
                    </div>
    
                    <div class="form-group begin-row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="dscrptn" required placeholder="description">
                            <label for="dscrptn">Description</label>
                            <div class="invalid-feedback">Provide Description</div>
                        </div>
    
                        <div class="form-floating">
                            <select class="form-select" id="unitselect" required aria-label="Floating label select example">
                              <option value="1">pcs</option>
                              <option value="2">gross</option>
                              <option value="3">sets</option>
                              <option value="4">pairs</option>
                              <option value="5">bottle</option>
                              <option value="6">can</option>
                            </select>
                            <label for="unitselect">Select unit</label>
                            <div class="invalid-feedback">Please select a unit</div>
                        </div>
                    </div>
    
                    <div class="form-group begin-row-2">
                        <div class="form-floating mb-4 price-container">
                            <input type="number" class="form-control price" required id="price" placeholder="###">
                            <label for="price">Price</label>
                            <div class="invalid-feedback">Provide a Price</div>
                        </div>
                    </div>
    
                    <div class="btn-container">
                        <button type="submit" class="btn btn-success col-4" >Save</button>
                    </div>
                </form>
            </div>
        </div>

        <section class="mb-5 table-sec">
            <div class="table-responsive-md rq-table mb-3">
                <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">Inventory #</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1014</td>
                    <td>CST Tube 22 X 1.75</td>
                    <td>50</td>
                    <td>pcs</td>
                    <td>₱104.00</td>
                    <td>₱5200.00</td>
                    </tr>

                    <tr>
                    <td>1016</td>
                    <td>CST Tire 700X25C</td>
                    <td>80</td>
                    <td>pairs</td>
                    <td>₱345.00</td>
                    <td>₱27600.00</td>
                    </tr>

                    <tr>
                    <td>1009</td>
                    <td>Freewheel 18T Kent</td>
                    <td>20</td>
                    <td>gross</td>
                    <td>₱51.00</td>
                    <td>₱1020.00</td>
                    </tr>

                </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#requestModal"><i class='bx bxs-send' style='color:#ffffff'></i>Request</button>
        </section>

        <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="exampleModalLabel">Do you want to send this request?</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-logo">
                        <img src="dashboard-icons/logo.png" alt="">
                    </div>

                    <div class="headings">
                        <h4>BikePro Bike Shop</h4>
                        <p>Babang II Rd, Lapu-Lapu City, Cebu</p>
                        <p>Phone: +63-927-981-5165</p>
                        <p>Email: clarkmollejon18@gmail.com</p>
                    </div>

                    <h3>Requisition Form</h3>

                    <div class="salutation">
                        <p>Requisition no. : 34110</p>
                        <p>Date created : 11/13/2023</p>
                        <p>Date required : 11/18/2023</p>
                    </div>

                    <div class="table-modal">
                        <div class="table-responsive-md mod-table mb-3">
                            <table class="table table-bordered table-hover table-striped table-secondary">
                                <thead>
                                    <tr>
                                    <th scope="col">Inventory #</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>1014</td>
                                    <td>CST Tube 22 X 1.75</td>
                                    <td>50</td>
                                    <td>pcs</td>
                                    <td>₱104.00</td>
                                    <td>₱5200.00</td>
                                    </tr>
                
                                    <tr>
                                    <td>1016</td>
                                    <td>CST Tire 700X25C</td>
                                    <td>80</td>
                                    <td>pairs</td>
                                    <td>₱345.00</td>
                                    <td>₱27600.00</td>
                                    </tr>
                
                                    <tr>
                                    <td>1009</td>
                                    <td>Freewheel 18T Kent</td>
                                    <td>20</td>
                                    <td>gross</td>
                                    <td>₱51.00</td>
                                    <td>₱1020.00</td>
                                    </tr>
                
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="closing">
                        <div class="req_by">
                            <p>Requested by:</p>
                            <span>Clark Mollejon</span>
                            <hr>
                        </div>
                        
                        <div class="req_by">
                            <p>Approved by:</p>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                  <button type="button" class="btn btn-success">Yes</button>
                </div>
              </div>
            </div>
        </div>
    </main>

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
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datepicker').datepicker({
                format: 'mm-dd-yyyy',
                startDate: new Date() // Set the startDate option to the current date
            });
        });

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