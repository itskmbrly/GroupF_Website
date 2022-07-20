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
        $sex_id    = $fetchInfo["sex"];
        $birthdate = $fetchInfo["birthdate"];
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
        //FETTCHING SEX_TYPE
        $execQuery3 = mysqli_query($con, "SELECT * FROM tbl_sex WHERE id = '$sex_id'");

        $fetchInfo3 = mysqli_fetch_assoc($execQuery3);
        $sex        = $fetchInfo3["sex_type"];
        include_once("navbar.php"); //SIDE NAVIGATION BAR
    ?>
    
<form action="handle_edit_profile.php" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $fname; ?>">
      </div>
      <div class="col">
        <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>">
      </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="password" id="password1" name="password1" min="8" placeholder="Password" value="<?php echo $password; ?>">
        </div>
        <div class="col">
            <input type="password" id="password2" name="password2" min="8" placeholder="Confirm Password" value="<?php echo $password; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="number" id="mobile_no" name="mobile_no" minlength="11" maxlength="11" placeholder="Mobile Number" value="<?php echo $mobile_no; ?>">
        </div>
        <div class="col">
            <input type="date" id="bday" name="birthdate" placeholder="Birthdate" value="<?php echo $birthdate; ?>">
        </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="text" id="address" name="address" placeholder="Address" value="<?php echo $address; ?>">
      </div>
      <div class="col">
        <input type="text" id="barangay" name="barangay" placeholder="Barangay" value="<?php echo $barangay; ?>">
      </div>
      <div class="col">
        <input type="text" id="city" name="city" placeholder="City" value="<?php echo $city; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="text" id="province" name="province" placeholder="Province" value="<?php echo $province; ?>">
      </div>
      <div class="col">
        <input type="number" id="zipcode" name="zipcode" placeholder="Zip Code" value="<?php echo $zip; ?>">
      </div>
      <div class="col">
        <input type="text" id="country" name="country" value="Philippines">
      </div>
    </div>
    <div class="row">
        <div class="col">
            <select name="sex">
                <option value="<?php echo $sex; ?>" disabled selected hidden>Choose a Sex</option>
            </select>
        </div>
        <div class="col">
            <select name="inputRole">
                <option value="<?php echo $role_id; ?>" disabled selected hidden>Choose a Role</option>
                <?php echo $roles; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="file" class="form-control" id="fileupload1" name="inputDP">
            <i>For Display Picture</i>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="file" class="form-control" id="fileupload2" name="inputFile[]"multiple="multiple">
            <i>For Upload Credentials</i>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
    </div>
</form>