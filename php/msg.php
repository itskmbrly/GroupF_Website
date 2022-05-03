<?php
    echo "<div class = 'container'>";
        if(isset($_GET["msg"])){
            if($_GET["msg"] == 1){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> First Name is Null.
                    </div>";
            } else if($_GET["msg"] == 2){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Last Name is null.
                    </div>";
            } else if($_GET["msg"] == 3){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Email is null.
                    </div>";
            } else if($_GET["msg"] == 4){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Password is null.
                    </div>";
            } else if($_GET["msg"] == 5){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Confirm Password is null.
                    </div>";
            } else if($_GET["msg"] == 6){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Mobile Number is null.
                    </div>";
            } else if($_GET["msg"] == 7){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Address is null.
                    </div>";
            } else if($_GET["msg"] == 8){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Barangay is null.
                    </div>";
            } else if($_GET["msg"] == 9){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> City is null.
                    </div>";
            } else if($_GET["msg"] == 10){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Province is null.
                    </div>";
            } else if($_GET["msg"] == 11){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Zip Code is null.
                    </div>";
            } else if($_GET["msg"] == 12){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Country is null.
                    </div>";
            } else if($_GET["msg"] == 13){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Role is null.
                    </div>";
            } else if($_GET["msg"] == 14){
                echo"
                    <div class='alert alert-success'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Login Successfully!</strong>
                    </div>";
            } else if($_GET["msg"] == 15){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Invalid Password.
                    </div>";
            } else if($_GET["msg"] == 16){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Email does not exists.
                    </div>";
            } else if($_GET["msg"] == 17){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> It looks like you've missed something. Please try again.
                    </div>";
            } else if($_GET["msg"] == 18){
                echo"
                    <div class='alert alert-success'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Welcome to Jentle Kare!</strong> You are successfully registered.
                    </div>";
            } else if($_GET["msg"] == 19){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Error!</strong> Password does not matched.
                    </div>";
            } else if($_GET["msg"] == 20){
                echo"
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Duplicate Record!</strong> This user already exists.
                    </div>";
            } 
        } 
    echo"</div>";
?>