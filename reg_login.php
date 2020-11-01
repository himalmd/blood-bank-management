<?php

 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["id-1"]) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: donor/index");
  exit;
}
if(isset($_SESSION["id-2"]) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: requester/index.php");
  exit;
}
if(isset($_SESSION["id-4"]) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: organization/index");
  exit;
}
if(isset($_SESSION["id-5"]) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: hospital/index");
  exit;
}
if(isset($_SESSION["id-3"]) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: bank_admin/index");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nic = $password = $name= "";
$nic_err = $password_err = "";
 
// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if($_POST['donor'] || $_POST['requester'] || $_POST['admins']){

    // Check if NIC is empty
        if(empty(trim($_POST["nic"]))){
            $nic_err = "Please enter nic.";
        }else{
            $nic = trim($_POST["nic"]);
            $id_card= $nic;
        }

    }else{
    //Check if username is empty"
        if(empty(trim($_POST["username"]))){
            $nic_err = "Please enter username.";
        }else{
            $nic = trim($_POST["username"]);
        }

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
        if($_POST['donor']) {
            $sql = "SELECT nic, first_name, password FROM donor WHERE nic = ?";
        }elseif ($_POST['requester']) {
            $sql = "SELECT NIC, FirstName, Password FROM requestor WHERE NIC = ?";
        }elseif($_POST['admins']){
            $sql = "SELECT BloodBankID, FirstName, Password FROM blood_bank_admin WHERE NIC = ?";
        }elseif($_POST['organization']) {
            $sql = "SELECT UserName, OrganizationName, Password FROM organization WHERE UserName = ?";
        }elseif($_POST['hospital']){
            $sql = "SELECT UserName, Name, Password FROM normal_hospital WHERE UserName = ?";
        }else{
            #
        }
       
        
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
                            $_SESSION["nic"] = $nic;                           
                            
                            // Redirect user to welcome page
                            if($_POST['donor']){
                                $_SESSION["id-1"] = $id;
                                $_SESSION["id_card"] = $id_card;
                                header("location: donor/index");
                            }elseif ($_POST['requester']) {
                                $_SESSION["id-2"] = $id;
                                $_SESSION["id_card2"] = $id_card;
                                header("location: requester/index.php");
                            }elseif ($_POST['admins']) {
                                $_SESSION["id-3"] = $id;
                                $_SESSION["id_card3"] = $id_card;
                                header("location: bank_admin/index");
                            }elseif ($_POST['organization']) {
                                $_SESSION["id-4"] = $id;
                                header("location: organization/index");
                            }elseif ($_POST['hospital']) {
                                $_SESSION["id-5"] = $id; 
                                header("location: hospital/index");
                            }else{
                                #
                            }
                            
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

    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['key']=="ok") {
        $del= "Succesfully Deleted !!!";
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['reg']=="ok") {
        $reg= "Succesfully Created !!!";
    }

?>




<!DOCTYPE html>
<html>
<head>
	<title>Registration/Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
		  padding: 14px 23px;
		  transition: 0.3s;
		  font-size: 17px;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
		  background-color: #ddd;
		}

		/* Create an active/current tablink class */
		.tab button.active {
		  background-color: #ff8500;
		}

		/* Style the tab content */
		.tabcontent {
		  display: none;
		  padding: 6px 16px;
		}
	</style>
</head>
<body onload="openCity(event, 'Donors')">
	<?php
		require('header.php');
	?>
    
	<div class="wrapper">
		<div class="login">
		<div class="tab">
		  <button class="tablinks active" onclick="openCity(event, 'Donors')" id = 'lol'>Donors</button>
		  <button class="tablinks" onclick="openCity(event, 'Requesters')">Requesters</button>
		  <button class="tablinks" onclick="openCity(event, 'Organization')">Organizations</button>
		  <button class="tablinks" onclick="openCity(event, 'Hospitals')">Hospitals</button>
		  <button class="tablinks" onclick="openCity(event, 'Admins')">Admins</button>
		</div>
        
        <?php
        echo '<p style="color:red; text-align:center;">'.$del.'</p>';
        echo '<p style="color:green; text-align:center;">'.$reg.'</p>';
        ?>

		<div id="Donors" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Donor Login</div>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        			<div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                        <label>NIC</label>
                        <input type="text" name="nic" class="form-control">
                        <span class="help-block "><?php echo $nic_err; ?></span>
                    </div>
        			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="help-block "><?php echo $password_err; ?></span>
                    </div>

					<label><input type="submit" name="donor" class="btn btn-primary" value="Login"></label>
				</form>
				<a href="reset/enter_email.php?type=donor">Forgot Password?</a>
			</div>
		</div>

		<div id="Requesters" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Requester Login</div>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            			<div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>NIC</label>
                            <input type="text" name="nic" class="form-control">
                            <span class="help-block "><?php echo $nic_err; ?></span>
                        </div>
            			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block "><?php echo $password_err; ?></span>
                        </div>

						<label><input type="submit" name="requester" class="btn btn-primary" value="Login"></label>
				</form>
				<a href="reset/enter_email.php">Forgot Password?</a>
			</div>
		</div>

		<div id="Organization" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Organization Login</div>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            			<div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $nic; ?>">
                            <span class="help-block"><?php echo $nic_err; ?></span>
                        </div>
            			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>

						<label><input type="submit" name="organization" class="btn btn-primary" value="Login"></label>
				</form>
				<a href="reset/enter_email.php">Forgot Password?</a>
			</div>
		</div>

		<div id="Hospitals" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Hospital Login</div>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            			<div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $nic; ?>">
                            <span class="help-block"><?php echo $nic_err; ?></span>
                        </div>
            			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>

						<label><input type="submit" name="hospital" class="btn btn-primary" value="Login"></label>
				</form>
			</div>
		</div>

		<div id="Admins" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Admin Login</div>
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

						<label><input type="submit" name="admins" class="btn btn-primary" value="Login"></label>
				</form>
			</div>
		</div>

		</div>

		<div class="register">
		    <h2 class="center">New here? Sign Up!</h2>
		    <div class="tile-container">
                    <a href="donor/register.php">
                        <div class="tile">
                            <p class="title">Blood Donors</p>
                        </div>
                    </a>
                    <a href="requester/signup.php">
                    <div class="tile">
                        <p class="title">Blood Requesters</p>
                    </div>
                    </a>
                    <a href="hospital/registration.php">
                    <div class="tile">
                        <p class="title">Hospitals</p>
                    </div>
                    </a>
                    <a href="organization/signup.php">
                    <div class="tile">
                        <p class="title">Organizations</p>
                    </div>
                    </a>
            </div>
</div>
	</div><!--wrapper-->


	




</body>
</html>