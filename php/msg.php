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
            } else if($_SESSION["msg"] == 17){
                echo"
                    <div class='alert alert-warning alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    Make sure to submit your credentials and wait five days for the approval. If the approval takes longer than expected, submit your credentials again.
                    </div>";
            } else if($_SESSION["msg"] == 18){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> User has been verified.
                    </div>";
            } else if($_SESSION["msg"] == 19){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> Declined Appointment was deleted.
                    </div>";
            } else if($_SESSION["msg"] == 20){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> The appointment was already declined.
                    </div>";
            } else if($_SESSION["msg"] == 21){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> Feedback created.
                    </div>";
            } else if($_SESSION["msg"] == 22){
                echo"
                    <div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Error!</strong> Your booking is already unavailable.
                    </div>";
            } else if($_SESSION["msg"] == 23){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> Booked date created.
                    </div>";
            } else if($_SESSION["msg"] == 24){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> Service has been updated.
                    </div>";
            } else if($_SESSION["msg"] == 25){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> Service has been deleted.
                    </div>";
            } else if($_SESSION["msg"] == 26){
                echo"
                    <div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> Appointment accepted.
                    </div>";
            }
        }
    echo"</div>";
?>  