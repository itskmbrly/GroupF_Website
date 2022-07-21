<?php 
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];
  
        //FETCHING THE USER'S NAME AND ROLE
        $userInfo = mysqli_query($con,  "SELECT * FROM tbl_users WHERE id = '$sessId'");
        $fetchInfo = mysqli_fetch_assoc($userInfo);
        $fname = $fetchInfo["first_name"];
        $lname = $fetchInfo["last_name"];
        $id   = $fetchInfo["id"];

    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--W3 School-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--CSS FILE-->
    <link rel="stylesheet" href="../css/style.css">    
    <!--Shortcut Icon of Jentle Kare-->
    <link rel="shortcut icon" href="../images/icon/JK.png">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zhi+Mang+Xing&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ranga&display=swap" rel="stylesheet">
    <title>Jentle Kare</title>
</head>
<body>
    <?php include_once("navbar.php"); ?>    
    <div class="right">

        <div class="w3-container lu-container">
           <!-- TABLE - LIST OF USERS -->
            <div class='container mt-3'>
                <h2>List of Users</h2>           
                <table class='table' id='listOfUsers'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Role</th>
                            <th>Verified</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <?php
                        //FETCHING ALL THE DATA INSIDE THE TABLE USERS
                        $execGetUsers = mysqli_query($con, "SELECT * FROM tbl_users ORDER BY last_name");

                        while($listOfUsers = mysqli_fetch_assoc($execGetUsers)){
                            $user_id  = $listOfUsers["id"];
                            $fname    = "`".$listOfUsers["first_name"]."`";
                            $lname    = "`".$listOfUsers["last_name"]."`";
                            $email    = $listOfUsers["email"];
                            $mobile_no= $listOfUsers["mobile_no"];
                            $role_id  = $listOfUsers["role_id"];
                            $verified = $listOfUsers["verified"];

                            if($role_id == 1){
                                $role_id = "Kraftsman";
                            } else if($role_id == 2){
                                $role_id = "Klient";
                            } else if($role_id == 3){
                                $role_id = "Admin";
                            } else if($role_id == 4){
                                $role_id = "Moderator";
                            }


                            if($verified == 0){
                                $verified = "No";
                            } else{
                                $verified = "Yes";
                            }

                            echo"
                                <tbody>
                                    <tr>
                                        <td>".str_replace('`', '', $lname).", ".str_replace('`', '', $fname)."</td>
                                        <td>$email</td>
                                        <td>$mobile_no</td>
                                        <td>$role_id</td>
                                        <td>$verified</td>
                                        <td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal3' onclick='javascript: deleteUser(".$user_id.", ".$lname.", ".$fname.")'>Delete</button></td>
                                    </tr>        
                                </tbody>
                            ";
                        }
                    ?>
                </table>
            </div>
            <!-- The Modal - Delete User -->
            <div class="modal fade" id="myModal3">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title delete-user-modal-header"></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <h4>Are you sure you want to delete this user?</h4>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class='btn btn-success'><a class="delete-user-modal-link" href=''>Yes</a></button>
                            <button class='btn btn-danger'><a href='list-users.php'>No</a></button>
                        </div>

                    </div>
                </div>
            </div> 
        </div>
  </div>
</body>
<script>
    function deleteUser(id, lname, fname){
        var p = document.getElementsByClassName("delete-user-modal-header");
        p[0].innerHTML = "Edit - "+ lname + ", " + fname;
        var c = document.getElementsByClassName("delete-user-modal-link");
        c[0].setAttribute('href', 'handle-user-delete.php?id='+id);
    }
</script>
</html>