<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    $sessId = $_SESSION["sess-id"];

    //VARDUMP
    $feedback = $_POST["feedback"];
    $selected_id = $_POST["selected_id"];

    $addFeedback = mysqli_query($con, "INSERT INTO tbl_feedbacks(kraftsman_id, klient_id, feedback, created_at) VALUES('$selected_id', '$sessId', '$feedback', now())");

    if($addFeedback){
        $_SESSION["msg"] = 21;
        header("Location: index.php"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>