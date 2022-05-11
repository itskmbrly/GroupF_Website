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
    
    <?php 
        //CONNECTION TO THE DATABASE
        include_once("connection.php");

        //GET ID
        $id = $_GET["id"];

        //FETCHING ALL THE INFORMATION OF THE USER TO DISPLAY
        $execQuery = mysqli_query($con, "SELECT * FROM tbl_users WHERE id = '$id'");

        $fetchInfo = mysqli_fetch_assoc($execQuery);
        $fname     = $fetchInfo["first_name"];
        $lname     = $fetchInfo["last_name"];
        $email     = $fetchInfo["email"];
        $password  = $fetchInfo["password"];
        $mobile_no = $fetchInfo["mobile_no"];
        $address_id= $fetchInfo["address_id"];
        $role_id   = $fetchInfo["role_id"]; 
        //FETCHING ALL THE INFORMATION UNDER THE ADDRESS ID OF THE USER
        $execQuery2 = mysqli_query($con, "SELECT * FROM tbl_address WHERE id = '$address_id'");
        
        $fetchInfo2 = mysqli_fetch_assoc($execQuery2);
        $address    = $fetchInfo2["address"];
        $barangay   = $fetchInfo2["barangay"];
        $city       = $fetchInfo2["city"];
        $province   = $fetchInfo2["province"];
        $zip        = $fetchInfo2["zip"];
        include_once("navbar.php"); //SIDE NAVIGATION BAR
    ?>
    
    <div style="margin-left:20%; background-color: #faf8e8;">
        <?php include_once("msg.php"); //ALERT MESSAGES ?>
        <div class="w3-container body edit-profile-container">
            <form action="handle_edit_profile.php" method="POST">
                <div class="mb-3 mt-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" value="<?php echo $fname; ?>" name="fname">
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" value=<?php echo $lname; ?> name="lname">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value=<?php echo $email; ?> name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pwd1" value=<?php echo $password; ?> name="password1">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="pwd2" value=<?php echo $password; ?> name="password2">
                </div>
                <div class="mb-3">
                    <label for="m_no" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control" id="m_no" value=<?php echo $mobile_no; ?> name="mobile_no">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" value=<?php echo $address; ?> name="address">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Barangay</label>
                    <input type="text" class="form-control" id="pwd" value=<?php echo $barangay; ?> name="barangay">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" value=<?php echo $city; ?> name="city">
                </div>
                <div class="mb-3">
                    <label for="province" class="form-label">Province</label>
                    <input type="text" class="form-control" id="province" value=<?php echo $province; ?> name="province">
                </div>
                <div class="mb-3">
                    <label for="zipcode" class="form-label">Zip Code</label>
                    <input type="number" class="form-control" id="zipcode" value=<?php echo $zip; ?> name="zipcode">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </form>
        </div>
    </div>
</body>
</html>