<?php

  $dbhost = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "db_jentle_kare";

  $con = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

  if($con){
    //echo "<h1>Connection to MySQL is successful!</h1>";
  }

  session_start();

?>
