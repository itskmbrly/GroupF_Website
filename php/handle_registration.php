<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <!--Shortcut Icon of Jentle Kare-->
     <link rel="shortcut icon" href="../images/JK.png">
    <!--CSS File-->
    <link rel="stylesheet" href="../css/styles.css">
    <title>Jentle Kare</title>
</head>
<body>
    <?php
        //POST METHOD, USE TRIM TO REMOVE THE UNWANTED SPACES INFRONT AND BACK
        $fname = trim($_POST["fname"]);
        $lname = trim($POST["lname"]);
        $email = trim($POST["email"]);
        $password1 = trim($POST["password1"]);
        $password2 = trim($POST["password2"]);
        $mobile_no = trim($POST["mobile_no"]);
        $address = trim($POST["address"]);
        $barangay = trim($POST["barangay"]);
        $city = trim($POST["city"]);
        $province = trim($POST["province"]);
        $zipcode = trim($POST["zipcode"]);
        $country = trim($POST["country"]);
        $role = ($POST["inputRole"]);

        //CONNECTION TO THE DATABASE
        include_once("connection.php");

        //CHECKING IF THERE'S A DUPLICATION
        $execQuery = mysqli_query($con, "SELECT * FROM tbl_users WHERE email = '$email'");
        $numOfRows = mysqli_num_rows($execQuery);

        if($numOfRows > 0){
            echo"Duplicate Record! This user already exists."; 
            echo"<center><div class='goBackBtn'>
            <a href='form-reg.php'>Go Back</a>
            </div></center>"; exit;
        } 
    ?>
</body>
</html>