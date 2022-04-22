<?php
    if(isset($_GET["msg"])){
        if($_GET["msg"] == 1){
            echo"<h3>Error! First Name is null.";
        } else if($_GET["msg"] == 2){
            echo"<h3>Error! Last Name is null.";
        } else if($_GET["msg"] == 3){
            echo"<h3>Error! Email is null.";
        } else if($_GET["msg"] == 4){
            echo"<h3>Error! Password is null.";
        } else if($_GET["msg"] == 5){
            echo"<h3>Error! Confirm Password is null.";
        } else if($_GET["msg"] == 6){
            echo"<h3>Error! Mobile Number is null.";
        } else if($_GET["msg"] == 7){
            echo"<h3>Error! Address is null.";
        } else if($_GET["msg"] == 8){
            echo"<h3>Error! Barangay is null.";
        } else if($_GET["msg"] == 9){
            echo"<h3>Error! City is null.";
        } else if($_GET["msg"] == 10){
            echo"<h3>Error! Province is null.";
        } else if($_GET["msg"] == 11){
            echo"<h3>Error! ZipCode is null.";
        } else if($_GET["msg"] == 12){
            echo"<h3>Error! Country is null.";
        } else if($_GET["msg"] == 13){
            echo"<h3>Error! Role is null.";
        } else if($_GET["msg"] == 14){
            echo"<h3>Login Successfully!";
        } else if($_GET["msg"] == 15){
            echo"<h3>Error! Invalid Password.";
        } else if($_GET["msg"] == 16){
            echo"<h3>Error! Email does not exists.";
        } else if($_GET["msg"] == 17){
            echo"<h3>An error occured, it looks like you've missed something. Please try again.";
        } else if($_GET["msg"] == 18){
            echo"<h1>Welcome to Jentle Kare!</h1>";
            echo"<h3>You are successfully registered.</h3>";
        } else if($_GET["msg"] == 19){
            echo"<h3>Password does not matched.</h3>";
        }
    } 
?>