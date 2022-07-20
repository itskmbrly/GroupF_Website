<?php
    if(isset($_POST["fave"])){
        //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //GET ID
    $id = $_GET["serveid"];

    //SESSION IF
    $sessId = $_SESSION["sess-id"];

    //SELECT QUERY
    // $selectQuery1 = mysqli_query($con, "SELECT * FROM tbl_kraftsman WHERE id = '$id'");
    // $fetchServiceInfo = mysqli_num_rows($selectQuery1);
    // $kraftsman_id = $fetchServiceInfo["user_id"];

    $selectQuery1 = mysqli_query($con, "SELECT * FROM tbl_favorites WHERE kraftsman_id = '$id' AND klient_id = '$sessId'");
    $numOfRows = mysqli_num_rows($selectQuery1);

    if($numOfRows > 0){
        $deleteQuery = mysqli_query($con, "DELETE FROM tbl_favorites WHERE kraftsman_id = '$id' AND klient_id = '$sessId'");
    } else{
        $insertQuery = mysqli_query($con, "INSERT INTO tbl_favorites VALUES('', '$sessId', '$id')");
    }
    //header("Location: services.php?serveid=$id");
    echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
    }
?>