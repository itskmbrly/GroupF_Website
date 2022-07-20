<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");
    $roles = '';

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];
        
        //GET ID
        $id = $_GET["id"];

        //FETCHING ALL THE INFORMATION OF THE USER TO DISPLAY
        $execQuery = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$id'");

        $fetchInfo = mysqli_fetch_assoc($execQuery);
        $fname     = $fetchInfo["first_name"];
        $lname     = $fetchInfo["last_name"];
        $email     = $fetchInfo["email"];
        $password  = $fetchInfo["password"];
        $mobile_no = $fetchInfo["mobile_no"];
        $sex_id    = $fetchInfo["sex"];
        $birthdate = $fetchInfo["birthdate"];
        $address_id= $fetchInfo["address_id"];
        $role_id   = $fetchInfo["role_id"]; 
        $joined    = $fetchInfo["created_at"];
        $dp        = $fetchInfo["profile_picture"];

        //If accessing a different account

        //FETCHING THE LIST OF ROLES 
        $execQuery = mysqli_query($con, "SELECT * FROM tbl_role_types WHERE id NOT IN(3, 4)");
        while ($row = mysqli_fetch_assoc($execQuery)) {
            $roles .= "<option value='" . $row["id"] . "'>" . $row['role_type'] . "</option>";
        }

        if($_SESSION["sess-role"] == 1){
            //IF KRAFTSMAN; COUNT ALL THE SERVICES THEY OFFERED
            $countServices = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE user_id = '$id'");
            $cs = mysqli_num_rows($countServices);
        } else if($_SESSION["sess-role"] == 2){        
            //IF KLIENT; COUNT ALL THE APPOINTMENTS THEY BOOKED
            $countAppointments = mysqli_query($con, "SELECT * FROM tbl_transactions WHERE klient_id='$id'");
            $ca = mysqli_num_rows($countAppointments);
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--W3 School-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--CSS FILE-->
    <link rel="stylesheet" href="../css/style.css">    
    <!--Shortcut Icon of Jentle Kare-->
    <link rel="shortcut icon" href="../images/icon/JK.png">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <title>Jentle Kare</title>
</head>
<body>  
    <?php include_once("navbar.php"); ?>
    <div class="right">
        <!--ALERT MESSAGE-->
        <?php include_once("msg.php"); ?>

        <div class="w3-container pp-container">
            <?php
                if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
                    echo"
                        <div class='profile-grid'>
                            <div class='dp'>
                                <img src='../uploads/display_picture/$id/$dp' alt='Display Profile'><br>
                                <b>$fname $lname</b>
                            </div>
                        </div>
                    ";
                }
            ?>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <?php
                        if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
                            if($_SESSION["sess-role"] == 1 || $sessId != $id){
                                echo"
                                    <a class='nav-link active' data-toggle='tab' href='#home'>Services</a>
                                ";
                            } else if($_SESSION["sess-role"] == 2){
                                echo"
                                    <a class='nav-link active' data-toggle='tab' href='#home'>Appointments</a>
                                ";
                            } else if($_SESSION["sess-role"] == 3 || $_SESSION["sess-role"] == 4){
                                echo"
                                    <a class='nav-link active' data-toggle='tab' href='#home'>Edit Profile</a>
                                ";
                            }
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
                            if($_SESSION["sess-role"] == 1){
                                echo"
                                    <a class='nav-link' data-toggle='tab' href='#menu1'>Appointments</a>
                                ";
                            } else if($_SESSION["sess-role"] == 2 && $sessId == $id){
                                echo"
                                    <a class='nav-link' data-toggle='tab' href='#menu1'>Favorites</a>
                                ";
                            } 
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
                            if($_SESSION["sess-role"] == 1){
                                echo"
                                    <a class='nav-link' data-toggle='tab' href='#menu3'>Edit Profile<</a>
                                ";
                            } else if($_SESSION["sess-role"] == 2 && $sessId == $id){
                                echo"
                                    <a class='nav-link' data-toggle='tab' href='#menu2'>Edit Profile</a>
                                ";
                            } 
                        }
                    ?>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <?php
                        if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
                            if($_SESSION["sess-role"] == 1 || $sessId != $id){
                                echo"
                                    <h2>Services</h2>
                                ";
                                include_once("list_services.php");
                            } else if($_SESSION["sess-role"] == 2 && $sessId == $id){
                                echo"
                                    <h2>Appointments</h2>
                                ";
                                include_once('appointments.php');
                            } else if($_SESSION["sess-role"] == 3 || $_SESSION["sess-role"] == 4){
                                echo"
                                    <h2>Edit Profile</h2>
                                    <button type='button' class='btn btnChangePass' data-toggle='modal' data-target='#myModal'>
                                        Change Password
                                    </button>
                                ";
                                include_once('edit-profile.php');
                            }
                        }
                    ?>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                    <?php
                        if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
                            if($_SESSION["sess-role"] == 1){
                                echo"
                                    <h2>Appointments</h2>
                                ";
                                include_once('appointments.php');
                            } else if($_SESSION["sess-role"] == 2){
                                echo"
                                    <h2>Favorites</h2>
                                ";
                                include_once('favorites.php');
                            } 
                        }
                    ?>
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                    <?php
                        if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
                            if($_SESSION["sess-role"] == 1){
                                echo"
                                    <h2>Edit Profile</h2>
                                    <button type='button' class='btn btnChangePass' data-toggle='modal' data-target='#myModal'>
                                        Change Password
                                    </button>
                                ";
                                include_once('edit-profile.php');
                            } else if($_SESSION["sess-role"] == 2){
                                echo"
                                    <h2>Edit Profile</h2>
                                    <button type='button' class='btn btnChangePass' data-toggle='modal' data-target='#myModal'>
                                        Change Password
                                    </button>
                                ";
                                include_once('edit-profile.php');
                            } 
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Change Password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="handle-change-pass.php" method="POST" class="needs-validation" novalidate>
                            <div class="form-group fg">
                                <input type="password" name="oldpass" placeholder="Enter Old Password" class="form-control" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="form-group">
                                    <input type="password" name="passnew1" min="8" placeholder="Enter New Password" class="form-control" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="passnew2" min="8" placeholder="Confirm New Password" class="form-control" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                            <input type="submit" value="Submit">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
     // Disable form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
</script>
</html>