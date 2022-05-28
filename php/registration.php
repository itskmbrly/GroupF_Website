<form action="handle_registration.php" method="POST">
    <div class="row">
        <div class="col-25">
            <label for="fname">First Name</label>
            <!-- <span class="notifReq1" id="r3">*</span> -->
        </div>
        <div class="col-75">
            <input type="text" id="fname" name="fname" placeholder="Enter your First Name">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="lname">Last Name</label>
            <!-- <span class="notifReq1" id="r4">*</span> -->
        </div>
        <div class="col-75">
            <input type="text" id="lname" name="lname" placeholder="Enter your Last Name">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="email">Email</label>
            <!-- <span class="notifReq1" id="r1">*</span> -->
        </div>
        <div class="col-75">
            <input type="email" id="email" name="email" placeholder="Enter your email">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="password">Password</label>
            <!-- <span class="notifReq1" id="r2">*</span> -->
        </div>
        <div class="col-75">
            <!--PLEASE REMOVE WHEN DONE: instead of using min=8, we'll use yung tinuro ni miss kyla sa js-->
            <input type="password" id="password1" name="password1" min="8" placeholder="Enter Password">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="password2">Confirm Password</label>
            <!-- <span class="notifReq1" id="r7">*</span> -->
        </div>
        <div class="col-75">
            <!--PLEASE REMOVE WHEN DONE: instead of using min=8, we'll use yung tinuro ni miss kyla sa js-->
            <input type="password" id="password2" name="password2" min="8" placeholder="Confirm Password">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="mobile_no">Mobile Number</label>
            <!-- <span class="notifReq1" id="r8">*</span> -->
        </div>
        <div class="col-75">
            <input type="number" id="mobile_no" name="mobile_no" minlength="11" maxlength="11" placeholder="Enter your Mobile Number">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="mobile_no">Birthday</label>
            <!-- <span class="notifReq1" id="r8">*</span> -->
        </div>
        <div class="col-75">
            <input type="date" id="bday" name="bday">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="mobile_no">Sex</label>
            <!-- <span class="notifReq1" id="r8">*</span> -->
        </div>
        <div class="col-75">
            <select name="inputSex">
                <option value="" disabled selected hidden>Choose a Sex</option>
                <?php echo $sexT; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="address">Address</label>
            <!-- <span class="notifReq1" id="r9">*</span> -->
        </div>
        <div class="col-75">
            <input type="text" id="address" name="address" placeholder="Enter your Address">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="barangay">Barangay</label>
            <!-- <span class="notifReq1" id="r10">*</span> -->
        </div>
        <div class="col-75">
            <input type="text" id="barangay" name="barangay" placeholder="Enter your Barangay">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="city">City</label>
            <!-- <span class="notifReq1" id="r11">*</span> -->
        </div>
        <div class="col-75">
            <input type="text" id="city" name="city" placeholder="Enter your City">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="province">Province</label>
            <!-- <span class="notifReq1" id="r12">*</span> -->
        </div>
        <div class="col-75">
            <input type="text" id="province" name="province" placeholder="Enter your Province">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="zipcode">Zip Code</label>
            <!-- <span class="notifReq1" id="r13">*</span> -->
        </div>
        <div class="col-75">
            <input type="number" id="zipcode" name="zipcode" placeholder="Enter your Zip Code">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="country">Country</label>
            <!-- <span class="notifReq1" id="r14">*</span> -->
        </div>
        <div class="col-75">
            <input type="text" id="country" name="country" value="Philippines">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="role">Role Type</label>
            <!-- <span class="notifReq1" id="r8">*</span> -->
        </div>
        <div class="col-75">
            <select name="inputRole">
                <option value="" disabled selected hidden>Choose a Role</option>
                <?php echo $roles; ?>
            </select>
        </div>
    </div>
    <!-- <span class="notifReq1" id="r15">*</span> -->
    <div class="row">
        <input type="submit" name="btnSubmit" value="Submit" onclick="Register()">
    </div>
</form>