<?php
    $id = $_POST["id"];
    //IF NULL, THE CODE WILL EXIT
    if($_POST["fname"] == ""){ 
        header("Location: index.php?msg=1"); exit;
    } else if($_POST["lname"] == ""){ 
        header("Location: index.php?msg=2"); exit;
    } else if($_POST["email"] == ""){
        header("Location: index.php?msg=3"); exit;
    } else if($_POST["password1"] == ""){
        header("Location: index.php?msg=4"); exit;
    } else if($_POST["password2"] == ""){
        header("Location: index.php?msg=5"); exit;
    } else if($_POST["mobile_no"] == ""){
        header("Location: index.php?msg=6"); exit;
    } else if($_POST["address"] == ""){
        header("Location: index.php?msg=7"); exit;
    } else if($_POST["barangay"] == ""){
        header("Location: index.php?msg=8"); exit;
    } else if($_POST["city"] == ""){
        header("Location: index.php?msg=9"); exit;
    } else if($_POST["province"] == ""){
        header("Location: index.php?msg=10"); exit;
    } else if($_POST["zipcode"] == ""){
        header("Location: index.php?msg=11"); exit;
    }

    //VAR_DUMP, USE TRIM TO REMOVE THE UNWANTED SPACES INFRON AND BACK
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

    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //CHECKING IF THE INPUT EMAIL IS SAME AS THE EMAIL INSIDE THE DATABASE
    $execQuery    = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$id'");
    $fetchEmail   = mysqli_fetch_assoc($execQuery);
    $stored_email = $fetchEmail["email"];
    $numOfRows    = mysqli_num_rows($execQuery);

    if($numOfRows > 1){
        if($stored_email == $email){
            header("Location: index.php?msg=20"); exit;
        }
    } 

    //CHECKING IF THE PASSWORD IS THE SAME WITH THE CONFIRM PASSWORD
    if($password1 == $password2){
        //PASSWORD HASH, FOR DATA PRIVACY
        $encPassword = password_hash($password1, PASSWORD_DEFAULT);

        //IF THERE'S NO DUPLICATION IN THE DATABASE AND PASSWORD IS THE SAME WITH CONFIRM PASSWORD, NEXT WILL BE INSERT QUERY

        //UPDATE IN TBL_USERS
        $execQuery2 = mysqli_query($con, "UPDATE tbl_users SET first_name = '$fname', last_name = '$lname', email = '$email', password = '$encPassword', mobile_no = '$mobile_no', updated_at = now() WHERE id = '$id'");
        
        $execQuery4 = mysqli_query($con, "UPDATE tbl_address SET user_id = '$userId', address = '$address', barangay = '$barangay', city = '$city', province = '$province', zip = '$zipcode', country = '$country') WHERE user_id = '$id'");

        //EXECUTE QUERY CONDITIONS
        if($execQuery2){
            header("Location: index.php?msg=21"); exit;
        } else{
            header("Location: index.php?msg=17"); exit;
        } 
    } else{
        header("Location: index.php?msg=19"); exit;
    }
?>