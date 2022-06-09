<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];
    }

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
    //FETCHING THE LIST OF CATEGORIES
    $categories = '';
    $listOfCategories = mysqli_query($con, "SELECT * FROM tbl_category");
    while($row5 = mysqli_fetch_assoc($listOfCategories)){
        $categories .= "<option value='" . $row5["id"] . "'>" . $row5['name'] . "</option>";
    }

    //FETHING THE LIST OF SERVICES
    $services = '';
    $listOfServices = mysqli_query($con, "SELECT * FROM tbl_services");
    while($row1 = mysqli_fetch_assoc($listOfServices)){
        $services .= "<option value='" . $row1["id"] . "'>" . $row1['service_name'] . "</option>";
    }

    //COUNT THE SERVICES OFFERED BY THE LABOURER
    $service_count = mysqli_query($con, "SELECT COUNT(service_name) FROM tbl_kraftsman WHERE user_id = '$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--W3 School-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Shortcut Icon of Jentle Kare-->
    <link rel="shortcut icon" href="../images/JK.png">
    <!--CSS File-->
    <link rel="stylesheet" href="../css/styles.css">
    <title>Jentle Kare | Profile</title>
</head>
<body>
    <!--SIDE NAVIGATION BAR-->
    <?php include_once("navbar.php"); ?>
    <div style="margin-left:20%; ">
        <!--ALERT MESSAGE-->
        <?php include_once("msg.php"); ?>
        <div class="w3-container body">
            <div class="container-fluid mt-3">
                <div class='row'>
                    <div class='col-sm-4 dp'>
                        <img src='../images/<?php echo $dp; ?>'>
                        <p><?php echo $fname. " "; echo $lname; ?></p>
                    </div>
                    <div class='col-sm-8'>
                        <div class='labourer-deets'>
                            <p><i class='fa fa-archive'></i><b> Services: </b></p>
                            <p><i class='fa fa-star'></i><b> Rating: </b></p>
                            <p><i class='fa fa-user-circle'></i><b> Joined: </b> <?php echo $joined; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Services')" id="defaultOpen">Services</button>
                <button class="tablinks" onclick="openTab(event, 'Feedback')">Feedback</button>
                <button class="tablinks" onclick="openTab(event, 'EditProfile')">Edit Profile</button>
            </div>

            <div id="Services" class="tabcontent">
                <button type='button' class='btn btn-Admin' data-bs-toggle='modal' data-bs-target='#myModal1'><a href="#">Create Service</a></button>
                <div class="display-services">
                    <?php
                        //FETCHING ALL THE SERVICES OFFERED BY THE KRAFTSMAN
                        $execQuery2 = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE user_id = '$id'");
                        while($fetchServices = mysqli_fetch_assoc($execQuery2)){
                            $service_id   = $fetchServices["id"];
                            $service_name = $fetchServices["service_name"];
                            $service_price= $fetchServices["price"];
                            $service_pic  = $fetchServices["service_picture"];
                            
                            echo"
                                <div class='service-card'>
                                    <center><img src='../images/$service_pic' class='img-service'></center>
                                    <div class='service-container'>
                                        <h4><b>$service_name</b></h4> 
                                        <p>Php $service_price</p>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>

            <div id="Feedback" class="tabcontent">
                <p>Empty Feedback</p>
            </div>

            <div id="EditProfile" class="tabcontent">
                <?php include_once("edit_profile.php"); ?>
            </div>

            <!--Modal for Add Service-->
            <div class="modal fade" id="myModal1">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Service</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="handle_add_service_laborer.php" method="POST">
                            <div class="row">
                                <div class="col">
                                    <select name="inputService">
                                        <option value="" disabled selected hidden>Choose a Service</option>
                                        <?php echo $services; ?>
                                    </select>
                                </div>
                                <div class="col">
                                     <input type="number" name="inputPrice" placeholder="Enter Price">
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col">
                                <input type="submit" value="Add Service">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</html>