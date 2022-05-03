<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <!-- Bootstrap 5-->
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
                <form action="handle_login.php" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="email" id="email" name="email" placeholder="Enter your email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-75">
                            <!--PLEASE REMOVE WHEN DONE: instead of using min=8, we'll use yung tinuro ni miss kyla sa js-->
                            <input type="password" id="password" name="password" min="8" placeholder="Enter your password">
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" name="btnSubmit" value="Log in">
                        <a class="forgot-pass" href="#">Forgot password?</a>
                    </div>
                </form>
                <!--SIGN IN FORM ENDS HERE-->
            </div>
            <div class="create-acct">
                <a href=""><button type="button" class="btn btn-primary create-acct-btn" data-bs-toggle="modal" data-bs-target="#myModal">Create an account</button></a>
            </div>
        </div>
        
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container-form-reg">
                        <!--SIGN UP FORM STARTS HERE-->
                        <form action="handle_registration.php" method="POST">
                            <div class="row">
                                <div class="col-25">
                                    <label for="fname">First Name</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="fname" name="fname" placeholder="Enter your First Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Last Name</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="lname" name="lname" placeholder="Enter your Last Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-75">
                                    <input type="email" id="email" name="email" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-75">
                                    <!--PLEASE REMOVE WHEN DONE: instead of using min=8, we'll use yung tinuro ni miss kyla sa js-->
                                    <input type="password" id="password1" name="password1" min="8" placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="password2">Confirm Password</label>
                                </div>
                                <div class="col-75">
                                    <!--PLEASE REMOVE WHEN DONE: instead of using min=8, we'll use yung tinuro ni miss kyla sa js-->
                                    <input type="password" id="password2" name="password2" min="8" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="mobile_no">Mobile Number</label>
                                </div>
                                <div class="col-75">
                                    <input type="number" id="mobile_no" name="mobile_no" placeholder="Enter your Mobile Number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="address">Address</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="address" name="address" placeholder="Enter your Address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="barangay">Barangay</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="barangay" name="barangay" placeholder="Enter your Barangay">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="city">City</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="city" name="city" placeholder="Enter your City">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="province">Province</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="province" name="province" placeholder="Enter your Province">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="zipcode">Zip Code</label>
                                </div>
                                <div class="col-75">
                                    <input type="number" id="zipcode" name="zipcode" placeholder="Enter your Zip Code">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="country">Country</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="country" name="country" placeholder="Enter your Country">
                                </div>
                            </div>
                            <select name="inputRole">
                                <option value="" disabled selected hidden>Choose a Role</option>
                                <?php echo $roles; ?>
                            </select>
                            <div class="row">
                                <input type="submit" name="btnSubmit" value="Submit">
                            </div>
                        </form>
                        <!--SIGN UP FORM ENDS HERE-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>