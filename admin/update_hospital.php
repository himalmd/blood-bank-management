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
            	<li><a href="admin_home.php" >Manage Admin</a></li>
                <li><a href="#" class="active">Manage Hospitals</a></li>
                <li><a href="view_report.php">View Report</a></li>
                <li><a href="admin_profile.php">Profile</a></li>
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">
            <div style="text-align: center; font-weight:bold; margin-top: 30px;">Update Hospitals</div><br>
            <div class="reg_form" style="margin-top: 5px;" >
		    <div class="form-style-2" >
				<form action="" method="post">
		            <label for="field1"><span>Hospital Name <span class="required">*</span></span><input type="text" class="input-field" name="name" value="" /></label>
                    <label for="field2"><span>Hospital Id <span class="required">*</span></span><input type="text" class="input-field" name="id" value="" /></label>
                    
		            <label for="field3"><span>Admin <span class="required">*</span></span><input type="text" class="input-field" name="admin" value="" /></label>
                    <label for="field3"><span>Address<span class="required">*</span></span><input type="text" class="input-field" name="location" value="" /></label>
                    <label for="field3"><span>Telephone<span class="required">*</span></span><input type="text" class="input-field" name="mobile" value="" /></label>
                    <label for="field3"><span>Hospital Type<span class="required">*</span></span> </label>
                    <select name="levels" id="fiels4">
                        <option value="level1" >Hospitals with Blood Bank</option>
                        <option value="level2">Hospotals without Blood Bank</option>
                    </select><br><br>

		            <label><span> </span><input type="submit" value="Submit" /></label>
                </form>
            </div>
	        </div>
            </div>
        </div>
    </div>

</body>
</html>