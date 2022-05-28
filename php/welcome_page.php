<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Shortcut Icon of Jentle Kare-->
    <link rel="shortcut icon" href="../images/JK.png">
    <!--CSS File-->
    <link rel="stylesheet" href="../css/styles.css">
    <title>Jentle Kare</title>
</head>

<body>
    <!--PROCESS TO BE DYNAMICALLY REFLECTED ON THE SYSTEM-->
    <?php
    //CONNECTIVITY TO THE DATABASE
    include_once("connection.php");
    //ALERT MESSAGES
    include_once("msg.php");
    //SELECT QUERY FOR ROLE TYPES
    $execQuery = mysqli_query($con, "SELECT * FROM tbl_role_types WHERE id NOT IN(3, 4)");
    $roles = "";

    //FETCHING DATA FOR ROLE TYPES
    while ($row = mysqli_fetch_assoc($execQuery)) {
        $roles .= "<option value='" . $row["id"] . "'>" . $row['role_type'] . "</option>";
    }

    //SELECT QUERY FOR SEX TYPE
    $execQuery2 = mysqli_query($con, "SELECT * FROM tbl_sex");
    $sexT = "";
    //FETCHING DATA FOR SEX TYPE
    while ($row2 = mysqli_fetch_assoc($execQuery2)) {
        $sexT .= "<option value='" . $row2["id"] . "'>" . $row2['sex_type'] . "</option>";
    }

    ?>
    <!--END OF PROCESS-->

    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../images/hair.jpeg" alt="Hair Care" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../images/manicure.jpg" alt="Nail Care" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="../images/spa.jpg" alt="Spa" class="d-block" style="width:100%">
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="container-form">
            <!-- <div class="opaque"> -->
            <div class="sign-up">
                <!--SIGN IN FORM STARTS HERE-->
                <?php include_once("login.php"); ?>
                <!--SIGN IN FORM ENDS HERE-->
            </div>
            <div class="create-acct">
                <button type="button" class="btn btn-primary create-acct-btn" data-bs-toggle="modal" data-bs-target="#myModal">Create an account</button>
            </div>
        </div>
        
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container-form-reg">
                        <!--SIGN UP FORM STARTS HERE-->
                        <?php include_once("registration.php"); ?>
                        <!--SIGN UP FORM ENDS HERE-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="welcome_page.js"></script>
</html>