<div class="w3-sidebar w3-bar-block w3-card left">
    <center><img src="../images/icon/JentleKare.png" alt="Logo" style="width: 55%"></center>
    <?php
      if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sfname = $_SESSION["fname"];
        $slname = $_SESSION["lname"];
        //REMOVE WHEN DONE: you can insert here the profile picture
        //NAME
        echo"
          <a href='profile-page.php?id=$sessId' class='w3-bar-item w3-button'><i class='fa fa-user-circle'></i> $sfname $slname</a>
        ";

        //HOME
        echo'
            <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a>
        ';

        //ADMINISTRATOR
        if($_SESSION["sess-role"] == 3){
            echo"<a href='list-users.php' class='w3-bar-item w3-button'><i class='fa fa-group'></i> List of Users</a>";
            echo"<a href='index.php' class='w3-bar-item w3-button'><i class='fa fa-cogs'></i> List of Services</a>";
            echo"<a href='create-user.php' class='w3-bar-item w3-button'><i class='fa fa-user-plus'></i> Create User</a>";
            echo"<a href='create-services.php' class='w3-bar-item w3-button'><i class='fa fa-plus-square'></i> Create Services</a>";
        }

        //LOG OUT
        echo'
          <a href="logout.php" class="w3-bar-item w3-button logout-btn"><i class="fa fa-sign-out"></i> Logout</a>
        ';
      } else{
          echo"
            <a href='index.php' class='w3-bar-item w3-button'><i class='fa fa-home'></i> Home</a>
          ";
          echo"
            <a href='sign-up-sign-in.php' class='w3-bar-item w3-button'><i class='fa fa-sign-in'></i> Sign In | Sign Up</a>
          ";
      }
    ?>
</div>