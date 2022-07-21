<?php
    //connection to the database
    include_once("connection.php");

    $id = $_GET["id"];

    $credentialQuery = mysqli_query($con, "SELECT * FROM tbl_credentials WHERE user_id = '$id'");
    $fetchCredential = mysqli_fetch_assoc($credentialQuery);
    $credentials = $fetchCredential["credentials"];

    echo"
        <img src='../uploads/credentials/$id/$credentials'>
    ";
?>