<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VAR DUMP
    $id = $_GET["id"];
    
    $execQuery = mysqli_query($con, "DELETE FROM tbl_services WHERE id = '$id'");

    if($execQuery){
        header("Location: index.php?msg=33"); exit;
    } else{
        header("Location: index.php?msg=26"); exit;
    }
?>