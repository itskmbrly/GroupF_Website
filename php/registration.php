<form action="handle-registration.php" method="POST" class="needs-validation" novalidate>
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="text" id="fname" name="fname" placeholder="First Name" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="text" id="lname" name="lname" placeholder="Last Name" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>  
    <div class="input-group mb-3">
        <div class="form-group fg">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div> 
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="password" name="password1" min="8" placeholder="Password" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="password" name="password2" min="8" placeholder="Confirm Password" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="number" name="mobile_no" minlength="11" maxlength="11" placeholder="Mobile Number" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="date" name="bday" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="text" name="address" placeholder="Address" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="text" name="barangay" placeholder="Barangay" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="text" name="city" placeholder="City" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="text" name="province" placeholder="Province" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="number" name="zipcode" placeholder="Zip Code" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="text" name="country" value="Philippines" class="form-control" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="form-group">
            <select name="inputSex" class="custom-select" required >
                <option value="" disabled selected hidden>Choose a Sex</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <select name="inputRole"  class="custom-select" required >
                <option value="" disabled selected hidden>Choose a Role</option>
                <?php echo $roles; ?>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required><p style="font-size: 12px;">I accept the terms and conditions and I have read the <a href="#">privacy policy</a></p>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
    <input type="submit" value="Submit">
</form>