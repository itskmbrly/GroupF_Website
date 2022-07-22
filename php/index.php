<?php 
    include_once("connection.php"); 
    $hair_serv = '';
    $nail_serv = '';
    $spa_serv  = '';
    $categories= '';
    $roles     = '';
    $verified_user = 0;
    
    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
      $sessId = $_SESSION["sess-id"];

      //FETCHING THE USER'S NAME AND ROLE
      $userInfo = mysqli_query($con,  "SELECT * FROM tbl_users WHERE id = '$sessId'");
      $fetchInfo = mysqli_fetch_assoc($userInfo);
      $fname = $fetchInfo["first_name"];
      $lname = $fetchInfo["last_name"];
      $id   = $fetchInfo["id"];
      $verified_user = $fetchInfo["verified"];
      $_SESSION["fname"] = $fname;
      $_SESSION["lname"] = $lname;

      //FETCHING THE LIST OF ROLES
      $execQuery = mysqli_query($con, "SELECT * FROM tbl_role_types WHERE id NOT IN(3, 4)");
      while ($row = mysqli_fetch_assoc($execQuery)) {
          $roles .= "<option value='" . $row["id"] . "'>" . $row['role_type'] . "</option>";
      }

      //FETCHING THE LIST OF HAIR SERVICES
      $listOfHairServices = mysqli_query($con, "SELECT * FROM tbl_services WHERE category_id = '1'");
      while ($row1 = mysqli_fetch_assoc($listOfHairServices)) {
          $hair_serv .= "<tr value='" . $row1["id"] . "'>" . $row1['service_name'] . " </tr>";
      }

      //FETCHING THE LIST OF NAIL SERVICES
      $listOfNailServices = mysqli_query($con, "SELECT * FROM tbl_services WHERE category_id = '2'");
      while ($row2 = mysqli_fetch_assoc($listOfNailServices)) {
          $nail_serv .= "<tr value='" . $row2["id"] . "'>" . $row2['service_name'] . " </tr>";
      }

      //FETCHING THE LIST OF SPA SERVICES
      $listOfSpaServices = mysqli_query($con, "SELECT * FROM tbl_services WHERE category_id = '3'");
      while ($row3 = mysqli_fetch_assoc($listOfSpaServices)) {
          $spa_serv .= "<tr value='" . $row3["id"] . "'>" . $row3['service_name'] . " </tr>";
      }

      //FETCHING THE LIST OF CATEGORIES
      $listOfCategories = mysqli_query($con, "SELECT * FROM tbl_category");
      while($row4 = mysqli_fetch_assoc($listOfCategories)){
          $categories .= "<option value='" . $row4["id"] . "'>" . $row4['category'] . "</option>";
      }

      //SELECT QUERY - TBL_SERVICES
      $selectQuery  = mysqli_query($con, "SELECT * FROM tbl_services");
      $fetchQuery   = mysqli_fetch_assoc($selectQuery);
      $service_id   = $fetchQuery["id"];
      $service_name = $fetchQuery["service_name"]; 
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
        <?php 
            include_once("msg.php"); 

            if($verified_user == 0){
                $_SESSION["msg"] = 17;
            }
        ?>

        <div class="w3-container">
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
                    include_once("non-user-perspective.php");
                }
                
            ?>
        </div>
  </div>
</body>
</html>