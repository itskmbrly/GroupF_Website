<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    $id = $_GET["id"];

    $accept = mysqli_query($con, "UPDATE tbl_transactions SET status = 1 WHERE id = ".$id);

    if($accept){
        $_SESSION["msg"] = 20;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>