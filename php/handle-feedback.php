<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VARDUMP
    $reason = $_POST["feedback"];
    $service_id = $_POST["service_id"];

    $declineAppointment = mysqli_query($con, "INSERT INTO tbl_declinedappointments VALUES('', '$service_id', '$reason')");

    if($declineAppointment){
        $_SESSION["msg"] = 20;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>