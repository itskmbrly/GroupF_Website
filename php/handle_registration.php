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

        if($_POST["fname"] == ""){ //if fname is null, the code will exit
            echo"<div class='alert red'><h4>First Name was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["lname"] == ""){ //if lname is null, the code will exit
            echo"<div class='alert red'><h4>First Name was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["email"] == ""){//if email is null, the code will exit
            echo"<div class='alert red'><h4>First Name was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["password1"] == ""){//if password1 is null, the code will exit
            echo"<div class='alert red'><h4>Password was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["password2"] == ""){//if password2 is null, the code will exit
            echo"<div class='alert red'><h4>Confirm Password was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["mobile_no"] == ""){//if mobile_no is null, the code will exit
            echo"<div class='alert red'><h4>Mobile Number was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["address"] == ""){//if address is null, the code will exit
            echo"<div class='alert red'><h4>Address was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["barangay"] == ""){//if barangay is null, the code will exit
            echo"<div class='alert red'><h4>Barangay was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["city"] == ""){//if city is null, the code will exit
            echo"<div class='alert red'><h4>City was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["province"] == ""){//if province is null, the code will exit
            echo"<div class='alert red'><h4>Province was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["zipcode"] == ""){//if zipcode is null, the code will exit
            echo"<div class='alert red'><h4>Zip Code was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["country"] == ""){//if country is null, the code will exit
            echo"<div class='alert red'><h4>Country was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        } else if($_POST["inputRole"] == ""){//if role is null, the code will exit
            echo"<div class='alert red'><h4>Role was null!</h4></div>"; 
            echo"<center><div class='btnHome'><a href='welcome_page.php'>Go Back</a></center></div>"; exit;
        }

        //VAR_DUMP, USE TRIM TO REMOVE THE UNWANTED SPACES INFRONT AND BACK
        $fname = trim($_POST["fname"]);
        $lname = trim($_POST["lname"]);
        $email = trim($_POST["email"]);
        $password1 = trim($_POST["password1"]);
        $password2 = trim($_POST["password2"]);
        $mobile_no = trim($_POST["mobile_no"]);
        $address = trim($_POST["address"]);
        $barangay = trim($_POST["barangay"]);
        $city = trim($_POST["city"]);
        $province = trim($_POST["province"]);
        $zipcode = trim($_POST["zipcode"]);
        $country = trim($_POST["country"]);
        $role = trim($_POST["inputRole"]);

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

        //CHECKING IF THE PASSWORD IS THE SAME WITH THE CONFIRM PASSWORD
        if($password1 == $password2){
            //PASSWORD HASH, FOR DATA PRIVACY
            $encPassword = password_hash($password1, PASSWORD_DEFAULT);

            //IF THERE'S NO DUPLICATION ON THE DATABASE AND PASSWORD IS THE SAME WITH CONFIRM PASSWORD, NEXT WILL BE INSERT QUERY

            //INSERTION IN TBL_USERS
            $execQuery2 = mysqli_query($con, "INSERT INTO tbl_users(first_name, last_name, email, password, mobile_no, role_id) values('$fname', '$lname', '$email', '$encPassword', '$mobile_no', '$role')");

            //FETCHING THE USER_ID SO WE CAN INPUT IT IN THE TBL_ADDRESS
            $execQuery3 = mysqli_query($con, "SELECT * FROM tbl_users WHERE mobile_no = '$mobile_no'");
            while($row = mysqli_fetch_assoc($execQuery3)){
                $userId = $row["id"];   
            }

            //INSERTION IN TBL_ADDRESS
            $execQuery4 = mysqli_query($con, "INSERT INTO tbl_address(user_id, address, barangay, city, province, zip, country) values('$userId', '$address', '$barangay', '$city', '$province', '$zipcode', '$country')");

            //FETCHING THE ADDRESS_ID SO WE CAN INPUT IT IN THE TBL_USERS
            $execQuery5 = mysqli_query($con, "SELECT * FROM tbl_address WHERE user_id = '$userId'");
            while($row2 = mysqli_fetch_assoc($execQuery5)){
                $address_id = $row2["id"];
            }

            //INSERTION IN TBL_USERS (ADDDRESS_ID)
            $execQuery6 = mysqli_query($con, "UPDATE tbl_users SET address_id = '$address_id'");

            //EXECUTE QUERY CONDITIONS
            if($execQuery2){
                echo"<h1>Welcome to Jentle Kare!</h1>";
                echo"You are successfully registered.";
            } else{
                echo"An error occured, it looks like you've missed something. Please try again.";
            } 
        } else{
            echo"Password does not matched.";
        }
    ?>
</body>
</html>