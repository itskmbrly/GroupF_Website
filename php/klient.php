<div class='container p-5 my-5 border bg-white'>
    <h4 style='text-align:center'>A PLATFORM FOR ALL YOUR BEAUTY NEEDS</h4>
    <h2>Good Morning, <?php echo $fname; ?>!</h2>
    <h5>Welcome to JentleKare.</h5>
</div>";
<h6>Book your appointments now! <input type='date'></form></h6>

<div class="services-container">
    <h1>SERVICES</h1>';
    <!-- CATEGORIES OF OFFERED SERVICES -->
    <div class="column">
        <div class="card">
        <a href = "#hairServ">
        <h3>Hair Care Services</h3>
        <img src="../images/hair.jpeg" alt="Hair Services" style="width:100%"></a>
        </div>
    </div>
    <div class="column">
        <div class="card">
        <a href = "#nailServ">
        <h3>Nail Care Services</h3>
        <img src="../images/manicure.jpg" alt="Nail Services" style="width:100%"></a>
        </div>
    </div>
    <div class="column">
        <div class="card">
        <a href = "#spaServ">
        <h3>Spa Services</h3>
        <img src="../images/spa.jpg" alt="Spa Services" style="width:100%; height: 165px;"></a>
        </div>
    </div><br><br><br><br><br><br><br><br><br><br>
</div>

<!-- PLEASE REMOVE WHEN DONE: i already provided the data, pa-design nalang ajyl
services container -->
<div id='hairServ' class='wrapper'>
    <table id='hair-services'>
        <?php echo $hair_serv; ?>
    </table>
</div>
<div id='nailServ' class='wrapper'>
    <table id='nail-services'>
        <?php echo $nail_serv; ?>
    </table>
</div>
<div id='spaServ' class='wrapper'>
    <table id='spa-services'>
        <?php echo $spa_serv; ?>
    </table>
</div>
<div class="about-our-team">
    <div class="zg-left">
        <img width="250px" src="../images/aboutus.jpg">
    </div>
    <div class="zg-right content">
        <h1>About Our Team</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora id aliquam magnam quam dignissimos, corrupti ex distinctio debitis aut tenetur reiciendis veniam repudiandae qui expedita facilis, vel assumenda pariatur doloribus!</p>
    </div>
</div>