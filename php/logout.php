<?php

  session_start();

  session_destroy(); // this destroys all initialized / declared session variables

  header("Location: welcome_page.php");
?>