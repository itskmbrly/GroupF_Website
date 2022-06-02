<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VAR DUMP
    $id = $_GET["id"];
    $serviceName = trim($_POST["serviceName"]);
    $serviceCate = trim($_POST["inputCategory"]);
    
    //VALIDATION
    if($serviceName == "" && $serviceCate == ""){
        header("Location: index.php?msg=26"); exit;
    }
    //INSERT QUERY
    $execQuery = mysqli_query($con, "UPDATE tbl_services SET service_name = '$serviceName', category = '$serviceCate' WHERE id = '$id'");

    if($execQuery){
        header("Location: index.php?msg=34"); exit;
    } else{
        header("Location: index.php?msg=26"); exit;
    }
?>