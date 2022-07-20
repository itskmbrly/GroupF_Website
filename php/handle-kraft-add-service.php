<?php
    //CONNETION TO THE DATABASE
    include_once("connection.php");
    //SESSION ID
    if($_SESSION["sess-role"] == 1 && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];
        //VAR_DUMP
        $category = $_POST["inputCategory"];
        $service = $_POST["inputService"];
        $picture = $_POST["inputServPic"] . ".png";
        $price = $_POST["inputPrice"];
            
        //INSERT QUERY
        $execQuery = mysqli_query($con, "INSERT INTO tbl_kraftsman VALUES('', '$sessId', '$service', '$category', '$price', '$picture')");

        if($execQuery){
            $_SESSION["msg"] = 16;
            header("Location: index.php"); exit;
        } else{
            $_SESSION["msg"] = 14;
            echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
        }
    }
    
?>