<?php 
    include_once("connection.php"); 
    $time = '';
    $verified = 0;

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];

        //FETCHING THE USER'S NAME AND ROLE
        $userInfo = mysqli_query($con,  "SELECT * FROM tbl_users WHERE id = '$sessId'");
        $fetchInfo = mysqli_fetch_assoc($userInfo);
        $fname = $fetchInfo["first_name"];
        $lname = $fetchInfo["last_name"];
        $id   = $fetchInfo["id"];
        $verified   = $fetchInfo["verified"];

    }
    //FETCHING THE SELECTED SERVICE
    $service_id = $_GET["serveid"];
    
    //SELECT QUERY FOR THE SELECTED SERVICE
    $execQuery = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE id = '$service_id'");
    $fetchService = mysqli_fetch_assoc($execQuery);
    $selected_id = $fetchService["id"];
    $kraftsman_id = $fetchService["user_id"];
    $category_id = $fetchService["category_id"];
    $price = $fetchService["price"];
    $picture = $fetchService["service_picture"];

    $execQuery2 = mysqli_query($con, "SELECT * FROM tbl_services WHERE id = '$service_id'");
    $fetchServiceName = mysqli_fetch_assoc($execQuery2);
    $service_name = $fetchServiceName["service_name"];

    if($category_id == 1){
        $cat = "../images/hair/";
    } else if($category_id == 2){
        $cat = "../images/nail/";
    } else if($category_id == 3){
        $cat = "../images/spa/";
    }

    $execQuery3 = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$kraftsman_id'");
    $fetchKraftsman = mysqli_fetch_assoc($execQuery3);
    $kfname = $fetchKraftsman["first_name"];
    $klname = $fetchKraftsman["last_name"];
    $dp = $fetchKraftsman["profile_picture"];
    $joined = $fetchKraftsman["created_at"];

    //COUNT ALL SERVICES OFFERED BY THE KRAFTSMAN
    $execQuery4 = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE user_id = '$kraftsman_id'");
    $countServices = mysqli_num_rows($execQuery4);

    //FETCH ALL THE DATA IN TBL_TIME
    $listOfTimes = mysqli_query($con, "SELECT * FROM tbl_time");
    while($row = mysqli_fetch_assoc($listOfTimes)){
        $time .= "<option value='" . $row["id"] . "'>" . $row['time'] . "</option>";
    }

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        //FOR BUTTON FAVORITE
        $selectQuery1 = mysqli_query($con, "SELECT * FROM tbl_favorites WHERE kraftsman_id = '$selected_id' AND klient_id = '$sessId'");
        $numOfRows = mysqli_num_rows($selectQuery1);
        if($numOfRows > 0){
            $addedFave = "<i class='fa fa-heart'></i> Added";
        } else {
            $addedFave = "<i class='fa fa-heart-o'></i> Add to Favorites";
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
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ranga&display=swap" rel="stylesheet">
    <title>Jentle Kare</title>
</head>
<body>
    <?php include_once("navbar.php"); ?>
    <div class="right">
        <!--ALERT MESSAGE-->
        <?php include_once("msg.php"); ?>

        <div class="w3-container chosen-service-container">
            <div class="selected-card">
                <?php 
                    $disabled = 'disabled=disabled';
                    if($verified)
                    {
                        $disabled = '';
                    }

                    echo'
                        <div class="card service-template">
                            <div class="service-left-section">
                                <img src="'; echo $cat . $picture; echo'">
                            </div>
                            <div class="service-right-section">
                                <h3>'; echo $service_name; echo'</h3>
                                <h1 class="price">'; echo $price; echo'</h1>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit dolor consequuntur beatae commodi omnis quia aperiam magni odit incidunt culpa!</p>
                                <div class="two-buttons">';
                                if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
                                    echo '<form method="POST" action="favorites.php?serveid='; echo $service_id; echo'"><button type="submit" name="fave" id="fave">'; echo $addedFave; echo'</button></form>';
                                }
                                    echo '<button type="button" ';echo $disabled; echo' class="btnBook" data-toggle="modal" data-target="#myModal"><i class="fa fa-calendar"></i> Book an Appointment</button>
                                </div>
                            </div>
                        </div>

                        <div class="profile-laborer">
                            <div>';
                                if($dp == 'user.png'){
                                    echo"
                                        <img src='../uploads/display_picture/$dp' alt='Display Profile'>
                                    ";
                                } else{
                                    echo"
                                        <img src='../uploads/display_picture/$kraftsman_id/$dp' alt='Display Profile'>
                                    ";
                                } echo'
                            </div>
                            <div>
                                <p>Kraftsman:'; echo $kfname . " " . $klname; echo'</p>
                                <button class="btn1"><i class="fa fa-comments"></i> Chat Now</button>
                                <button class="btn2"><i class="fa fa-user-circle"></i> <a href="profile-page.php?id='; echo $kraftsman_id; echo'">View Profile</a></button>
                            </div>
                            <div class="profile-laborer-sidedish">
                                <p><b>Ratings:</b> 100</p>
                                <p><b>Response Rate:</b> 86%</p>
                                <p><b>Joined:</b>'; echo $joined; echo'</p>
                                <p><b>Services:</b>'; echo $countServices; echo'</p>
                                <p><b>Response Time:</b> within hours</p>
                                <p><b>Followers:</b> 1.6K</p>
                            </div>
                        </div>
                    ';
                    include_once("feedbacks.php");
                ?>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <form action="handle-book.php" method="POST" class="needs-validation" novalidate>
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Book An Appointment</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form-group fg">
                                    <input type="date" name="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group fg">
                                    <select name="time" id="time" class="custom-select" required>
                                        <?php echo $time; ?>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>

                                <input type="hidden" name="kraftsman_id" value="<?php echo $kraftsman_id; ?>">
                                <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
                            </div>
                        
                            <!-- Modal footer -->
                            <div class="modal-footer input-book">
                                <input type="submit" value="Book an Appointment">
                            </div>
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