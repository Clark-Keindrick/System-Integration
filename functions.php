<?php
function register_user(){
    if(isset($_POST["register"])) {
        $firstname = filter_input(INPUT_POST,"fname", FILTER_SANITIZE_SPECIAL_CHARS);
        $firstname = trim($firstname);
        $firstname = ucwords($firstname);
        $lastname = filter_input(INPUT_POST,"lname", FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = trim($lastname);
        $lastname = ucwords($lastname);
        $contact = filter_input(INPUT_POST,"phnum", FILTER_SANITIZE_SPECIAL_CHARS);
        $contact = trim($contact);
        $dob = $_POST['bdate'];
        $bdate = date('Y-m-d', strtotime($dob));
        $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = trim($username);
        $branch = filter_input(INPUT_POST,"branch", FILTER_SANITIZE_SPECIAL_CHARS);
        $pwd = filter_input(INPUT_POST,"pword", FILTER_SANITIZE_SPECIAL_CHARS);
        $confirmpwd = filter_input(INPUT_POST,"confirmPword", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($firstname) || empty($lastname) || empty($contact) || empty($bdate) || empty($gender) || empty($username) || empty($pwd) || empty($confirmpwd) || empty($branch) || empty($_FILES['profpic'])){
            echo '<div class="alert alert-danger d-flex align-items-center reg-status" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    Something is Missing!
                 </div>';
        }
        else{
            $img_name = $_FILES['profpic']['name'];
            $img_size = $_FILES['profpic']['size'];
            $tmp_name = $_FILES['profpic']['tmp_name'];
            $error = $_FILES['profpic']['error'];
            
                if ($error === 0) {
                    if ($img_size > 1525000) {
                        echo '<div class="alert alert-danger d-flex align-items-center reg-status" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                Sorry, your file is too large.
                             </div>';
                    }else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $filename = pathinfo($img_name, PATHINFO_FILENAME);
            
                        $allowed_exs = array("jpg", "jpeg", "png"); 
            
                        if (in_array($img_ex_lc, $allowed_exs)) {
                            if($pwd == $confirmpwd){
                                $new_img_name = uniqid($filename." ", true).'.'.$img_ex_lc;
                                $img_upload_path = 'ProfilePics/'.$new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                                
                                $confirmpwd = password_hash($confirmpwd, PASSWORD_DEFAULT);
                                date_default_timezone_set('Asia/Manila');
                                $currentDate = new DateTime();
                                $date = $currentDate -> format("Y-m-d g:i:s");

                                try{
                                    include "database.php";
                                    
                                    $query = "INSERT INTO user_accounts (USER_FIRSTNAME, USER_LASTNAME, USER_GENDER, USERNAME, PASSWORD, USER_PIC, 
                                              USER_PHONENUM, USER_DOB, USER_BRANCH, CURRENT_LOGIN) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

                                    $stmt = $pdo->prepare($query);

                                    $stmt->execute([$firstname, $lastname, $gender, $username, $confirmpwd, $new_img_name, $contact, $bdate, $branch, $date]);

                                    $pdo = null;
                                    $stmt = null;

                                    echo '<div class="alert alert-success d-flex align-items-center reg-status" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                            Registered Successfully!
                                        </div>';

                                    echo '<script>setTimeout(function () { window.location.href = "login.php";}, 2000);</script>';

                                    die();

                                }
                                catch(PDOException $e){
                                    echo '<div class="alert alert-danger d-flex align-items-center reg-status" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            Query failed: '. $e->getMessage(). '
                                        </div>';
                                    die();
                                }
                            }
                            else {
                                echo '<div class="alert alert-danger d-flex align-items-center reg-status" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                          Sorry, Password did not match.
                                      </div>';
                            }

                        }else {
                            echo '<div class="alert alert-danger d-flex align-items-center reg-status" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      Sorry, You cant upload files of this type.
                                  </div>';
                        }
                    }
                }else {
                    echo '<div class="alert alert-danger d-flex align-items-center reg-status" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            unknown error occurred!
                         </div>';
                }
            }
        }
    else{
        echo "";
    }
}

