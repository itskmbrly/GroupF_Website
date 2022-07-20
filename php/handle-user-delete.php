<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VAR DUMP
    $id = $_GET["id"];
    $execQuery = mysqli_query($con, "DELETE FROM tbl_users WHERE id = '$id'");
    $execQuery2 = mysqli_query($con, "DELETE FROM tbl_addresss WHERE user_id = '$id'");
    if($execQuery){
        $_SESSION["msg"] = 12;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>