<?php 
    include_once("connection.php"); 
    $services = '';

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
      $sessId = $_SESSION["sess-id"];

      //FETCHING THE USER'S NAME AND ROLE
      $userInfo = mysqli_query($con,  "SELECT * FROM tbl_users WHERE id = '$sessId'");
      $fetchInfo = mysqli_fetch_assoc($userInfo);
      $fname = $fetchInfo["first_name"];
      $lname = $fetchInfo["last_name"];
      $id   = $fetchInfo["id"];
    }
?>
<div class="klient-container">
    <!--Banner-->
    <div class="p-3 my-3 banner text-white">
        <h2>Good Day, <?php echo $fname; ?>!</h2>
        <h3>Welcome to JentleKare.</h3>
        <i>A platform for all your beauty needs.</i>
    </div>

    <!--Categories-->
    <div class="categories">
        <div class="card img-fluid">
            <a href="#hair"><img class="card-img-top" src="../images/hair/Option 1.png" alt="Hair Category"></a>
        </div>

        <div class="card img-fluid">
            <a href="#nail"><img class="card-img-top" src="../images/nail/Option 1.png" alt="Manicure Category"></a>
        </div>

        <div class="card img-fluid">
            <a href="#spa"><img class="card-img-top" src="../images/spa/Option 1.png" alt="Spa Category"></a>
        </div>
    </div>

    <!--List of Services-->
    <!--Spa-->
    <?php include_once("list_services.php"); ?>
</div>