function user_table(){
    try{
        include "database.php";
        
        $query = "SELECT * FROM user_accounts WHERE USER_STATUS = 'PENDING'";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        if(!empty($result)){
            ?>
             <table class="table table-hover table-striped text-center">
                <thead class="table-dark">
                <tr>
                    <th scope="col">FIRSTNAME</th>
                    <th scope="col">LASTNAME</th>
                    <th scope="col">DOB</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">GENDER</th>
                    <th scope="col">CONTACT</th>
                    <th scope="col">BRANCH</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
            <?php

            foreach($result as $row){
                echo '<tr >
                        <td>'.$row["USER_FIRSTNAME"].'</td>
                        <td>'.$row["USER_LASTNAME"].'</td>
                        <td>'.$row["USER_DOB"].'</td>
                        <td>'.$row["USERNAME"].'</td>
                        <td>'.$row["USER_GENDER"].'</td>
                        <td>'.$row["USER_PHONENUM"].'</td>
                        <td>'.$row["USER_BRANCH"].'</td>
                        <td>
                            <a href="actions/approve_user.php?user_id='.$row['USER_ID'].'"><i class="bx bx-check"></i></a> 
                            <a href="actions/denied_user.php?user_id='.$row['USER_ID'].'"><i class="bx bx-x"></i></a>
                        </td>
                     </tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
        else{
            echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div class="alert_label">
                        No pending accounts!
                    </div>
                </div>';
        }
        $pdo = null;
        $stmt = null;
    }
    catch(PDOException $e){
        echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div class="alert_label">
                         Query failed: '.$e->getMessage().'
                    </div>
                </div>';
    }
}

function user_count(){
    include "database.php";

    $query = "SELECT COUNT(*) AS total_count FROM user_accounts WHERE user_status = 'APPROVED'";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    $total = $result['total_count'];

    return $total;
}

function branch_count(){
    include "database.php";

    $query = "SELECT DISTINCT COUNT(DISTINCT user_branch) AS total_count FROM user_accounts WHERE user_branch <> 'ADMIN'";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    $total = $result['total_count'];

    return $total;
}

function supplier_data($supcode){
    include "../database.php";
    
    $query = "SELECT * FROM supplier WHERE SUP_CODE = :supcode";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":supcode", $supcode);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    return $result;
}

function items_data($itemID){
    include "../database.php";
    
    $query = "SELECT * FROM inventory WHERE INV_ID = :invid";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":invid", $itemID);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    return $result;
}

function user_data($session_name){
    include "database.php";

    $query = "SELECT * FROM user_accounts WHERE USERNAME = :uname";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":uname", $session_name);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    return $result;
}

function view_users(){
    try{
        include "database.php";
        
        $query = "SELECT * FROM user_accounts WHERE USER_STATUS = 'APPROVED'";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        if(!empty($result)){
            foreach($result as $row){ 
                echo '<div class="col img-container">
                        <div class="card h-100">
                            <img src="../ProfilePics/'.$row["USER_PIC"].'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title mb-3">'.$row["USER_FIRSTNAME"] ." ". $row["USER_LASTNAME"].'</h5>
                                <div class="description mb-2">
                                    <div class="card-container1"><p class="card-text"><b>User: </b>'.$row["USERNAME"].'</p></div>
                                    <div class="card-container"><p class="card-text"><b>Pass: </b>!^%*&=-)$#(@</p></div>
                                </div>
                                <div class="description mb-2">
                                    <div class="card-container1"><p class="card-text"><b>Contact:</b>'.$row["USER_PHONENUM"].'</p></div>
                                    <div class="card-container"><p class="card-text"><b>Birthdate:</b>'.$row["USER_DOB"].'</p></div>
                                </div>
                                <div class="description">
                                    <div class="card-container1"><p class="card-text"><b>Branch:</b>'.$row["USER_BRANCH"].'</p></div>
                                    <div class="card-container"><p class="card-text"><b>Status:</b>'.$row["USER_STATUS"].'</p></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">USER ID: '.$row["USER_ID"].'</small>
                                <div><a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bx bxs-trash" style="color:#ff0003"></i></a></div>
                            </div>
                        </div>
                    </div>';
            }

        }
        else{
            echo '<div class="alert alert-primary d-flex align-items-center user_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div class="alert_label">
                        No users available!
                    </div>
                </div>';
        }
        $pdo = null;
        $stmt = null;
    }
    catch(PDOException $e){
        echo '<div class="alert alert-primary d-flex align-items-center user_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div class="alert_label">
                        Query failed: '.$e->getMessage().' 
                    </div>
                </div>';
    }
}

