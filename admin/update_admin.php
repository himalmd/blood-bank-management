<!DOCTYPE html>
<html>
<head>
	<title>System Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/madusanka.css">
	<script type="text/javascript" src="../js/madusanka.js"></script>
	<style>
        body {
  			background-image: url('../img/blood.jpg');
  			background-repeat: no-repeat;
  			background-attachment: fixed;  
  			background-size: cover;
			 }
    
    </style>
</head>

<body>
	<?php
	include 'header.php';
	?>

	<div class="container-row admin">
        <div class="dashboard-side">
            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
            <form method="post">
            <div class="contain">
            	<li><a href="#"class="active" >Manage Admin</a></li>
                <li><a href="manage_hospitals.php">Manage Hospitals</a></li>
                <li><a href="view_report.php">View Report</a></li>
                
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">
            <div style="text-align: center; font-weight:bold; margin-top: 30px;">Update Admin</div><br>
            <div class="reg_form" style="margin-top: 5px;" >
		    <div class="form-style-2" >
			<div class="form-style-2-heading" ></div>
            <form action="" method="post">
		            <label for="field1"><span>First Name <span class="required">*</span></span><input type="text" class="input-field" name="name1" value="" /></label>
                    <label for="field2"><span>Last Name <span class="required">*</span></span><input type="text" class="input-field" name="name2" value="" /></label>
		            <label for="field4"><span> New Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>
		            <label for="field5"><span>Comfirm Password <span class="required">*</span></span><input type="password" class="input-field" name="confirm_password" value="" /></label>

		            <label><span> </span><input type="submit" value="Submit" /></label>
                </form>
            </div>
	        </div>
            </div>
        </div>
    </div>

</body>
</html>