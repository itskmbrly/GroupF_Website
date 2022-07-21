<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VAR DUMP
    $id = $_GET["id"];
    $execQuery = mysqli_query($con, "UPDATE tbl_users SET verified = 1 WHERE id = '$id'");
    if($execQuery){
        $_SESSION["msg"] = 18;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>