function update_photo($session_name){
    if (isset($_POST['update_pic']) && isset($_FILES['profilePhoto'])) {
        $img_name = $_FILES['profilePhoto']['name'];
        $img_size = $_FILES['profilePhoto']['size'];
        $tmp_name = $_FILES['profilePhoto']['tmp_name'];
        $error = $_FILES['profilePhoto']['error'];
    
        if ($error === 0) {
            if ($img_size > 1525000) {
                echo '<div class="alert alert-danger d-flex align-items-center profile_alert" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div class="alert_label">
                                Sorry, your file is too large.
                        </div>
                    </div>';
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $filename = pathinfo($img_name, PATHINFO_FILENAME);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid($filename." ", true).'.'.$img_ex_lc;
                    $img_upload_path = '../ProfilePics/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    try{
                        include "database.php";

                        $query = "UPDATE user_accounts SET USER_PIC = :newpic WHERE USERNAME = :username;";
    
                        $stmt = $pdo->prepare($query);

                        $stmt->bindParam(":newpic", $new_img_name);
                        $stmt->bindParam(":username", $session_name);
                
                        $stmt->execute();

                        echo '<script>setTimeout(function () { window.location.href = "prof-pic.php";}, 500);</script>';


                    }
                    catch(PDOException $e){
                        echo '<div class="alert alert-danger d-flex align-items-center profile_alert" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div class="alert_label">
                                    Query failed: '.$e->getMessage().'
                                </div>
                            </div>';
                    }

                }else {
                    echo '<div class="alert alert-danger d-flex align-items-center profile_alert" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div class="alert_label">
                                You cant upload files of this type
                            </div>
                        </div>';
                }
            }
        }else {
            echo '<div class="alert alert-danger d-flex align-items-center profile_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="alert_label">
                        Unknown error occurred!
                    </div>
                </div>';
        }
            
    }
}


function change_security($verifypass, $userID){
    if(isset($_POST["changeSecurity"])) {
        $profUname = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $profUname = trim($profUname);
        $oldpass = filter_input(INPUT_POST,"oldpass", FILTER_SANITIZE_SPECIAL_CHARS);
        $newpass = filter_input(INPUT_POST,"newpass", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($profUname) ||  empty($oldpass) || empty($newpass)){
            echo '<div class="alert alert-danger d-flex align-items-center profile_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="alert_label">
                        Something is missing!
                    </div>
                </div> ';
        }
        else{
            if(password_verify($oldpass,  $verifypass)){
                if(password_verify($newpass,  $verifypass))
                {
                    echo '<div class="alert alert-danger d-flex align-items-center profile_alert" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div class="alert_label">
                                Your new password is still the same with your old password!
                            </div>
                        </div> ';
                }

                else{
                    $newpword = password_hash($newpass, PASSWORD_DEFAULT);
                    try{
                        include "../database.php";
                        
                        $query = "UPDATE user_accounts SET USERNAME = :uname, PASSWORD = :pword WHERE USER_ID = :userID";
                
                        $stmt = $pdo->prepare($query);
                        
                        $stmt->bindParam(":uname", $profUname);
                        $stmt->bindParam(":pword", $newpword);
                        $stmt->bindParam(":userID", $userID);
                
                        $stmt->execute();

                        unset($_SESSION['username']);
                        $_SESSION["username"] = $profUname;
                
                        echo '<script>setTimeout(function () { window.location.href = "dashboard.php";}, 500);</script>';
                
                        $pdo = null;
                        $stmt = null;
                    }
                    catch(PDOException $e){
                        echo '<div class="alert alert-danger d-flex align-items-center profile_alert" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div class="alert_label">
                                     Query failed: '.$e->getMessage().'
                                </div>
                            </div> ';
                    }
                }
            }
            else{
                echo '<div class="alert alert-danger d-flex align-items-center profile_alert" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div class="alert_label">
                            Wrong Password!
                        </div>
                    </div> ';
            }
        }
    }
}

