<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    $id = $_GET["id"];
    $transaction_id = $_GET["t_id"];

    $deleteAppointment = mysqli_query($con, "DELETE FROM tbl_transactions WHERE id = '$transaction_id'");
    $deleteOnTblDecline = mysqli_query($con, "DELETE FROM tbl_declinedAppointments WHERE id = '$id'");

    if($execQuery){
        $_SESSION["msg"] = 19;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>