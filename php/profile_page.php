<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //GET ID
    $id = $_GET["id"];

    //FETCHING ALL THE INFORMATION OF THE USER TO DISPLAY
    $execQuery = mysqli_query($con, "SELECT * FROM tbl_users WHERE id= '$id'");

    $fetchInfo = mysqli_fetch_assoc($execQuery);
    $fname     = $fetchInfo["first_name"];
    $lname     = $fetchInfo["last_name"];
    $email     = $fetchInfo["email"];
    $password  = $fetchInfo["password"];
    $mobile_no = $fetchInfo["mobile_no"];
    $address_id= $fetchInfo["address_id"];
    $role_id   = $fetchInfo["role_id"]; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--W3 School-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--Shortcut Icon of Jentle Kare-->
    <link rel="shortcut icon" href="../images/JK.png">
    <!--CSS File-->
    <link rel="stylesheet" href="../css/styles.css">
    <title>Jentle Kare</title>
</head>
<body>
    <!--SIDE NAVIGATION BAR-->
    <?php include_once("navbar.php"); ?>
    
    <div class="main-body">
        <?php 
            //ALERT MESSAGES
            include_once("msg.php"); 
        ?>
        
    </div>
</body>
</html>