function change_user_info($userID){
    if(isset($_POST["changeInfo"])) {
        $profileFname = filter_input(INPUT_POST,"newfname", FILTER_SANITIZE_SPECIAL_CHARS);
        $profileFname = trim($profileFname);
        $profileFname = ucwords($profileFname);
        $profileLname = filter_input(INPUT_POST,"newlname", FILTER_SANITIZE_SPECIAL_CHARS);
        $profileLname = trim($profileLname);
        $profileLname = ucwords($profileLname);
        $profphnum = filter_input(INPUT_POST,"newphnum", FILTER_SANITIZE_SPECIAL_CHARS);
        $profphnum = trim($profphnum );

        if(empty($profileFname) || empty($profileLname) || empty($profphnum)){
            echo '<div class="alert alert-danger d-flex align-items-center profile_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="alert_label">
                        Something is missing!
                    </div>
                </div> ';
        }
        else{
            try{
                include "../database.php";
                
                $query = "UPDATE user_accounts SET USER_FIRSTNAME = :profname, USER_LASTNAME = :proflname, USER_PHONENUM = :phnumber WHERE USER_ID = :userID";
        
                $stmt = $pdo->prepare($query);
                
                $stmt->bindParam(":profname", $profileFname);
                $stmt->bindParam(":proflname", $profileLname);
                $stmt->bindParam(":phnumber", $profphnum);
                $stmt->bindParam(":userID", $userID);
        
                $stmt->execute();
        
                echo '<script>setTimeout(function () { window.location.href = "dashboard.php";}, 500);</script>';
        
                $pdo = null;
                $stmt = null;
            }
            catch(PDOException $e){
                echo '<div class="alert alert-danger d-flex align-items-center profile_alert" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div class="alert_label">
                                Query failed: '.$e->getMessage().'
                        </div>
                    </div> ';
            }
        }
    }
}


function add_supplier(){
    if(isset($_POST["add_sup"])) {
        $supName = filter_input(INPUT_POST,"supName", FILTER_SANITIZE_SPECIAL_CHARS);
        $supName = trim($supName);
        $supName = ucwords($supName);
        $supCompany = $_POST["supCompany"];
        $supCompany = trim($supCompany);
        $supCompany = ucwords($supCompany);
        $supAddress = filter_input(INPUT_POST,"supAdrs", FILTER_SANITIZE_SPECIAL_CHARS);
        $supAddress = trim($supAddress);
        $supAddress = ucwords($supAddress);
        $supContact = filter_input(INPUT_POST,"supPhnum", FILTER_SANITIZE_SPECIAL_CHARS);
        $supContact = trim($supContact);
        $supEmail = $_POST["emailAD"];
        $supEmail = trim($supEmail);


        if(empty($supName) || empty($supCompany) || empty($supAddress)){
            echo '<div class="alert alert2 alert-danger d-flex align-items-center profile_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="alert_label">
                        Something is missing !
                    </div>
                </div> ';
        }
        else{
            if(filter_var($supEmail, FILTER_VALIDATE_EMAIL))
            {
                try{
                    include "../database.php";
                    
                    $query = "INSERT INTO supplier (SUP_NAME, COMPANY, SUP_ADDRESS, SUP_CONTACT, SUP_EMAIL) VALUES (?, ?, ?, ?, ?);";
    
                    $stmt = $pdo->prepare($query);
    
                    $stmt->execute([$supName, $supCompany, $supAddress, $supContact, $supEmail]);
            
                    echo '<script>setTimeout(function () { window.location.href = "supplier.php";}, 600);</script>';
            
                    $pdo = null;
                    $stmt = null;
    
                    die();
                }
                catch(PDOException $e){
                    echo '<div class="alert alert2 alert-danger d-flex align-items-center profile_alert" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div class="alert_label">
                                    Query failed: '.$e->getMessage().'
                            </div>
                        </div> ';
                }
            }
            else{
                echo '<div class="alert alert2 alert-danger d-flex align-items-center profile_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="alert_label">
                        CHECK EMAIL OR PHONE NUMBER
                    </div>
                </div> ';
            }
        }
    }
}


