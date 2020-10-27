<?php
	// Include config file
	require_once "config.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$nic = $_POST['nic'];
		$password = $_POST['password'];

		// Prepare an insert statement
        $sql = "INSERT INTO super_admin (UserName, Password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $nic;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: reg_login.php?reg=ok");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
    	mysqli_close($link);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Super Registration</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>

	<div class="form-style-2-heading">
		<h1><center>Super Admin Registration</center></h1>
	</div>

	<center>
		<div id="SuperAdmin" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Welcome Super Admin Registration!</div>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            			<div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>User Name</label>
                            <input type="text" name="nic" class="form-control">
                            
                        </div>
            			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            
                        </div>

						<label><input type="submit" name="super-admin" class="btn btn-primary" value="Register"></label>
					</form>
			</div>
		</div>
	</center>

</body>
</html>