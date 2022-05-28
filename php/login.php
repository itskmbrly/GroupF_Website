<form action="handle_login.php" method="POST">
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
            <input type="password" id="password1" name="password" min="8" placeholder="Enter your password">
        </div>
    </div>
    <div class="row">
        <input type="submit" name="btnSubmit" value="Log in" onclick="Login()">
        <a class="forgot-pass" href="#">Forgot password?</a>
    </div>
</form>