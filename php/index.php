<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");    
    $hair_serv = '';
    $nail_serv = '';
    $spa_serv  = '';

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];

        //FETCHING THE USER'S NAME AND ROLE
        $userInfo = mysqli_query($con,  "SELECT * FROM tbl_users WHERE id = '$sessId'");
        
        while($fetchInfo = mysqli_fetch_assoc($userInfo)){
            $fname = $fetchInfo["first_name"];
            $lname = $fetchInfo["last_name"];
            $id   = $fetchInfo["id"];
        }

        //FETCHING THE LIST OF HAIR SERVICES
        $listOfHairServices = mysqli_query($con, "SELECT * FROM tbl_services WHERE category = 'Hair Care Services'");
        while ($row1 = mysqli_fetch_assoc($listOfHairServices)) {
            $hair_serv .= "<tr value='" . $row1["id"] . "'>" . $row1['service_name'] . " </tr>";
        }

        //FETCHING THE LIST OF NAIL SERVICES
        $listOfNailServices = mysqli_query($con, "SELECT * FROM tbl_services WHERE category = 'Nail Services'");
        while ($row2 = mysqli_fetch_assoc($listOfNailServices)) {
            $nail_serv .= "<tr value='" . $row2["id"] . "'>" . $row2['service_name'] . " </tr>";
        }

        //FETCHING THE LIST OF SPA SERVICES
        $listOfSpaServices = mysqli_query($con, "SELECT * FROM tbl_services WHERE category = 'Spa Services'");
        while ($row3 = mysqli_fetch_assoc($listOfSpaServices)) {
            $spa_serv .= "<tr value='" . $row3["id"] . "'>" . $row3['service_name'] . " </tr>";
        }

        //SELECT QUERY FOR SEX TYPE
        $execQuery2 = mysqli_query($con, "SELECT * FROM tbl_sex");
        $sexT = "";
        //FETCHING DATA FOR SEX TYPE
        while ($row2 = mysqli_fetch_assoc($execQuery2)) {
            $sexT .= "<option value='" . $row2["id"] . "'>" . $row2['sex_type'] . "</option>";
        }

        //SELECT QUERY FOR ROLE TYPES
        $execQuery = mysqli_query($con, "SELECT * FROM tbl_role_types WHERE id NOT IN(3, 4)");
        $roles = "";

        //FETCHING DATA FOR ROLE TYPES
        while ($row = mysqli_fetch_assoc($execQuery)) {
            $roles .= "<option value='" . $row["id"] . "'>" . $row['role_type'] . "</option>";
        }
    } 

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
    <title>Jentle Kare</title>
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
                    if($_SESSION["sess-role"] == 1){ //kraftsman
                        include_once("kraftsman.php");
                    } else if($_SESSION["sess-role"] == 2){ //klient
                        include_once("klient.php");
                    } else if($_SESSION["sess-role"] == 3){ //admin
                        include_once("admin.php");
                    } else if($_SESSION["sess-role"] == 4){ //moderator
                        include_once("moderator.php");
                    }
                } else{
                    include_once("non_user_perspective.php");
                }
            ?>
        </div>
    </div>
    
</body>
</html>