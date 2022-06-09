<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VAR DUMP
    $id          = $_POST["id"];
    $serviceName = $_POST["inputService"];
    $price       = $_POST["inputPrice"];

    if($serviceName == "" || $price == ""){
        header("Location: index.php?msg=31"); exit;
    }

    $execQuery = mysqli_query($con, "INSERT INTO tbl_kraftsman(user_id, service_name, price) VALUES('$id', '$serviceName', '$price')");

    if($execQuery){
        header("Location: index.php?msg=32"); exit;
    } else{
        header("Location: index.php?msg=26"); exit;
    }
?>