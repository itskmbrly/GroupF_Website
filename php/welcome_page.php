<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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

        //SELECT QUERY FOR ROLE TYPES
        $execQuery = mysqli_query($con, "SELECT * FROM tbl_role_types");
        $roles = "";

        //FETCHING DATA FOR ROLE TYPES
        while($row = mysqli_fetch_assoc($execQuery)) {
            $roles .= "<option value='".$row["id"]."'>".$row['role_type']."</option>";
        }

    ?>
    <!--END OF PROCESS-->

    <!--PLEASE REMOVE WHEN DONE: pakiayos nalang ajyl ha. Papalitan nalang mga ininput kong basic design, need ko lang makita yung structure ng maayos rn hihihoho-->

    <!--PLEASE REMOVE WHEN DONE: include the side navigation bar here, mag include_once kana lang ajyl para mas clean-->
    <!--SIDE NAVIGATION STARTS HERE-->
    
    <!--SIDE NAVIGATION ENDS HERE-->
    <!--PLEASE REMOVE WHEN DONE: cinenter ko muna ajyl ha, pwede mo naman ng tanggalin yung <center></center> once na ieedit mo na to-->
    <!--PLEASE REMOVE WHEN DONE: yung form ajyl, naka pop up ha, thank you-->
    <center>
    <div class="container-form">
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
                <input type="submit" name="btnSubmit" value="Submit">
            </div>
        </form>
        <!--SIGN IN FORM ENDS HERE-->
    </div>
    <div class="container-form">
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
    </center>
    
</body>
</html>