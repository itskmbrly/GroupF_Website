<div class="w3-sidebar w3-bar-block w3-card navbarr" style="width:20%; background-color: #CB8F8D;">
  <!--LOGO-->
  <center><img src="../images/JentleKare.png" alt="Logo" style="width: 55%"></center>
    <?php
      if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        //REMOVE WHEN DONE: you can insert here the profile picture
        //NAME
        echo"
          <a href='profile_page.php?id=$id' class='w3-bar-item w3-button userName'> $fname $lname</a>
        ";
        //HOME
        echo'
          <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a>
        ';

        // MY APPOINTMENTS
        if($_SESSION["sess-role"] == 1 || $_SESSION["sess-role"] == 2){
          echo"<a href='appointments.php' class='w3-bar-item w3-button'><i class='fa fa-calendar'></i> My Appointments</a>";
        }
        //MY FAVORITES
        if($_SESSION["sess-role"] == 2){
          echo"<a href='favorites.php' class='w3-bar-item w3-button'><i class='fa fa-heart'></i> My Favorites</a>";
        }
        //LOG OUT
        //PLEASE REMOVE WHEN DONE: pakibaba nalang ajyl katulad ng nasa wireframe natin
        echo'
          <a href="logout.php" class="w3-bar-item w3-button logout-btn"></i>Logout</a>
        ';
      } else{
          echo'
            <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a>
          ';
      }
    ?>
</div>