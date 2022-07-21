<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //VARDUMP
    $feedback = $_POST["feedback"];
    $service_id = $_POST["service_id"];

    $queryService = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE id = '$service_id'");
    $fetchQueryService = mysqli_fetch_assoc($queryService);
    $fetchKraftsmanId = $fetchQueryService["user_id"];

    $addFeedback = mysqli_query($con, "INSERT INTO tbl_feedbacks VALUES('', '$fetchKraftsmanId', '$sessId', '$feedback', now())");

    if($addFeedback){
        $_SESSION["msg"] = 21;
        header("Location: service.php?id=$service_id"); exit;
    } else{
        $_SESSION["msg"] = 7;
        echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>