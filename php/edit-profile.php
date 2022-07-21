<?php 
    //CONNECTION TO THE DATABASE
    include_once("connection.php");

    if(isset($_SESSION["sess-role"]) && $_SESSION["sess-role"] != ""){
        $sessId = $_SESSION["sess-id"];
    }

    $role = '';
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
    $sex       = $fetchInfo["sex"];
    $birthdate = $fetchInfo["birthdate"];
    $address_id= $fetchInfo["address_id"];
    $role_id   = $fetchInfo["role_id"];
    $verified  = $fetchInfo["verified"]; 

    if($role_id == 1){
        $role = "Kraftsman";
    } else if($role_id == 2){
        $role = "Klient";
    } else if($role_id == 3){
        $role = "Administrator";
    } else if($role_id == 4){
        $role = "Moderator";
    }
    //FETCHING ALL THE INFORMATION UNDER THE ADDRESS ID OF THE USER
    $execQuery2 = mysqli_query($con, "SELECT * FROM tbl_address WHERE id = '$address_id'");

    $fetchInfo2 = mysqli_fetch_assoc($execQuery2);
    $address    = $fetchInfo2["address"];
    $barangay   = $fetchInfo2["barangay"];
    $city       = $fetchInfo2["city"];
    $province   = $fetchInfo2["province"];
    $zip        = $fetchInfo2["zip"];
?>
<form action="handle-edit-profile.php" method="POST" enctype="multipart/form-data" class="needs-validation form-edit" novalidate>
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="text" id="fname" name="fname" placeholder="First Name" class="form-control" value="<?php echo $fname; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="text" id="lname" name="lname" placeholder="Last Name" class="form-control" value="<?php echo $lname; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>  
    <div class="input-group mb-3">
        <div class="form-group fg">
            <input type="email" class="form-control" value="<?php echo $email; ?>" name="email" placeholder="Email" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div> 
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="number" name="mobile_no" minlength="11" maxlength="11" placeholder="Mobile Number" class="form-control" value="<?php echo $mobile_no; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="date" name="bday" class="form-control" value="<?php echo $birthdate; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="text" name="address" placeholder="Address" class="form-control" value="<?php echo $address; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="text" name="barangay" placeholder="Barangay" class="form-control" value="<?php echo $barangay; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="text" name="city" placeholder="City" class="form-control" value="<?php echo $city; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="text" name="province" placeholder="Province" class="form-control" value="<?php echo $province; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="form-group">
            <input type="number" name="zipcode" placeholder="Zip Code" class="form-control" value="<?php echo $zip; ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <input type="text" name="country" value="Philippines" class="form-control" value="Philippines" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="form-group">
            <select name="inputSex" class="form-control" required >
                <option value="" disabled selected hidden>Choose a Sex</option>
                <option value="Male" <?php if( $sex == 'Male') { echo "selected='selected'"; } ?>>Male</option>
                <option value="Female" <?php if( $sex == 'Female') { echo "selected='selected'"; } ?>>Female</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <select name="inputRole"  class="form-control" required >
                <option value="<?php echo $role_id; ?>"><?php echo $role; ?></option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div>
    <?php
        if (isset($_SESSION["sess-role"])){
            echo"
                <div class='custom-file mb-3'>
                    <input type='file' class='custom-file-input' id='fileupload1' name='inputPD' accept='.png, .jpeg, .jpg'><label class='custom-file-label' for='customFile'>Choose file to upload for your display picture</label>
                </div>
            ";
        } if ($verified == 0) {
            echo "
                <div class='custom-file mb-3'>
                    <input type='file' class='custom-file-input' id='customFile' name='inputFile[]' multiple='multiple' accept='.pdf, .png, .jpeg, .jpg'><label class='custom-file-label' for='customFile'>Choose file to upload for your verification</label>
                </div>
            ";
        }
    ?>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="Submit" name="submit">
</form>
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

    //script for file input
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>