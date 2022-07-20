<?php

  $dbhost = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "db_jk";

  $con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

  if($con){
    // echo "<h1>Connection to MySQL is successful!</h1>";
  }

  session_start();

?>