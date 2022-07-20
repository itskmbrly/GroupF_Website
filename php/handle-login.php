<?php 
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
            $_SESSION["sess-id"]   = $fetchPass["id"]; 
            //LOGIN SUCCESSFULLY
            $_SESSION["msg"] = 1;
            header("Location: index.php"); exit;
        } else{
            //INVALID PASSWORD
            $_SESSION["msg"] = 2;
            echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
        }
    } else{
        //EMAIL DOES NOT EXISTS
        $_SESSION["msg"] = 3;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>