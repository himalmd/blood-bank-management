<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<?php
	include 'header.php';
?>
<?php
	$nic_err=$password_err="";
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (isset($_GET['nic'])) {
			$nic_err= $_GET['nic'];
		}
		if (isset($_GET['pass'])) {
			$password_err= $_GET['pass'];
		}
	}
?>
<body>
	<div class="form-style-2-heading">
		<h1><center>Admin Login</center></h1>
	</div>

	<center>
		<div id="SuperAdmin" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Welcome Blood Bank Admin !</div>
					<form action="application/reg_login.php" method="post">
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

						<label><input type="submit" name="admins" class="btn btn-primary" value="Login"></label><br>
						
					</form>
					<a href="../reset/enter_email.php?type=admin">Forgot Password?</a>
			</div>
			<a href="../reg_login">Cancel</a>
		</div>
	</center>

</body>