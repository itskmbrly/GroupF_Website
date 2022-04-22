<?php
    //IF NULL, THE CODE WILL EXIT
    if($_POST["email"] == ""){
        header("Location: welcome_page.php?msg=3"); exit;
    } else if($_POST["password"] == ""){
        header("Location: welcome_page.php?msg=4"); exit;
    }

    //VAR_DUMP, USE TRIM TO REMOVE THE UNWANTED SPACES INFRONT AND BACK
    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //CHECKS IF THE INPUTS ARE IN THE DATABASE
    $getAcc = mysqli_query($con, "SELECT * FROM tbl_users WHERE email = '$email'");
    $fetchPass = mysqli_fetch_assoc($getAcc);
    $encryptedPass = $fetchPass["password"];

    if(isset($encryptedPass)){
        //PASSWORD VERIFICATION
        if(password_verify($password, $encryptedPass)){
            $_SESSION["sess-role"] = $fetchPass["role_id"];
            $_SESSION["sess-name"] = $fetchPass["first_name"];
            //LOGIN SUCCESSFULLY
            header("Location: index.php?msg=14");
        } else{
            //INVALID PASSWORD
            header("Location: welcome_page.php?msg=15");
        }
    } else{
        //EMAIL DOES NOT EXISTS
        header("Location: welcome_page.php?msg=16");
    }
?>