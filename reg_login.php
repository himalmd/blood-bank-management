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
    // Check if username is empty
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
            $sql = "SELECT NHospitalID, UserName, Password FROM normal_hospital WHERE UserName = ?";
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
    <style>
            .tabbedPanels { width: 600px; 
                margin-top: 25px;
              }

            .panelContainer {
                clear: left;
                margin-bottom: 25px;
                border: 2px solid #ED2025;	
                background-color: #fff;
                padding: 10px;
            }

            .tabs {
                margin: 0;
                padding: 0;	
                list-style: none;	
            }

            .tabs li {
                float: left;
                width: 120px;
                padding: 0;
                margin: 0;
                text-align: center;
            }

            .tabs a {
                display: block;
                text-decoration: none;
                color: #fff;
                padding:  8px;
                margin-right: 4px;
                border: 2px solid #ED2025;
                border-top-right-radius: 5px;
                border-top-left-radius: 5px;
                background-color: #ED2025;
                margin-bottom: -2px;
            }

            .tabs a.active {
                border-bottom: 2px solid white;
                background-color: #fff;
                color: #000;
                font-weight: bold;
            }
                    
            .panel img {
                margin-top: 10px;
            }

            .panel p  {
                margin-bottom: 0px;
            }


        </style>
</head>
<body onload="openCity(event, 'Donors')">
	<?php
		require('header.php');
	?>
    
	<div class="wrapper">
		<div class="login">
            <div class="tabbedPanels">  <!-- begins the tabbed panels / wrapper-->
     
                <ul class="tabs">
                 <li><a href="#panel1">Donor</a></li>
                 <li><a href="#panel2">Requester</a></li>
                 <li><a href="#panel3">Organization</a></li>
                 <li><a href="#panel4">Hospital</a></li>
                 <li><a href="#panel5">Admin</a></li>
                </ul>
               
            <div class="panelContainer">
                <div id="panel1" class="panel">
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
                    </div> 
                </div>  <!-- end panel 1 -->
               
               
                <div id="panel2" class="panel">
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
                	</div>
                </div> <!-- end panel 2 -->
               
               
                <div id="panel3" class="panel">
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
                	</div>
                </div>  <!-- end panel 3 -->
               
                <div id="panel4" class="panel">
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
                </div>  <!-- end panel 4 -->
                
                <div id="panel5" class="panel">
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
                </div>  <!-- end panel 4 -->
               
               </div> <!-- end div class="panelContainer" or panel wrapper -->
               
            </div> <!-- ends the tabbed panels / wrapper-->
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

<script>
    $(document).ready(function() {
        
        //alert('here');
        
    $('.tabs a').click(function(){ 
    
        $('.panel').hide();
        $('.tabs a.active').removeClass('active');
        $(this).addClass('active');
        
        var panel = $(this).attr('href');
        $(panel).fadeIn(1000);
        
        return false;  // prevents link action
        
    });  // end click 

        $('.tabs li:first a').click();
        
    }); // end ready
</script>

</body>
</html>