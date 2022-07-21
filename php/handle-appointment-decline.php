<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    $id = $_GET["id"];

    //VARDUMP
    $reason = $_POST["reason"];

    $declineAppointment = mysqli_query($con, "INSERT INTO tbl_declinedappointments VALUES('', '$id', '$reason')");

    if($declineAppointment){
        $_SESSION["msg"] = 20;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>