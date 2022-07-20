<?php 
    echo"<div class='container'>";
        if(isset($_SESSION["msg"])){
            if($_SESSION["msg"] == 1){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Login Successfully.
                    </div>";
            } else if($_SESSION["msg"] == 2){
                echo"
                    <div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Error!</strong> Invalid Password.
                    </div>";
            } else if($_SESSION["msg"] == 3){
                echo"
                    <div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry,</strong> we don't recognize this email.
                    </div>";
            } else if($_SESSION["msg"] == 4){
                echo"
                    <div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry,</strong> email already exists.
                    </div>";
            } else if($_SESSION["msg"] == 5){
                echo"
                    <div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry,</strong> mobile number already exists.
                    </div>";
            } else if($_SESSION["msg"] == 6){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Welcome to Jentle Kare!</strong> You are successfully registered.
                    </div>";
            } else if($_SESSION["msg"] == 7){
                echo"
                    <div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Error!</strong> It looks like you've missed something. Please try again.
                    </div>";
            } else if($_SESSION["msg"] == 8){
                echo"
                    <div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Error!</strong> Password does not matched.
                    </div>";
            } else if($_SESSION["msg"] == 9){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> New service has been created.
                    </div>";
            } else if($_SESSION["msg"] == 10){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Profile has been updated.
                    </div>";
            } else if($_SESSION["msg"] == 11){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Password updated.
                    </div>";
            } else if($_SESSION["msg"] == 12){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> User Deleted.
                    </div>";
            } else if($_SESSION["msg"] == 13){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> User created.
                    </div>";
            } else if($_SESSION["msg"] == 14){
                echo"
                    <div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Error!</strong> An error was detected. Please try again.
                    </div>";
            } else if($_SESSION["msg"] == 15){
                echo"
                    <div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Error!</strong> Users aged 18 and below are not allowed to register here.
                    </div>";
            } else if($_SESSION["msg"] == 16){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> Service has been added.
                    </div>";
            } 
        }
    echo"</div>";
?>  