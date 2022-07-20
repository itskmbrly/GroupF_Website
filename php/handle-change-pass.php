<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VAR DUMP
    $id      = $_POST["id"];
    $oldpass = $_POST["oldpass"];
    $new1    = $_POST["passnew1"];
    $new2    = $_POST["passnew2"];
    // print_r($oldpass . " " . $new1 . " " . $new2); exit;

    $execQuery = mysqli_query($con, "SELECT * FROM tbl_users");
    $fetchPass = mysqli_fetch_assoc($execQuery);
    $password  = $fetchPass["password"];

    // Verify the hash against the password entered
    $verify = password_verify($oldpass, $password);

    // Print the result depending if they match
    if($verify){
        if($new1 == $new2){
            $encPass = password_hash($new1, PASSWORD_DEFAULT);

            $execQuery2 = mysqli_query($con, "UPDATE tbl_users SET password = '$encPass' WHERE id = '$id'");
    
            if($execQuery2){
                $_SESSION["msg"] = 11;
                header("Location: index.php"); exit;
            } else{
                $_SESSION["msg"] = 7;
                echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
            }
        } else{
            $_SESSION["msg"] = 8;
            echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
        }
    } else{
        $_SESSION["msg"] = 8;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>