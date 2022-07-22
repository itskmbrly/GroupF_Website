<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    $createdDate = date("Y-m-d H:i:s");
    $sessId = $_SESSION["sess-id"];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $kraftsman_id = $_POST['kraftsman_id'];
    $service_id = $_POST['service_id'];

    $execQuery = mysqli_query($con, "SELECT * FROM tbl_transactions WHERE kraftsman_id = ".$kraftsman_id." AND date = '".$date."' AND time = ".$time);
    $fetchTransaction = mysqli_fetch_assoc($execQuery);

    if($fetchTransaction){
        $_SESSION["msg"] = 22;
        header("Location: index.php"); exit;
    } else{
        $insertTransaction = mysqli_query($con, "INSERT INTO tbl_transactions VALUES('', '$kraftsman_id', '$sessId', '$service_id', '$date', '$time', '$createdDate', 0)");
    
        if($insertTransaction){
            $_SESSION["msg"] = 23;
            header("Location: index.php"); exit;
        } else{
            $_SESSION["msg"] = 14;
            echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
        }
    }
?>