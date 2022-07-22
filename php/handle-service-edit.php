<?php
    //CONNETION TO THE DATABASE
    include_once("connection.php");
    //VAR_DUMP
    $service = $_POST["serviceName"];
    $category = $_POST["inputCategory"];
    $id = $_GET["id"];

    // $serviceQuery = mysqli_query($con, "SELECT * FROM tbl_services WHERE id = '$service'");
    // $fetchService = mysqli_fetch_assoc($serviceQuery);
    // $serviceName = $fetchService["service_name"];

    //INSERT QUERY
    $execQuery = mysqli_query($con, "UPDATE tbl_services SET category_id = '$category', service_name = '$service' WHERE id = '$id'");

    if($execQuery){
        $_SESSION["msg"] = 24;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 14;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
    
?>