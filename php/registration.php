<form action="handle_create_user.php" method="POST">
    <div class="row">
      <div class="col">
        <input type="text" id="fname" name="fname" placeholder="First Name">
      </div>
      <div class="col">
        <input type="text" id="lname" name="lname" placeholder="Last Name">
      </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="email" id="email" name="email" placeholder="Email">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="password" id="password1" name="password1" min="8" placeholder="Password" require>
        </div>
        <div class="col">
            <input type="password" id="password2" name="password2" min="8" placeholder="Confirm Password" require>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="number" id="mobile_no" name="mobile_no" minlength="11" maxlength="11" placeholder="Mobile Number">
        </div>
        <div class="col">
            <input type="date" id="bday" name="bday" placeholder="Birthdate">
        </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="text" id="address" name="address" placeholder="Address">
      </div>
      <div class="col">
        <input type="text" id="barangay" name="barangay" placeholder="Barangay">
      </div>
      <div class="col">
        <input type="text" id="city" name="city" placeholder="City">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="text" id="province" name="province" placeholder="Province">
      </div>
      <div class="col">
        <input type="number" id="zipcode" name="zipcode" placeholder="Zip Code">
      </div>
      <div class="col">
        <input type="text" id="country" name="country" value="Philippines">
      </div>
    </div>
    <div class="row">
        <div class="col">
            <select name="inputSex">
                <option value="" disabled selected hidden>Choose a Sex</option>
                <?php echo $sexT; ?>
            </select>
        </div>
        <div class="col">
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