function supplier_table(){
    try{
        include "../database.php";
        
        $query = "SELECT * FROM supplier WHERE SUP_ACTIVE = 1";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        if(!empty($result)){
            ?>
             <table class="table text-center table-bordered border-dark">
                <thead>
                    <tr>
                        <th scope="col">SUPPLIER CODE</th>
                        <th scope="col">NAME</th>
                        <th scope="col">COMPANY</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">CONTACT</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
            <?php

            foreach($result as $row){
                echo '<tr >
                        <td>'.$row["SUP_CODE"].'</td>
                        <td>'.$row["SUP_NAME"].'</td>
                        <td>'.$row["COMPANY"].'</td>
                        <td>'.$row["SUP_ADDRESS"].'</td>
                        <td>'.$row["SUP_CONTACT"].'</td>
                        <td>'.$row["SUP_EMAIL"].'</td>
                        <td>
                            <a href="supplier.php?supCode='.$row['SUP_CODE'].'"><i class="bx bxs-edit" style="color:#06c700"></i></a>
                            <a href="actions/remove_supplier.php?supCode='.$row['SUP_CODE'].'" ><i class="bx bxs-trash" style="color:#fb0000"></i></a>
                        </td>
                     </tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
        else{
            echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div class="alert_label">
                        No Supplier Available!
                    </div>
                </div>';
        }
        $pdo = null;
        $stmt = null;
    }
    catch(PDOException $e){
        echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div class="alert_label">
                         Query failed: '.$e->getMessage().'
                    </div>
                </div>';
    }
}

function update_supplier($supcode){
    if(isset($_POST["update_sup"])) {
        $supName = filter_input(INPUT_POST,"supName", FILTER_SANITIZE_SPECIAL_CHARS);
        $supName = trim($supName);
        $supName = ucwords($supName);
        $supCompany = $_POST["supCompany"];
        $supCompany = trim($supCompany);
        $supCompany = ucwords($supCompany);
        $supAddress = filter_input(INPUT_POST,"supAdrs", FILTER_SANITIZE_SPECIAL_CHARS);
        $supAddress = trim($supAddress);
        $supAddress = ucwords($supAddress);
        $supContact = filter_input(INPUT_POST,"supPhnum", FILTER_SANITIZE_SPECIAL_CHARS);
        $supContact = trim($supContact);
        $supEmail = $_POST["emailAD"];
        $supEmail = trim($supEmail);


        if(empty($supName) || empty($supCompany) || empty($supAddress)){
            echo '<div class="alert alert2 alert-danger d-flex align-items-center profile_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="alert_label">
                        Something is missing !
                    </div>
                </div> ';
        }
        else{
            if(filter_var($supEmail, FILTER_VALIDATE_EMAIL))
            {
                try{
                    include "../database.php";
                    
                    $query = "UPDATE supplier SET SUP_NAME = :supname, COMPANY = :company, SUP_ADDRESS = :supadrs, SUP_CONTACT = :supphnum, SUP_EMAIL = :supemail WHERE SUP_CODE = :supcode";
        
                    $stmt = $pdo->prepare($query);
                    
                    $stmt->bindParam(":supname", $supName);
                    $stmt->bindParam(":company", $supCompany);
                    $stmt->bindParam(":supadrs", $supAddress);
                    $stmt->bindParam(":supphnum", $supContact);
                    $stmt->bindParam(":supemail", $supEmail);
                    $stmt->bindParam(":supcode", $supcode);

                    $stmt->execute();
            
                    echo '<script>setTimeout(function () { window.location.href = "supplier.php";}, 600);</script>';
            
                    $pdo = null;
                    $stmt = null;
    
                    die();
                }
                catch(PDOException $e){
                    echo '<div class="alert alert2  alert-danger d-flex align-items-center profile_alert" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div class="alert_label">
                                    Query failed: '.$e->getMessage().'
                            </div>
                        </div> ';
                }
            }
            else{
                echo '<div class="alert alert2  alert-danger d-flex align-items-center profile_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="alert_label">
                        Invalid email address !
                    </div>
                </div> ';
            }
        }
    }
}


function add_inventory(){
    if(isset($_POST["add_item"])) {
        $description = filter_input(INPUT_POST, "inv_desc", FILTER_SANITIZE_SPECIAL_CHARS);
        $description = trim($description);
        $quantity = filter_input(INPUT_POST,"inv_qnty", FILTER_SANITIZE_NUMBER_INT);
        $quantity = trim($quantity);
        $unit = filter_input(INPUT_POST, "inv_unit", FILTER_SANITIZE_SPECIAL_CHARS);
        $unit = trim($unit);
        $price = filter_input(INPUT_POST, "inv_price", FILTER_VALIDATE_FLOAT);
        $price = trim($price);
        $supplierCode = filter_input(INPUT_POST,"inv_sup_code", FILTER_SANITIZE_NUMBER_INT);
        $supplierCode = trim($supplierCode);
        $staffID = filter_input(INPUT_POST,"inv_user_id", FILTER_SANITIZE_NUMBER_INT);
        $staffID = trim($staffID);

        if(empty($description) || empty($quantity) || empty($unit) || empty($price) || empty($supplierCode) || empty($staffID) || empty($_FILES['inv_pic'])){
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        SOMETHING IS MISSING!
                </div>';
        }else{
            $img_name = $_FILES['inv_pic']['name'];
            $img_size = $_FILES['inv_pic']['size'];
            $tmp_name = $_FILES['inv_pic']['tmp_name'];
            $error = $_FILES['inv_pic']['error'];
            
                if ($error === 0) {
                    if ($img_size > 2525000) {
                        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    File is too large!
                            </div>';
                    }else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $filename = pathinfo($img_name, PATHINFO_FILENAME);
            
                        $allowed_exs = array("jpg", "jpeg", "png"); 
            
                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid($filename." ", true).'.'.$img_ex_lc;
                            $img_upload_path = '../Inventory_Pic/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);
                            
                            date_default_timezone_set('Asia/Manila');
                            $currentDate = new DateTime();
                            $date = $currentDate -> format('Y-m-d');

                            try{
                                include "database.php";
                                
                                $query = "INSERT INTO inventory (INV_DESCRIPTION, INV_PIC, INV_INDATE, INV_QOH, INV_UNIT, INV_PRICE, SUP_CODE, USER_ID)
                                          VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

                                $stmt = $pdo->prepare($query);

                                $stmt->execute([$description, $new_img_name, $date, $quantity, $unit, $price, $supplierCode, $staffID]);

                                $pdo = null;
                                $stmt = null;

                                echo '<div class="alert alert-success d-flex align-items-center reg-status" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                            Saved Successfully!
                                      </div>';

                                echo '<script>setTimeout(function () { window.location.href = "add_inventory.php";}, 600);</script>';

                                die();
                            }
                            catch(PDOException $e){
                                echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                               Query failed: '.$e->getMessage().'
                                        </div>';
                            }

                        }else {
                            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            Sorry, you cant upload this type of file
                                    </div>';
                        }
                    }
                }else {
                    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    unknown error occurred!
                            </div>';
                }
            }
        }
    else{
        echo "";
    }
}

