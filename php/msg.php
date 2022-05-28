<?php
    echo "<div class = 'container'>";
        if(isset($_GET["msg"])){
            if($_GET["msg"] == 1){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> First Name is Null.
                    </div>";
            } else if($_GET["msg"] == 2){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Last Name is null.
                    </div>";
            } else if($_GET["msg"] == 3){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Email is null.
                    </div>";
            } else if($_GET["msg"] == 4){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Password is null.
                    </div>";
            } else if($_GET["msg"] == 5){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Confirm Password is null.
                    </div>";
            } else if($_GET["msg"] == 6){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Mobile Number is null.
                    </div>";
            } else if($_GET["msg"] == 7){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Address is null.
                    </div>";
            } else if($_GET["msg"] == 8){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Barangay is null.
                    </div>";
            } else if($_GET["msg"] == 9){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> City is null.
                    </div>";
            } else if($_GET["msg"] == 10){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Province is null.
                    </div>";
            } else if($_GET["msg"] == 11){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Zip Code is null.
                    </div>";
            } else if($_GET["msg"] == 12){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Country is null.
                    </div>";
            } else if($_GET["msg"] == 13){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Role is null.
                    </div>";
            } else if($_GET["msg"] == 14){
                echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Login Successfully!</strong>
                    </div>";
            } else if($_GET["msg"] == 15){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        
                        <strong>Error!</strong> Invalid Password.
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>";
            } else if($_GET["msg"] == 16){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Email does not exists.
                    </div>";
            } else if($_GET["msg"] == 17){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> It looks like you've missed something. Please try again.
                    </div>";
            } else if($_GET["msg"] == 18){
                echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Welcome to Jentle Kare!</strong> You are successfully registered.
                    </div>";
            } else if($_GET["msg"] == 19){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Password does not matched.
                    </div>";
            } else if($_GET["msg"] == 20){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Duplicate Record!</strong> This user already exists.
                    </div>";
            } else if($_GET["msg"] == 21){
                echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Success!</strong> Profile Information was updated.
                    </div>";
            } else if($_GET["msg"] == 22){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Birthday is null.
                    </div>";
            } else if($_GET["msg"] == 23){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Sex is null.
                    </div>";
            } else if($_GET["msg"] == 24){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Sorry,</strong> only JPG, JPEG & PNG files are allowed.
                    </div>";
            } else if($_GET["msg"] == 25){
                echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Sucess!</strong> File/s has been uploaded.
                    </div>";
            } else if($_GET["msg"] == 26){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Something went wrong.
                    </div>";
            } else if($_GET["msg"] == 27){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Sorry, your file is too large.
                    </div>";
            } else if($_GET["msg"] == 28){
                echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Success!</strong> New user has been created.
                    </div>";
            } else if($_GET["msg"] == 29){
                echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Success!</strong> New category has been created.
                    </div>";
            } else if($_GET["msg"] == 30){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> Category is null.
                    </div>";
            } else if($_GET["msg"] == 31){
                echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Error!</strong> There's a null.
                    </div>";
            } else if($_GET["msg"] == 32){
                echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Success!</strong> New service has been created.
                    </div>";
            } else if($_GET["msg"] == 33){
                echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <strong>Successfully</strong> deleted.
                    </div>";
            }
        } 
    echo"</div>";
?>