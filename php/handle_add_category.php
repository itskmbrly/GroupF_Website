<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");
    //VAR_DUMP
    $category = trim($_POST["category"]);

    //VALIDATION
    if($category == ""){
        header("Location: index.php?msg=30"); exit;
    }
    $execQuery = mysqli_query($con, "INSERT INTO tbl_category(name, is_active, created_at) VALUES('$category', '1', now())");

    if($execQuery){
        header("Location: index.php?msg=29");exit;
    } else{
        header("Location: index.php?msg=26");exit;
    }
?>