function total_items(){
    include "database.php";

    $query = "SELECT COUNT(*) as total_count FROM INVENTORY, USER_ACCOUNTS 
    WHERE (USER_ACCOUNTS.USER_ID = INVENTORY.USER_ID) AND INV_ACTIVE = 1";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

    $total = $result['total_count'];

    return $total;
}

function inventory_item($userID){
    try{
        include "../database.php";
        
        $query = "SELECT * FROM inventory, user_accounts WHERE (user_accounts.user_branch = 'LLC' AND user_accounts.user_id = inventory.user_id) and INV_ACTIVE = 1";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        if(!empty($result)){
            foreach($result as $row){ 
                if($row["INV_QOH"] > 0  && $row["INV_QOH"] <= 8){
                    $border = 'border-warning';
                }
                else if($row["INV_QOH"] == 0){
                    $border = 'border-danger';
                }
                else{
                    $border = 'border-success';
                }

                $query = "SELECT * FROM user_accounts WHERE USER_ID = :userID";

                $stmt = $pdo->prepare($query);

                $stmt->bindParam(":userID", $userID);

                $stmt->execute();

                $actions = $stmt->fetch(PDO::FETCH_ASSOC);

                if($actions["USER_BRANCH"] == "ADMIN"){
                    $viewAction = '<a href="edit_item.php?invID='.$row['INV_ID'].'"><i class="bx bxs-edit" style="color:#06c700"></i></a>';
                    $viewAction2 = ' <a href="actions/remove_item.php?invID='.$row['INV_ID'].'"><i class="bx bxs-trash bxs-trash2" style="color:#ff0003"></i></a>';
                }
                else{
                    $viewAction = '';
                    $viewAction2 = '';
                }

                echo '<div class="card '.$border.' bg-light border-3" style="width: 20rem;">
                        <div class="card-header bg-transparent border-success"> 
                            '.$viewAction.'
                            <p>'.$row["INV_DESCRIPTION"].'</p>
                            '.$viewAction2.'
                        </div>
                        <img src="../Inventory_Pic/'.$row["INV_PIC"].'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="first-row">
                                <p class="card-text">ID: <span>'.$row["INV_ID"].'</span></p>
                                <p class="card-text">Unit: <span>'.$row["INV_UNIT"].'</span></p>
                            </div>
                            <div class="second-row">
                                <p class="card-text">Price: <span>&#8369;'.$row["INV_PRICE"].'</span></p>
                                <p class="card-text">Stocks: <span>'.$row["INV_QOH"].'</span></p>
                            </div>
                            <div class="third-row">
                                <p class="card-text">Supplier: <span>'.$row["SUP_CODE"].'</span></p>
                                <p class="card-text">Updated: <span>'.$row["INV_INDATE"].'</span></p>
                            </div>
                        </div>
                      </div>';
            }

        }
        else{
            echo '<div class="alert alert-primary d-flex align-items-center user_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div class="alert_label">
                        INVENTORY IS EMPTY!
                    </div>
                </div>';
        }
        $pdo = null;
        $stmt = null;
    }
    catch(PDOException $e){
        echo '<div class="alert alert-primary d-flex align-items-center user_alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div class="alert_label">
                        Query failed: '.$e->getMessage().' 
                    </div>
                </div>';
    }
}


