<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VAR_DUMP
    $serviceName = trim($_POST["serviceName"]);
    $inpCategory    = trim($_POST["inputCategory"]);

    //VALIDATIONS
    if($serviceName == "" && $category == ""){
        header("Location: index.php?msg=31"); exit;
    }

    $execQuery = mysqli_query($con, "INSERT INTO tbl_services(service_name, category) VALUES('$serviceName', '$inpCategory')");

    if($execQuery){
        header("Location: index.php?msg=32"); exit;
    } else{
        header("Location: index.php?msg=26"); exit;
    }
?>