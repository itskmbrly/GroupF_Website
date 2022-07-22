<?php
    date_default_timezone_set("Asia/Manila");
    $id = $_POST["id"];

    //VAR_DUMP, USE TRIM TO REMOVE THE UNWANTED SPACES INFRON AND BACK
    $fname      = trim($_POST["fname"]);
    $lname      = trim($_POST["lname"]);
    $email      = trim($_POST["email"]);
    $mobile_no  = trim($_POST["mobile_no"]);
    $bday       = trim($_POST["bday"]);
    $sex        = trim($_POST["inputSex"]);
    $address    = trim($_POST["address"]);
    $barangay   = trim($_POST["barangay"]);
    $city       = trim($_POST["city"]);
    $province   = trim($_POST["province"]);
    $zipcode    = trim($_POST["zipcode"]);

    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    //CHECKING IF THE INPUT EMAIL IS SAME AS THE EMAIL INSIDE THE DATABASE
    $execQuery    = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$id'");
    $fetchEmail   = mysqli_fetch_assoc($execQuery);
    $stored_email = $fetchEmail["email"];
    $numOfRows    = mysqli_num_rows($execQuery);

    if($numOfRows > 1){
        if($stored_email == $email){
            header("Location: index.php?msg=20"); exit;
        }
    } 
        //UPDATE IN TBL_USERS
        $execQuery2 = mysqli_query($con, "UPDATE tbl_users SET first_name = '$fname', last_name = '$lname', email = '$email', mobile_no = '$mobile_no', birthdate = '$bday', sex = '$sex', updated_at = now() WHERE id = '$id'");

        $_SESSION["fname"] = $fname;
        $_SESSION["lname"] = $lname;
        
        $execQuery3 = mysqli_query($con, "UPDATE tbl_address SET user_id = '$id', address = '$address', barangay = '$barangay', city = '$city', province = '$province', zip = '$zipcode' WHERE user_id = '$id'");
        
        //FOR CREDENTIALS UPLOAD
        if(isset($_POST["submit"])){
            $isWorking = false;
            if($_FILES["inputPD"]["name"] != "") {  
                $file_name     = $_FILES["inputPD"]["name"];
                $file_tmp_name = $_FILES["inputPD"]["tmp_name"];
                $file_size     = $_FILES["inputPD"]["size"];
                $file_error    = $_FILES["inputPD"]["error"];
                $file_type     = $_FILES["inputPD"]["type"];
                $file_extension        = explode('.', $file_name);
                $actual_file_extension = strtolower(end($file_extension));
                $allowed_files         = array('jpg', 'jpeg', 'png');
                if(in_array($actual_file_extension, $allowed_files)){
                    if($file_error  === 0){
                        if($file_size < 10000000){
                            $target_directory = "../uploads/display_picture/";
                            $make_folder = mkdir($target_directory . $id, 0777);
                            if($make_folder){
                                $isWorking = false;
                            } else {
                                $isWorking = false;
                                $selectPicture = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$id'");
                                $fetchPicture = mysqli_fetch_assoc($selectPicture);
                                $old_profile_picture = $fetchPicture["profile_picture"];
                                unlink($target_directory.$id.'/'.$old_profile_picture);
                            }
                            $new_file_name = $id . "_" . $file_name;
                            $destination = $target_directory . $id . '/' . $new_file_name;
                            $upload = move_uploaded_file($file_tmp_name, $destination);
                            if($upload) {
                                $updateName = mysqli_query($con, "UPDATE tbl_users SET profile_picture = '$new_file_name' WHERE id = '$id'");
                                $isWorking = true;
                            }
                        } else { $isWorking = false; }
                    } else { $isWorking = false; }
                } else { $isWorking = false; }
            }
            if($_FILES["inputFile"]["name"][0] != ""){
                $total = count($_FILES["inputFile"]["name"]);
                for($i = 0; $i < $total; $i++){
                    $counterUserId = mysqli_query($con, "SELECT * FROM tbl_credentials WHERE user_id = '$id'");
                    $countedUserId = mysqli_num_rows($counterUserId);
                    $countedUserId++;
                    $file_name     = $_FILES["inputFile"]["name"][$i];
                    $file_tmp_name = $_FILES["inputFile"]["tmp_name"][$i];
                    $file_size     = $_FILES["inputFile"]["size"][$i];
                    $file_error    = $_FILES["inputFile"]["error"][$i];
                    $file_type     = $_FILES["inputFile"]["type"][$i];

                    $file_extension        = explode('.', $file_name);
                    $actual_file_extension = strtolower(end($file_extension));
                    $allowed_files         = array('jpg', 'jpeg', 'png', 'pdf');
                    if(in_array($actual_file_extension, $allowed_files)){
                        if($file_error  === 0){
                            $insertCredentials = mysqli_query($con, "INSERT INTO tbl_credentials VALUES ('', '$id', '$file_tmp_name', '$file_type', now())");
                            $credentialsId = mysqli_query($con, "SELECT * FROM tbl_credentials WHERE credentials = '$file_tmp_name'");
                            $fetchID = mysqli_fetch_assoc($credentialsId);
                            $upload_id = $fetchID["id"];
                            $target_directory = "../uploads/credentials/";
                            $make_folder = mkdir($target_directory . $id, 0777);
                            if($make_folder){
                                $isWorking = false;
                            } else {
                                $isWorking = false;
                            }
                            $destination = $target_directory . '/'. $id . '/' . $file_name;
                            $upload = move_uploaded_file($file_tmp_name, $destination);
                            if($upload) {
                                $updateName = mysqli_query($con, "UPDATE tbl_credentials SET credentials = '$file_name' WHERE id = '$upload_id'");
                                $isWorking = true;
                            }
                        } else { $isWorking = false; }
                    } else { $isWorking = false; }
                } if($isWorking == true){
                    $_SESSION["msg"] = 10;
                    header("Location: index.php"); exit;
                } else {
                    $_SESSION["msg"] = 14;
                    header("Location: index.php"); exit;
                }
            }
        }

        
        //EXECUTE QUERY CONDITIONS
        if($execQuery2){
            $_SESSION["msg"] = 10;
            header("Location: index.php"); exit;
        } else{
            $_SESSION["msg"] = 7;
            echo "<script> function returnToPreviousPage() { window.history.back(); } returnToPreviousPage(); </script>";
        } 
?>