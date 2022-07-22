<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VAR DUMP
    $id = $_GET["id"];
    $execQuery = mysqli_query($con, "DELETE FROM tbl_users WHERE id = '$id'");
    $execQuery2 = mysqli_query($con, "DELETE FROM tbl_address WHERE user_id = '$id'");
    $execQuery3 = mysqli_query($con, "DELETE FROM tbl_transactions WHERE klient_id = '$id'"); //temporary
    if($execQuery && $execQuery2 && $execQuery3){
        $_SESSION["msg"] = 12;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>