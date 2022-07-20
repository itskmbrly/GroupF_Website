<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--W3 School-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--CSS FILE-->
    <link rel="stylesheet" href="../css/login-register.css">    
    <!--Shortcut Icon of Jentle Kare-->
    <link rel="shortcut icon" href="../images/icon/JK.png">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <title>Jentle Kare</title>
</head>
<body>
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
    <div class="container">
        <div class="container-form">
            <?php
                //ALERT MESSAGE
                include_once("msg.php");
            ?>
            <div class="row">
                <div class="col-sm-4 left">
                    <div class="brand">
                        <b>Jentle Kare</b>
                    </div>
                    <h3>Sign In</h3>
                    <p>Book your appointments!</p>
                    <form action="handle-login.php" method="POST" class="needs-validation" novalidate>
                        <div class="form-group fg">
                            <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group fg">
                            <input type="password" name="password" min="8" placeholder="Enter your password" class="form-control" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                            <a href="#"><i  class="fg-pass">Forgot Password?</i></a>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="col-sm-8 right">
                    <h3>Sign Up</h3>
                    <p>It's quick and easy!</p>
                    <?php include_once("registration.php"); ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // Disable form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
</script>
</html>