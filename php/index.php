<?php
    //CONNECTION TO THE DATABASE
    include_once("connection.php");    
    $hair_serv = '';
    $nail_serv = '';
    $spa_serv  = '';

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];

        //FETCHING THE USER'S NAME AND ROLE
        $userInfo = mysqli_query($con,  "SELECT * FROM tbl_users WHERE id = '$sessId'");
        
        while($fetchInfo = mysqli_fetch_assoc($userInfo)){
            $fname = $fetchInfo["first_name"];
            $lname = $fetchInfo["last_name"];
            $id   = $fetchInfo["id"];
        }

        //FETCHING THE LIST OF HAIR SERVICES
        $listOfHairServices = mysqli_query($con, "SELECT * FROM tbl_services WHERE category = 'Hair Care Services'");
        while ($row1 = mysqli_fetch_assoc($listOfHairServices)) {
            $hair_serv .= "<tr value='" . $row1["id"] . "'>" . $row1['service_name'] . " </tr>";
        }

        //FETCHING THE LIST OF NAIL SERVICES
        $listOfNailServices = mysqli_query($con, "SELECT * FROM tbl_services WHERE category = 'Nail Services'");
        while ($row2 = mysqli_fetch_assoc($listOfNailServices)) {
            $nail_serv .= "<tr value='" . $row2["id"] . "'>" . $row2['service_name'] . " </tr>";
        }

        //FETCHING THE LIST OF SPA SERVICES
        $listOfSpaServices = mysqli_query($con, "SELECT * FROM tbl_services WHERE category = 'Spa Services'");
        while ($row3 = mysqli_fetch_assoc($listOfSpaServices)) {
            $spa_serv .= "<tr value='" . $row3["id"] . "'>" . $row3['service_name'] . " </tr>";
        }
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--W3 School-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Shortcut Icon of Jentle Kare-->
    <link rel="shortcut icon" href="../images/JK.png">
    <!--CSS File-->
    <link rel="stylesheet" href="../css/styles.css">
    <title>Jentle Kare</title>
</head>
<body>
    <!--SIDE NAVIGATION BAR-->
    <?php include_once("navbar.php"); ?>
    <div style="margin-left:20%; background-color: #faf8e8;">
        <!--ALERT MESSAGE-->
        <?php include_once("msg.php"); ?>

        <div class="w3-container body">
            <?php 
                if($_SESSION["sess-role"] == 1){ //kraftsman
                    //REMOVE WHEN DONE: put here the welcome banner
                    echo"
                        <div class='container p-5 my-5 border bg-white'>
                            <h4 style='text-align:center'>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
                            <h2>Good Morning, $fname!</h2>
                            <h5>Welcome to JentleKare.</h5>
                        </div>";
                } else if($_SESSION["sess-role"] == 2){ //klient
                    echo"
                        <div class='container p-5 my-5 border bg-white'>
                            <h4 style='text-align:center'>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
                            <h2>Good Morning, $fname!</h2>
                            <h5>Welcome to JentleKare.</h5>
                        </div>";
                    echo"<h6>Book your appointments now! <input type='date'></form></h6>";
                    echo"<h1>SERVICES</h1>";
                    //CATEGORIES OF OFFERED SERVICES
                    echo'
                        <div class="column">
                            <div class="card">
                            <h3>Hair Care Services</h3>
                            <a href = "#hairServ"><img src="../images/hair.jpeg" alt="Hair Services" style="width:100%"></a>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                            <h3>Nail Care Services</h3>
                            <a href = "#nailServ"><img src="../images/manicure.jpg" alt="Nail Services" style="width:100%"></a>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                            <h3>Spa Services</h3>
                            <a href = "#spaServ"><img src="../images/spa.jpg" alt="Spa Services" style="width:100%; height: 165px;"></a>
                            </div>
                        </div><br><br><br><br><br><br><br><br><br><br>
                    ';
                    //PLEASE REMOVE WHEN DONE: i already provided the data, pa-design nalang ajyl
                    // echo"
                    //     <div id='hairServ' class='wrapper'>
                    //         <table id='hair-services'>
                    //             $hair_serv
                    //         </table>
                    //     </div>
                    // ";
                    // echo"
                    //     <div id='nailServ' class='wrapper'>
                    //         <table id='nail-services'>
                    //             $nail_serv
                    //         </table>
                    //     </div>
                    // ";
                    // echo"
                    //     <div id='spaServ' class='wrapper'>
                    //         <table id='spa-services'>
                    //             $spa_serv
                    //         </table>
                    //     </div>
                    // ";
                    echo'
                        <div class="about-our-team bg-white">
                            <h1>About Our Team</h1>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus dolorem fuga ipsum voluptatum, architecto ea exercitationem excepturi iure pariatur nisi ut vitae eos ex aperiam alias voluptatem molestiae quidem fugit!</p>                      
                        </div>
                    ';
                } else if($_SESSION["sess-role"] == 3){ //admin
                    echo"
                        <div class='container p-5 my-5 border bg-white'>
                            <h4 style='text-align:center'>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
                            <h2>Good Morning, $fname!</h2>
                            <h5>Welcome to JentleKare.</h5>
                        </div>";
                } else if($_SESSION["sess-role"] == 4){ //moderator
                    echo"
                        <div class='container p-5 my-5 border bg-white'>
                            <h4 style='text-align:center'>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
                            <h2>Good Morning, $fname!</h2>
                            <h5>Welcome to JentleKare.</h5>
                        </div>";

                } else{
                    echo"
                        <div class='container p-5 my-5 border bg-white'>
                            <h4 style='text-align:center'>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
                            <h2>Good Morning, Guest!</h2>
                            <h5>Welcome to JentleKare.</h5>
                        </div>";
                    echo"<h6>Book your appointments now! <input type='date'></form></h6>";
                    echo"<h3>SERVICES</h3>";
                    //CATEGORIES OF OFFERED SERVICES
                    echo'
                        <div class="column">
                            <div class="card">
                            <h3>Hair Care Services</h3>
                            <img src="../images/hair.jpeg" alt="Hair Services" style="width:100%">
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                            <h3>Nail Care Services</h3>
                            <img src="../images/manicure.jpg" alt="Nail Services" style="width:100%">
                            </div>
                        </div>
                        <div class="column">
                            <div class="card">
                            <h3>Spa Services</h3>
                            <img src="../images/spa.jpg" alt="Spa Services" style="width:100%">
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>
    
</body>
</html>