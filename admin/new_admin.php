<!DOCTYPE html>
<html>
<head>
	<title>System Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
	
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
                <li><a href="admin_home.php">Home</a></li>
            	<li><a href="manage_admin.php" class="active">Manage Admin</a></li>
                <li><a href="manage_hospitals.php" >Manage Hospitals</a></li>
                <li><a href="view_report.php">View Report</a></li>
                <li><a href="admin_profile.php">Profile</a></li>
                
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">
            <div style="text-align: center; font-weight:bold; margin-top: 30px;">Add New Admin</div><br>
            <div class="reg_form" style="margin-top: 5px;" >
		    <div class="form-style-2" >
			<div class="form-style-2-heading" ></div>
				<form action="" method="post">
		            <label for="field1"><span>First Name <span class="required">*</span></span><input type="text" class="input-field" name="name1" value="" /></label>
                    <label for="field2"><span>Last Name <span class="required">*</span></span><input type="text" class="input-field" name="name2" value="" /></label>
                    <label for="field3"><span>Admin Level<span class="required">*</span></span> </label>
                    <select name="levels" id="fiels3">
                        <option value="level1" >Level 1</option>
                        <option value="level2">Level 2</option>
                        <option value="level3">Level 3</option>
                    </select><br><br>
		            <label for="field4"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="" /></label>
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