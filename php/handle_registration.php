<?php
    //IF NULL, THE CODE WILL EXIT
    if($_POST["fname"] == ""){ 
        header("Location: welcome_page.php?msg=1"); exit;
    } else if($_POST["lname"] == ""){ 
        header("Location: welcome_page.php?msg=2"); exit;
    } else if($_POST["email"] == ""){
        header("Location: welcome_page.php?msg=3"); exit;
    } else if($_POST["password1"] == ""){
        header("Location: welcome_page.php?msg=4"); exit;
    } else if($_POST["password2"] == ""){
        header("Location: welcome_page.php?msg=5"); exit;
    } else if($_POST["mobile_no"] == ""){
        header("Location: welcome_page.php?msg=6"); exit;
    } else if($_POST["address"] == ""){
        header("Location: welcome_page.php?msg=7"); exit;
    } else if($_POST["barangay"] == ""){
        header("Location: welcome_page.php?msg=8"); exit;
    } else if($_POST["city"] == ""){
        header("Location: welcome_page.php?msg=9"); exit;
    } else if($_POST["province"] == ""){
        header("Location: welcome_page.php?msg=10"); exit;
    } else if($_POST["zipcode"] == ""){
        header("Location: welcome_page.php?msg=11"); exit;
    } else if($_POST["country"] == ""){
        header("Location: welcome_page.php?msg=12"); exit;
    } else if($_POST["inputRole"] == ""){
        header("Location: welcome_page.php?msg=13"); exit;
    }

    //VAR_DUMP, USE TRIM TO REMOVE THE UNWANTED SPACES INFRONT AND BACK
    $fname      = trim($_POST["fname"]);
    $lname      = trim($_POST["lname"]);
    $email      = trim($_POST["email"]);
    $password1  = trim($_POST["password1"]);
    $password2  = trim($_POST["password2"]);
    $mobile_no  = trim($_POST["mobile_no"]);
    $address    = trim($_POST["address"]);
    $barangay   = trim($_POST["barangay"]);
    $city       = trim($_POST["city"]);
    $province   = trim($_POST["province"]);
    $zipcode    = trim($_POST["zipcode"]);
    $country    = trim($_POST["country"]);
    $role       = trim($_POST["inputRole"]);

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
            header("Location: welcome_page.php?msg=17"); exit;
        } else{
            header("Location: welcome_page.php?msg=17"); exit;
        } 
    } else{
        header("Location: welcome_page.php?msg=19"); exit;
    }
?>