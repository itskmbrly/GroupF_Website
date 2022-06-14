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
    <div style="margin-left:20%; background-color: #faf8e8;">
        <!--ALERT MESSAGE-->
        <?php include_once("msg.php"); ?>
        <div class="w3-container body">
            <?php
                if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
                    if($_SESSION["sess-role"] == 2 || $_SESSION["sess-role"] == 3){
                        include_once("edit_profile.php");
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>