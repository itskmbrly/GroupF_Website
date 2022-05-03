<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");    
    //FETCHING THE USER'S NAME AND ROLE
    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];

        $userInfo = mysqli_query($con,  "SELECT * FROM tbl_users WHERE id = '$sessId'");
        
        while($fetchInfo = mysqli_fetch_assoc($userInfo)){
            $fname = $fetchInfo["first_name"];
            $lname = $fetchInfo["last_name"];
            $id   = $fetchInfo["id"];
        }
    } else{
        header("Location: welcome_page.php"); exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--W3 School-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Shortcut Icon of Jentle Kare-->
    <link rel="shortcut icon" href="../images/JK.png">
    <!--CSS File-->
    <link rel="stylesheet" href="../css/styles.css">
    <title>Jentle Kare</title>
</head>
<body>
    <!--SIDE NAVIGATION BAR-->
    <?php include_once("navbar.php"); ?>
    <div style="margin-left:20%">
        <!--ALERT MESSAGE-->
        <?php include_once("msg.php"); ?>

        <div class="w3-container">
            <?php 
                if($_SESSION["sess-role"] == 1){ //kraftsman
                    //REMOVE WHEN DONE: put here the welcome banner
                    echo"<div>
                            <h4>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
                            <h2>Good Morning, $fname</h2>
                            <h3>Welcome to JentleKare.</h3>
                        </div>";
                } else if($_SESSION["sess-role"] == 2){ //klient
                    echo"<div>
                            <h4>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
                            <h2>Good Morning, $fname</h2>
                            <h3>Welcome to JentleKare.</h3>
                        </div>";

                } else if($_SESSION["sess-role"] == 3){ //admin
                    echo"<div>
                            <h4>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
                            <h2>Good Morning, $fname</h2>
                            <h3>Welcome to JentleKare.</h3>
                        </div>";

                } else if($_SESSION["sess-role"] == 4){ //moderator
                    echo"<div>
                            <h4>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
                            <h2>Good Morning, $fname</h2>
                            <h3>Welcome to JentleKare.</h3>
                        </div>";

                }
            ?>
        </div>
    </div>
</body>
</html>