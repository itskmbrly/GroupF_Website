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
    <div class="container p-5 my-5 border bg-white">
        <h4 style="text-align:center" class="lblTitle">A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
        <h2 class="gmorning lblGM">Good Morning, <?php echo $fname; ?>!</h2>
        <h5 class="lblWelc">Welcome to JentleKare.</h5>
    </div>
        <h6 class="bkAppoint">Book your appointments now! <input type="date"></h6>
        <!-- CATEGORIES OF OFFERED SERVICES -->
        <div class="column-ctn">
            <h1 class="lblServices">SERVICES</h1>
            <div class="column-ctn-2">
                <div class="column">
                    <div class="card">
                        <a href = "service.php#hairServ">
                        <h3>Hair Care Services</h3>
                        <img src="../images/hair.jpeg" alt="Hair Services" style="width:250px"></a>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <a href = "service.php#nailServ">
                        <h3>Nail Care Services</h3>
                        <img src="../images/manicure.jpg" alt="Nail Services" style="width:250px"></a>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <a href = "service.php#spaServ">
                        <h3>Spa Services</h3>
                        <img src="../images/spa.jpg" alt="Spa Services" style="width:250px; height:175px"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- services container -->
        <div id="hairServ" class="wrapper">
            <table id="hair-services">
                <?php $hair_serv ?>
            </table>
        </div>

        <div id="nailServ" class="wrapper">
            <table id="nail-services">
                <?php $nail_serv ?>
            </table>
        </div>

        <div id="spaServ" class="wrapper">
            <table id="spa-services">
                <?php $spa_serv ?>
            </table>
        </div>

        <!-- about our team  -->
        <div class="about-our-team">
            <h3 class="lblAbt">ABOUT OUR TEAM</h3>
            <div class="about-team-ctn">
                <div class="zg-left">
                    <img width="400px" src="../images/aboutus.jpg">
                </div>
                <div class="zg-right content">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora id aliquam magnam quam dignissimos, corrupti ex distinctio debitis aut tenetur reiciendis veniam repudiandae qui expedita facilis, vel assumenda pariatur doloribus!
                    <br>
                    <br>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora id aliquam magnam quam dignissimos, corrupti ex distinctio debitis aut tenetur reiciendis veniam repudiandae qui expedita facilis, vel assumenda pariatur doloribus!</p>
                </div>
            </div>
        </div>
    </body>
</html>