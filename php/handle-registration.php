<?php 
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
    $execQuery1 = mysqli_query($con, "SELECT * FROM tbl_users WHERE email = '$email'");
    $numOfRows = mysqli_num_rows($execQuery1);
    print_r($numOfRows); 
    if($numOfRows > 0){
        $_SESSION["msg"] = 4;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }

    //CHECKING IF THERE'S A DUPLICATION - mobile number
    $execQuery2 = mysqli_query($con, "SELECT * FROM tbl_users WHERE mobile_no = '$mobile_no'");
    $numOfRows2 = mysqli_num_rows($execQuery2);

    if($numOfRows2 > 0){
        $_SESSION["msg"] = 5;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
    print_r($numOfRows2);exit;
    //CHECKING IF THE AGE OF THE USER IS ALREADY 18 AND ABOVE
    function check_age ($bday) {
    
        $today = date("Y-m-d");
        $diff = date_diff(date_create($bday), date_create($today));
        $age = $diff->format('%y');

        //DEFINE THE AGE RESTRICTIONS
        if ($age < 18) {
            return false;
        } else {
            return true;
        }
    }
    //CHECKING IF THE PASSWORD IS THE SAME WITH THE CONFIRM PASSWORD
    if($password1 == $password2){
        //CALLED THE FUNCTION FOR BIRTHDAY
        $isValid = check_age($bday);

        if($isValid){
            //PASSWORD HASH, FOR DATA PRIVACY
            $encPassword = password_hash($password1, PASSWORD_DEFAULT);
            //IF THERE'S NO DUPLICATION ON THE DATABASE AND PASSWORD IS THE SAME WITH CONFIRM PASSWORD, NEXT WILL BE INSERT QUERY

            //INSERTION IN TBL_USERS
            $execQuery3 = mysqli_query($con, "INSERT INTO tbl_users(first_name, last_name, email, password, mobile_no, birthdate, sex, role_id, created_at) VALUES('$fname', '$lname', '$email', '$encPassword', '$mobile_no', '$bday', '$sex', '$role', now())");

            //FETCHING THE USER_ID SO WE CAN INPUT IT IN THE TBL_ADDRESS
            $execQuery4 = mysqli_query($con, "SELECT * FROM tbl_users WHERE email = '$email'");
            $row = mysqli_fetch_assoc($execQuery4);
            $userId = $row["id"];

            //INSERTION IN TBL_ADDRESS
            $execQuery5 = mysqli_query($con, "INSERT INTO tbl_address VALUES('', '$userId', '$address', '$barangay', '$city', '$province', '$zipcode', '$country')");
            //FETCHING THE ADDRESS_ID SO WE CAN INPUT IT IN THE TBL_USERS
            $execQuery6 = mysqli_query($con, "SELECT * FROM tbl_address WHERE user_id = '$userId'");
            $row2 = mysqli_fetch_assoc($execQuery6);
            $address_id = $row2["id"];

            //INSERTION IN TBL_USERS (ADDDRESS_ID)
            $execQuery7 = mysqli_query($con, "UPDATE tbl_users SET address_id = '$address_id' WHERE id = '$userId'");

            //EXECUTE QUERY CONDITIONS
            if($execQuery3){
                if($_SESSION["sess-role"] != ""){
                    $_SESSION["msg"] = 13;
                    header("Location: create-user.php"); exit;
                } else{
                    $_SESSION["msg"] = 6;
                    header("Location: sign-up-sign-in.php"); exit;
                }
            } else{
                $_SESSION["msg"] = 7;
                echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
            } 
        } else{
            $_SESSION["msg"] = 15;
            echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
        }
    } else{
        $_SESSION["msg"] = 8;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>