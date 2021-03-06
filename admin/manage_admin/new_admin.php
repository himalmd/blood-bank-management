
<?php

    require '../session.php';
    require '../header.php';
    
    // Define variables and initialize with empty values
    $nic = $password = $first_name=$last_name=$confirm_password=$hosid=$email= "";
    $nic_err = $password_err = $first_name_err = $last_name_err = $confirm_password_err = $hosid_err = $email_err="";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validate nic /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if(empty(trim($_POST["nic"]))){
        $nic_err = "Please enter an NIC.";
    
    }elseif (strlen(trim($_POST["nic"])) > 12) {
        $nic_err = "Your NIC is not Valid.";
        
    }else{
        // Prepare a select statement 
        $sql = "SELECT BAdminID FROM blood_bank_admin WHERE NIC = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["nic"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $nic_err = "This username is already taken.";
                } else{
                    $temp = trim($_POST["nic"]);
                    $nic =  strtoupper($temp);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

    }
        // Validate Hos ID /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if(empty(trim($_POST["hosid"]))){
         $hosid_err = "enter an Hospital ID.";
    }else{
        // Prepare a select statement 
        $sql2 = "SELECT Name FROM blood_bank_hospital WHERE HospitalID = ?";
        
        if($stmt2 = mysqli_prepare($link, $sql2)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt2, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["hosid"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt2)){
                /* store result */
                mysqli_stmt_store_result($stmt2);
                
                if(mysqli_stmt_num_rows($stmt2) == 0){
                    $hosid_err = "No Such a Hospital.";
                } else{
                    $hosid = trim($_POST["hosid"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt2);
        }
    }    

    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate firstname
    if(empty(trim($_POST["first_name"]))){
        $first_name_err = " enter a first name.";     
    } else{
        $first_name = trim($_POST["first_name"]);
    }

     // Validate Email
    if(empty(trim($_POST["email"]))){
        $email_err = " enter your email";     
    } else{
        $email = trim($_POST["email"]);
    }

    // Validate lastname
    if(empty(trim($_POST["last_name"]))){
        $last_name_err = " enter a last name.";     
    } else{
        $last_name = trim($_POST["last_name"]);
    }
    
    // Check input errors before inserting in database
    if(empty($nic_err) && empty($password_err) && empty($confirm_password_err) && empty($first_name_err) && empty($last_name_err) && empty($hosid_err) && empty($email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO blood_bank_admin (NIC, Password, FirstName, LastName, BloodBankID, Email) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $first_name, $last_name, $hosid, $email);
            
            // Set parameters
            $param_username = $nic;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index?reg=ok");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
    
    }

?>

<body>
	
	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>
        <div class="main clearfix">
            <div class="topic">
            <div class="form-style-2-heading">Add New Admin</div><br>
            

            <form action="" method="post">
                    <div class="form-row">
                            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control">
                                <span class="help-block "><?php echo $first_name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                                <span class="help-block "><?php echo $last_name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($hosid_err)) ? 'has-error' : ''; ?>">
                                <label>Hospital ID</label>
                                <input type="number" name="hosid">
                                <span class="help-block "><?php echo $hosid_err; ?></span>
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>NIC</label>
                            <input type="text" name="nic">
                             
                          </div>
                          <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email">
                            
                          </div>
                    </div>
        
                    <div class="form-row">
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                <span class="help-block "><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control">
                                <span class="help-block "><?php echo $confirm_password_err; ?></span>
                            </div>
                    </div>
                          

                    <center><input type="submit" class="btn btn-primary" value="Submit"></center>

            </form>
          

            </div>

            <div style="float: right; margin-top: -275px; margin-right: 20px;" class="clearfix">
                <button onclick="blood_bank_list()">Hospital IDs</button>
            </div>    
        </div>
    </div>

</body>
</html>
                
