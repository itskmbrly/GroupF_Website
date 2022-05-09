<div class="w3-sidebar w3-bar-block w3-card" style="width:20%; background-color: #8c615f;">
  <!--LOGO-->
  <center><img src="../images/JentleKare.png" alt="Logo" style="width: 55%"></center>
    <!--REMOVE WHEN DONE: you can insert here the profile picture-->
    <!--NAME OF THE USER-->
    <a href="profile_page.php?id=<?php echo $id; ?>" class="w3-bar-item w3-button"><?php echo $fname; echo " ".$lname; ?></a>
    <!--HOME-->
    <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a>
    <!--MY APPOINTMENTS-->
    <a href="appointments.php" class="w3-bar-item w3-button"><i class="fa fa-calendar"></i> My Appointments</a>
    <!--MY FAVORITES-->
    <a href="favorites.php" class="w3-bar-item w3-button"><i class="fa fa-heart"></i> My Favorites</a>
    <!--LOG OUT-->
    <!--PLEASE REMOVE WHEN DONE: pakibaba nalang ajyl katulad ng nasa wireframe natin-->
    <a href="logout.php" class="w3-bar-item w3-button"></i>Logout</a>
</div>