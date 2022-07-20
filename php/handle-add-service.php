<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VAR_DUMP
    $serviceName = trim($_POST["serviceName"]);
    $inpCategory    = trim($_POST["inputCategory"]);

    $execQuery = mysqli_query($con, "INSERT INTO tbl_services VALUES('', '$inpCategory', '$serviceName')");

    if($execQuery){
        header("Location: create-services.php?msg=9"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>