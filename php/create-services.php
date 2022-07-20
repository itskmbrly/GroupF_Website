<?php 
    include_once("connection.php"); 
    $categories= '';

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
      $sessId = $_SESSION["sess-id"];

      //FETCHING THE USER'S NAME AND ROLE
      $userInfo = mysqli_query($con,  "SELECT * FROM tbl_users WHERE id = '$sessId'");
      $fetchInfo = mysqli_fetch_assoc($userInfo);
      $fname = $fetchInfo["first_name"];
      $lname = $fetchInfo["last_name"];
      $id   = $fetchInfo["id"];

      //FETCHING THE LIST OF CATEGORIES
      $listOfCategories = mysqli_query($con, "SELECT * FROM tbl_category");
      while($row4 = mysqli_fetch_assoc($listOfCategories)){
          $categories .= "<option value='" . $row4["id"] . "'>" . $row4['category'] . "</option>";
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
    <link href="https://fonts.googleapis.com/css2?family=Zhi+Mang+Xing&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ranga&display=swap" rel="stylesheet">
    <title>Jentle Kare</title>
</head>
<body>
    <?php include_once("navbar.php"); ?>
    <div class="right">
        <!--ALERT MESSAGE-->
        <?php include_once("msg.php"); ?>
        <div class="w3-container cs-container">
            <h4 >Create New Service</h4>
            <form action="handle-add-service.php" method="POST">
                <input type="text" name="serviceName" placeholder="Create A New Service">
                <select name="inputCategory">
                    <option value="" disabled selected hidden>Choose a Category</option>
                    <?php echo $categories; ?>
                </select>
                <input type="submit" value="Add Service">
            </form>
        </div>
  </div>
</body>
</html>