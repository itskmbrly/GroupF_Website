<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    $id = $_POST["id"];
    $reason = $_POST["inputReason"];
    $declineAppointment = mysqli_query($con, "INSERT INTO tbl_declinedappointments(transaction_id, reason) VALUES('$id', '$reason')");
    $decline = mysqli_query($con, "UPDATE tbl_transactions SET status = 2 WHERE id = ".$id);

    if($declineAppointment){
        $_SESSION["msg"] = 20;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>