<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nic = $password = $confirm_password = $first_name = $last_name = $dob = $bgroup = $gender = $addline1 = $addline2 = "";
$nic_err = $password_err = $confirm_password_err = $first_name_err = $last_name_err = $dob_err = $bgroup_err = $gender_err = $addline1_err = $addline2_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["nic"]))){
        $nic_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT donorid FROM donor WHERE nic = ?";
        
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
                    $nic = trim($_POST["nic"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
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
        $first_name_err = "Please enter a first name.";     
    } else{
        $first_name = trim($_POST["first_name"]);
    }

    // Validate lastname
    if(empty(trim($_POST["last_name"]))){
        $last_name_err = "Please enter a last name.";     
    } else{
        $last_name = trim($_POST["last_name"]);
    }

    // Validate dob
    if(empty(trim($_POST["dob"]))){
        $dob_err = "Please enter a dob.";     
    } else{
        $dob = trim($_POST["dob"]);
    }

    // Validate blood group
    if(empty(trim($_POST["bgroup"]))){
        $bgroup_err = "Please enter a blood group.";     
    } else{
        $bgroup = trim($_POST["bgroup"]);
    }

    // Validate Gender
    if(empty(trim($_POST["gender"]))){
        $gender_err = "Please enter your gender.";     
    } else{
        $gender = trim($_POST["gender"]);
    }

    // Validate Address
    if(empty(trim($_POST["addline1"]))){
        $addline1_err = "Please enter your address";     
    } else{
        $addline1 = trim($_POST["addline1"]);
    }

    // Validate Address 2
    $addline2 = trim($_POST["addline2"]);
    
    // Check input errors before inserting in database
    if(empty($nic_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO donor (nic, password, first_name, last_name, dob, bloodgroup, gender, addressline1, addressline2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_username, $param_password, $first_name, $last_name, $dob, $bgroup, $gender, $addline1, $addline2);
            
            // Set parameters
            $param_username = $nic;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="nic" class="form-control" value="<?php echo $nic; ?>">
                <span class="help-block"><?php echo $nic_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
                <span class="help-block"><?php echo $first_name_err; ?></span>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
                <span class="help-block"><?php echo $last_name_err; ?></span>
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>">
                <span class="help-block"><?php echo $dob_err; ?></span>
            </div>
            <div class="form-group">
                <label>Blood Group</label>
                <select id="bgroup" name="bgroup" class="form-control" value="<?php echo $bgroup; ?>">
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <span class="help-block"><?php echo $bgroup_err; ?></span>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select id="gender" name="gender" class="form-control" value="<?php echo $gender; ?>">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <span class="help-block"><?php echo $gender_err; ?></span>
            </div>
            <div class="form-group">
                <label>Address Line 1</label>
                <input type="text" name="addline1" class="form-control" value="<?php echo $addline1; ?>">
                <span class="help-block"><?php echo $addline1_err; ?></span>
            </div>
            <div class="form-group">
                <label>Address Line 2 (Optional)</label>
                <input type="text" name="addline2" class="form-control" value="<?php echo $addline2; ?>">
                <span class="help-block"><?php echo $addline2_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>