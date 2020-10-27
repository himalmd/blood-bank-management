<?php

     require_once "../config.php";
    //define variables
    $org_name=$district=$president=$user_name=$mobile=$password=$confirm_password=$purpose="";
    $org_err=$district_err=$president_err=$username_err=$mobile_err=$password_err=$confirm_password_err="";
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        // validate username
        if(empty(trim($_POST["username"])))
        {
            $username_err="Please enter a user name";
        }
        else
        {
            //prepare statement
            $sql="SELECT UserName FROM organization WHERE UserName=?";
            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_username);
                //set parameter
                $param_username=trim($_POST["username"]);

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows
                  
                    if(mysqli_stmt_num_rows($stmt)==1)
                    {
                        $username_err="This user name is already taken";
                    }
                    else{
                        $user_name=trim($_POST["username"]);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);


                
            }
        }
        //validation of password 
        if(empty(trim($_POST["password"])))
        {
            $password_err="Please enter password";
        }
        elseif(strlen(trim($_POST["password"])) < 6)
        {
            $password_err="Please enter valid password";
        }
        else{
            $password=trim($_POST["password"]);
        }
        //validation of confirm password
        if(empty(trim($_POST["confirm_password"])))
        {
            $confirm_password_err= "Please enter confirm password";
        }
        else
        {
            $confirm_password=trim($_POST["confirm_password"]);
            if(empty($password_err)&&($password!=$confirm_password))
            {
                $confirm_password_err="Password did not match";
            }
        }
        //validate organization name
        if(empty(trim($_POST["orgname"])))
        {
            $org_err="Please enter Organization name";
        }
        else{
            $org_name=trim($_POST["orgname"]);
        }
        //validate location
        if(empty(trim($_POST["location"])))
        {
            $district_err="Please enter the Location";
        }
        else{
            $district=trim($_POST["location"]);
        }
        
        //validate president name
        if(empty(trim($_POST["name"])))
        {
            $president_err="Please enter the President name";
        }
        else{
            $president=trim($_POST["name"]);
        }
        //validate mobile number
        if(empty(trim($_POST["mobile"])))
        {
            $mobile_err="Please enter your Telephone number";
        }
        else{
            $mobile=trim($_POST["mobile"]);
        }

        $purpose= $_POST["purpose"];
        $mobile2= $_POST["mobile2"];
         
        //check the errors before inserting database
        if(empty($username_err)&& empty($password_err) && empty($confirm_password_err) && empty($mobile_err) && empty($president_err))
        {
            //prepare insert statemet
            $sql= "INSERT INTO organization (OrganizationName, District, President, UserName, Password, Purpose) VALUES(?, ?, ?, ?, ?, ?)";

            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"ssssss",$org_name,$district,$president,$param_username,$param_password, $purpose);
                
                //set parameters
                $param_username=$user_name;
                $param_password=password_hash($password, PASSWORD_DEFAULT);


                //execute the prepare statement
                if(mysqli_stmt_execute($stmt))
                {       $sql1= "INSERT INTO organization_telephone (OrgId, TelephoneNo, Flag) VALUES ('$user_name', '$mobile', '1')";
                    if (mysqli_query($link, $sql1)){
                        if (!empty($mobile2)) {
                        $sql2= "INSERT INTO organization_telephone (OrgId, TelephoneNo, Flag) VALUES ('$user_name', '$mobile2', '0')";
                        mysqli_query($link, $sql2);
                        }
                    }else{echo "Telephone1 errors";}
                    
                    // Redirect to login page
                    header("location: ../reg_login.php?reg=ok");
                }
                else{
                    echo "Something went wrong, please try again later";
                }
                //close statement
                mysqli_stmt_close($stmt);

            }

        }
        //close db connection
        mysqli_close($link); 
       
    }

	require 'header.php';

?>

<body>
	<div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="register-form" id="register-form">
                       <center> <h2>Organization registration form</h2></center><br>
                        
                        <div class="form-group <?php echo (!empty($org_err)) ? 'has-error' : ''; ?>">
                            <label>Organization Name</label>
                            <input type="text" name="orgname" class="form-control" >
                            <span class="help-block"><?php echo $org_err; ?></span>
                        </div>  
                        <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                            <label>District</label>
                            <select id="location" name="location" class="form-control">
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
                        <div class="form-group <?php echo (!empty($president_err)) ? 'has-error' : ''; ?>">
                            <label>President Name</label>
                            <input type="text" name="name" class="form-control" >
                            <span class="help-block"><?php echo $president_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" >
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div> 
                        <div class="form-group">
                            <label>Purpose(Optional)</label>
                            <textarea name="purpose" placeholder="  please give a precise description" cols="60" rows="5"></textarea>
                        </div> 
                        <div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone</label>
                            <input type="number" name="mobile" class="form-control" >
                            <span class="help-block"><?php echo $mobile_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Telephone (Optional)</label>
                            <input type="number" name="mobile2" class="form-control" >
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