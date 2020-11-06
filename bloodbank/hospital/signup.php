<?php
    $hos_err=$address_err=$district_err=$dr_err=$username_err=$mobile_err=$password_err=$confirm_password_err=$email_err="";
    if($_SERVER['REQUEST_METHOD']=="GET")
    {
        if (isset($_GET['hos'])) {$hos_err=$_GET['hos'];}
        if (isset($_GET['add'])) {$address_err=$_GET['add'];}
        if (isset($_GET['dis'])) {$district_err=$_GET['dis'];}
        if (isset($_GET['dr'])) {$dr_err=$_GET['dr'];}
        if (isset($_GET['user'])) {$username_err=$_GET['user'];}
        if (isset($_GET['mobi'])) {$mobile_err=$_GET['mobi'];}
        if (isset($_GET['pass'])) {$password_err=$_GET['pass'];}
        if (isset($_GET['compass'])) {$confirm_password_err=$_GET['compass'];}
        if (isset($_GET['mail'])) {$email_err=$_GET['mail'];}

    }
?>
<?php
    require 'header.php';
?>

<body>
	<div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <form action="application/signup.php" method="post" class="register-form" id="register-form">
                       <center> <h2><a href="https://himal.dev/bloodbank/hospital/signup">Hospital registration form</a></h2></center><br>
                        
                        <div class="form-group <?php echo (!empty($hos_err)) ? 'has-error' : ''; ?>"> 
                            <label>Hospital Name</label>
                            <input type="text" name="hosname" class="form-control">
                            <span class="help-block"><?php echo $hos_err; ?></span>
                        </div>  
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control">
                            <span class="help-block"><?php echo $address_err; ?></span>
                        </div> 
                        <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                            <label>District</label>
                            <select id="location" name="district" class="form-control">
                                <option value=""></option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticoloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullativu">Mullativu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavniya">Vavniya</option>
                            </select>
                            <span class="help-block"><?php echo $district_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($dr_err)) ? 'has-error' : ''; ?>">
                            <label>Cheif Doctor Name</label>
                            <input type="text" name="drname" class="form-control">
                            <span class="help-block"><?php echo $dr_err; ?></span>
                        </div> 
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                            <span class="help-block"><?php echo $email_err; ?></span>
                        </div> 
                        <div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone</label>
                            <input type="text" name="mobile" class="form-control">
                            <span class="help-block"><?php echo $mobile_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Telephone (Optional)</label>
                            <input type="text" name="mobile2" class="form-control">
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                    
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <input type="reset" class="btn btn-default" value="Reset">
                        </div>
                        <p>Already have an account? <a href="../reg_login.php" style="color: #F78181">Login here</a>.</p>
                    </form>
                </div>
            </div>
        </div>
	
</body>

</html>