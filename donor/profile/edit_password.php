<?php
	require_once "../session.php";


    $nic = $_SESSION["id-1"];

// Initialization
$old_err=$new_err=$confirm_err="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	//validate organization name
        if(empty(trim($_POST["old"])))
        {
            $old_err="Please enter the Old Password";
        }
        else{
            $password= $_POST["old"];
            $sql = "SELECT password FROM donor WHERE nic= '$nic'";
            if ($stmt = mysqli_prepare($link, $sql)) {
            	if (mysqli_stmt_execute($stmt)) {
            		mysqli_stmt_store_result($stmt);
            			if(mysqli_stmt_num_rows($stmt) == 1){
            				mysqli_stmt_bind_result($stmt, $hashed_password);
            					if(mysqli_stmt_fetch($stmt)){
            						if(password_verify($password, $hashed_password)){
            							$old=trim($_POST["old"]);
            						}else{
            							$old_err="Entered Password is not matched";
            						}
            					}
            			}else{
            				$server_err= "There is an execution problem";
            			}
            	}
            }
        }
        //validation of password 
        if(empty(trim($_POST["new"])))
        {
            $new_err="Please enter the new password";
        }
        elseif(strlen(trim($_POST["new"])) < 6)
        {
            $new_err="Please enter valid password";
        }
        else{
            $new=trim($_POST["new"]);
        }
        //validation of confirm password
        if(empty(trim($_POST["confirm"])))
        {
            $confirm_err= "Please enter the confirm password";
        }
        else
        {
            $confirm=trim($_POST["confirm"]);
            if(empty($new_err)&&($new!=$confirm))
            {
                $confirm_err="Passwords did not match";
            }
        }

        if (empty($old_err) && empty($new_err) && empty($confirm_err) && empty($server_err)) {
        	 $param_password=password_hash($new, PASSWORD_DEFAULT);
        	$sql2= "UPDATE donor SET password='$param_password' WHERE nic='$nic'";
        	if (mysqli_query($link, $sql2)) {
        		// Redirect to update page
                header("location: edit_donor?password=ok");

        	}else{echo "Something went wrong";}
        }

    }

    // Close connection
    mysqli_close($link);
?>
<?php
	require_once "../header.php";
?>
<body>
	<div class="container-row donor">
	<?php
	require_once "../dashboard.php";
	?>

	<div class="main clearfix">
		<div class="topic">
		<center>
			<form action="" method="post">
				<div class="form-group <?php echo (!empty($old_err)) ? 'has-error' : ''; ?>">
					<label>OLD PASSWORD</label>
                    <input type="password" name="old" class="form-control">
                    <span class="help-block" style="font-size: 15px;"><?php echo $old_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($new_err)) ? 'has-error' : ''; ?>">
					<label>NEW PASSWORD</label>
                    <input type="password" name="new" class="form-control">
                    <span class="help-block "style="font-size: 15px;"><?php echo $new_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($confirm_err)) ? 'has-error' : ''; ?>">
					<label>CONFIRM PASSWORD</label>
                    <input type="password" name="confirm" class="form-control">
                    <span class="help-block "style="font-size: 15px;"><?php echo $confirm_err; ?></span>
				</div>

				<input type="submit" name="Submit">
				<div style="margin-top: : -50px; ">
                <a href="edit_donor" style="color: #848484; font-size: 15px;">Cancel</a>
            </div>
			</form>
		</center>
		</div>
	</div>

	</div>

</body>