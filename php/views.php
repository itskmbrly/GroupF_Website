<?php
    //connection to the database
    include_once("connection.php");

    $id = $_GET["id"];

    $credentialQuery = mysqli_query($con, "SELECT * FROM tbl_credentials WHERE user_id = '$id' ORDER BY created_at DESC");
    $fetchCredential = mysqli_fetch_assoc($credentialQuery);
    $file_type = $fetchCredential["file_type"];
    $credentials = $fetchCredential["credentials"];
    
    if($file_type == 'pdf')
    {
        $file = $_SERVER['DOCUMENT_ROOT'].'/DTS/GroupF_Website/uploads/credentials/'.$id.'/'.$credentials;
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $credentials . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo file_get_contents($file);

    }
    else if(in_array($file_type, ['image/jpg', 'image/jpeg', 'image/png']))
    {
        echo"
            <img src='../uploads/credentials/$id/$credentials'>
        ";
    }
?>