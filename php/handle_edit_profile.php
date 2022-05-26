<?php
    date_default_timezone_set("Asia/Manila");
    $id = $_POST["id"];
    // var_dump($_FILES["inputFile"]);
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
    } else if($_POST["birthdate"] == ""){
        header("Location: index.php?msg=22"); exit;
    } else if($_POST["sex"] == ""){
        header("Location: index.php?msg=23"); exit;
    }

    //VAR_DUMP, USE TRIM TO REMOVE THE UNWANTED SPACES INFRON AND BACK
    $fname      = trim($_POST["fname"]);
    $lname      = trim($_POST["lname"]);
    $email      = trim($_POST["email"]);
    $password1  = trim($_POST["password1"]);
    $password2  = trim($_POST["password2"]);
    $mobile_no  = trim($_POST["mobile_no"]);
    $bday       = trim($_POST["birthdate"]);
    $sex        = trim($_POST["sex"]);
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
        
        $execQuery4 = mysqli_query($con, "UPDATE tbl_address SET user_id = '$id', address = '$address', barangay = '$barangay', city = '$city', province = '$province', zip = '$zipcode') WHERE user_id = '$id'");

        $filename = "PIC_" . $id . "_" . date("Ymd_His") . "_" . $_FILES["inputFile"]["name"][0];
        $targetfile = "uploads/credentials/" . $filename;
        $filetype = $_FILES["inputFile"]["type"][0];

        // CHECK FILE SIZE
        // if ($_FILES["inputFile"]["size"] > 500000) {
        //     header("Location: index.php?msg=27"); exit;
        // }
        // ALLOW CERTAIN FORMATS
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