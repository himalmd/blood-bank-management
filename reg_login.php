<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: donor/index.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nic = $password = "";
$nic_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["nic"]))){
        $nic_err = "Please enter nic.";
    } else{
        $nic = trim($_POST["nic"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($nic_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT donorid, nic, password FROM donor WHERE nic = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $nic;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $nic, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["nic"] = $nic;                            
                            
                            // Redirect user to welcome page
                            header("location: donor/index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $nic_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
<html>
<head>
	<title>Registration/Login</title>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		/* Style the tab */
		.tab {
		  overflow: hidden;
		  border: 1px solid #ccc;
		  background-color: #f1f1f1;
		}

		/* Style the buttons inside the tab */
		.tab button {
		  background-color: inherit;
		  float: left;
		  border: none;
		  outline: none;
		  cursor: pointer;
		  padding: 14px 16px;
		  transition: 0.3s;
		  font-size: 17px;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
		  background-color: #ddd;
		}

		/* Create an active/current tablink class */
		.tab button.active {
		  background-color: #ccc;
		}

		/* Style the tab content */
		.tabcontent {
		  display: none;
		  padding: 6px 12px;
		}
	</style>
</head>
<body onload="openCity(event, 'Donors')">
	<?php
		require('header.php');
	?>
	<div class="wrapper clearfix">
		<div class="login clearfix">
		<div class="tab">
		  <button class="tablinks" onclick="openCity(event, 'Donors')">Donors</button>
		  <button class="tablinks" onclick="openCity(event, 'Requesters')">Requesters</button>
		  <button class="tablinks" onclick="openCity(event, 'Organization')">Organizations</button>
		  <button class="tablinks" onclick="openCity(event, 'Hospitals')">Hospitals</button>
		  <button class="tablinks" onclick="openCity(event, 'Admins')">Admins</button>
		</div>

		<div id="Donors" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Donor Login</div>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            			<div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>NIC</label>
                            <input type="text" name="nic" class="form-control" value="<?php echo $nic; ?>">
                            <span class="help-block"><?php echo $nic_err; ?></span>
                        </div>
            			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>

						<label><span> </span><input type="submit" class="btn btn-primary" value="Login"></label>
					</form>
			</div>
		</div>

		<div id="Requesters" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Requester Login</div>
				<form action="" method="post">
					<label for="field1"><span>NIC<span class="required">*</span></span><input type="text" class="input-field" name="name" value="" /></label>
					<label for="field5"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>

					<label><span> </span><input type="submit" value="submit" /></label>
				</form>
			</div>
		</div>

		<div id="Organization" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Organization Login</div>
				<form action="" method="post">
					<label for="field1"><span>User Name<span class="required">*</span></span><input type="text" class="input-field" name="name" value="" /></label>
					<label for="field5"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>

					<label><span> </span><input type="submit" value="submit" /></label>
				</form>
			</div>
		</div>

		<div id="Hospitals" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Hospital Login</div>
				<form action="" method="post">
					<label for="field1"><span>User Name<span class="required">*</span></span><input type="text" class="input-field" name="name" value="" /></label>
					<label for="field5"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>

					<label><span> </span><input type="submit" value="submit" /></label>
				</form>
			</div>
		</div>

		<div id="Admins" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Admin Login</div>
				<form action="" method="post">
					<label for="field1"><span>NIC<span class="required">*</span></span><input type="text" class="input-field" name="name" value="" /></label>
					<label for="field5"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>

					<label><span> </span><input type="submit" value="submit" /></label>
				</form>
			</div>
		</div>

		</div><!--login-->
		<div class="register">
			<center>
				<h2>New here? Sign Up!</h2>
				<div class="donor">
					<button class="regbtn" onclick="donor_reg()">Donor</button>
				</div>
				<div class="requester">
					<button class="regbtn" onclick="requester_reg()">Requestor</button>
				</div>
				<div class="hospital"> 
					<button class="regbtn" onclick="hospital_reg()">Hospital</button>
				</div>
				<div class="organization">
					<button class="regbtn" onclick="organization_reg()">Organization</button>
				</div>
			</center>
			
		</div>

	</div><!--wrapper-->


	



<?php
require('footer.php');
?>
</body>

</html>