function update_inventory($itemsID){
    if(isset($_POST["updateItem"])) {
        $description = filter_input(INPUT_POST, "updateName", FILTER_SANITIZE_SPECIAL_CHARS);
        $description = trim($description);
        $quantity = filter_input(INPUT_POST,"updateQOH", FILTER_SANITIZE_NUMBER_INT);
        $quantity = trim($quantity);
        $unit = filter_input(INPUT_POST, "updateUnit", FILTER_SANITIZE_SPECIAL_CHARS);
        $unit = trim($unit);
        $price = filter_input(INPUT_POST, "updatePrice", FILTER_VALIDATE_FLOAT);
        $price = trim($price);
        $supplierCode = filter_input(INPUT_POST,"updateSupcode", FILTER_SANITIZE_NUMBER_INT);
        $supplierCode = trim($supplierCode);

        if(empty($description) || empty($quantity) || empty($unit) || empty($price) || empty($supplierCode)){
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        SOMETHING IS MISSING!
                </div>';
        }else{              
            date_default_timezone_set('Asia/Manila');
            $currentDate = new DateTime();
            $date = $currentDate -> format('Y-m-d');

            try{
                include "database.php";
                
                $query = "UPDATE INVENTORY SET INV_DESCRIPTION = :invdesc, INV_QOH = :invqoh, INV_UNIT = :invunit, INV_PRICE = :invprice,
                SUP_CODE = :supcode, INV_INDATE = :indate WHERE INV_ID = :invid";

                $stmt = $pdo->prepare($query);
                
                $stmt->bindParam(":invdesc", $description);
                $stmt->bindParam(":invqoh", $quantity);
                $stmt->bindParam(":invunit", $unit);
                $stmt->bindParam(":invprice", $price, PDO::PARAM_STR);
                $stmt->bindParam(":supcode", $supplierCode);
                $stmt->bindParam(":indate", $date);
                $stmt->bindParam(":invid", $itemsID);

                $stmt->execute();

                echo '<div class="alert alert-success d-flex align-items-center reg-status" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    Updated Successfully!
                </div>';

                echo '<script>setTimeout(function () { window.location.href = "LLCInventory.php";}, 600);</script>';
        
                $pdo = null;
                $stmt = null;

                die();
            }
            catch(PDOException $e){
                echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                Query failed: '.$e->getMessage().'
                        </div>';
            }

          }
        }
    else{
        echo "";
    }
}