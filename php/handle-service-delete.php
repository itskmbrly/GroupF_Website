<?php
    //CONNETION TO THE DATABASE
    include_once("connection.php");

    //GET ID
    $id = $_GET["id"];

    //INSERT QUERY
    $execQuery = mysqli_query($con, "DELETE FROM tbl_services WHERE id = '$id'");

    if($execQuery){
        $_SESSION["msg"] = 25;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 14;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }

    
?>