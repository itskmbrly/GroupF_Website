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
    $bday       = trim($_POST["bday"]);
    $sex        = trim($_POST["inputSex"]);
    $address    = trim($_POST["address"]);
    $barangay   = trim($_POST["barangay"]);
    $city       = trim($_POST["city"]);
    $province   = trim($_POST["province"]);
    $zipcode    = trim($_POST["zipcode"]);
    $country    = trim($_POST["country"]);
    $role       = trim($_POST["inputRole"]);

    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //CHECKING IF THERE'S A DUPLICATION - email
    $execQuery = mysqli_query($con, "SELECT * FROM tbl_users WHERE email = '$email'");
    $numOfRows = mysqli_num_rows($execQuery);

    if($numOfRows > 0){
        header("Location: welcome_page.php?msg=20"); exit;
    } 

    //CHECKING IF THERE'S A DUPLICATION - mobile number
    $execQuery7 = mysqli_query($con, "SELECT * FROM tbl_users WHERE mobile_no = '$mobile_no'");
    $numOfRows2 = mysqli_num_rows($execQuery7);

    if($numOfRows2 > 0){
        header("Location: welcome_page.php?msg=20"); exit;
    }
    
    //CHECKING IF THE PASSWORD IS THE SAME WITH THE CONFIRM PASSWORD
    if($password1 == $password2){
        //PASSWORD HASH, FOR DATA PRIVACY
        $encPassword = password_hash($password1, PASSWORD_DEFAULT);

        //IF THERE'S NO DUPLICATION ON THE DATABASE AND PASSWORD IS THE SAME WITH CONFIRM PASSWORD, NEXT WILL BE INSERT QUERY

        //INSERTION IN TBL_USERS
        $execQuery2 = mysqli_query($con, "INSERT INTO tbl_users(first_name, last_name, email, password, mobile_no, birthdate, sex, role_id, created_at) VALUES('$fname', '$lname', '$email', '$encPassword', '$mobile_no', '$bday', '$sex', '$role', now())");

        //FETCHING THE USER_ID SO WE CAN INPUT IT IN THE TBL_ADDRESS
        $execQuery3 = mysqli_query($con, "SELECT * FROM tbl_users WHERE email = '$email'");
        $row = mysqli_fetch_assoc($execQuery3);
        $userId = $row["id"];

        //INSERTION IN TBL_ADDRESS
        $execQuery4 = mysqli_query($con, "INSERT INTO tbl_address(user_id, address, barangay, city, province, zip, country) VALUES('$userId', '$address', '$barangay', '$city', '$province', '$zipcode', '$country')");

        //FETCHING THE ADDRESS_ID SO WE CAN INPUT IT IN THE TBL_USERS
        $execQuery5 = mysqli_query($con, "SELECT * FROM tbl_address WHERE user_id = '$userId'");
        $row2 = mysqli_fetch_assoc($execQuery5);
        $address_id = $row2["id"];

        //INSERTION IN TBL_USERS (ADDDRESS_ID)
        $execQuery6 = mysqli_query($con, "UPDATE tbl_users SET address_id = '$address_id' WHERE id = '$userId'");
        $filename = "PIC_" . $id . "_" . date("Ymd_His") . "_" . $_FILES["inputFile"]["name"][0];
        $targetfile = "uploads/credentials/" . $filename;
        $filetype = $_FILES["inputFile"]["type"][0];

        // CHECK FILE SIZE
        // if ($_FILES["inputFile"]["size"] > 500000) {
        //     header("Location: index.php?msg=27"); exit;
        // }
        // ALLOW CERTAIN FORMATS
        if($filetype != ""){
            if($filetype != "image/jpg" && $filetype != "image/png" && $filetype != "image/jpeg") {
                header("Location: index.php?msg=24"); exit;
            }
            
            //UPLOAD
            if(move_uploaded_file($_FILES["inputFile"]["tmp_name"][0], $targetfile)){
                $updateCredentials = mysqli_query($con, "UPDATE tbl_users SET credentials = '$filename' WHERE id = '$id'");
                if($updateCredentials){
                    header("Location: index.php?msg=25"); exit;
                }
            } else{
                header("Location: index.php?msg=26"); exit;
            }
        }

        //EXECUTE QUERY CONDITIONS
        if($execQuery2){
            header("Location: welcome_page.php?msg=18"); exit;
        } else{
            header("Location: welcome_page.php?msg=17"); exit;
        } 
    } else{
        header("Location: welcome_page.php?msg=19"); exit;
    }
?>