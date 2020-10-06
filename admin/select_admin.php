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
                <li><a href="admin_home.php">Home</a></li>
            	<li><a href="admin_home.php" >Manage Admin</a></li>
                <li><a href="#" class="active">Manage Hospitals</a></li>
                <li><a href="view_report.php">View Report</a></li>
                
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">
            <div style="text-align: center; font-weight:bold; margin-top: 30px;">Select Admin</div><br>
            <div>
            <form action="update_admin.php" method="post">
            
            <label for="admins" style="font-size:20px;">Select a Admin</label>
            <select name="admins" id="admins">
            <option value="ad1">Admin 1</option>
            <option value="ad2">Admin 2</option>
            <option value="ad3">Admin 3</option>
            <option value="ad4">Admin 4</option>
            <option value="ad5">Admin 5</option>
            </select>
            <label><span> </span><input type="submit" value="Update" /></label>
            </form>
            </div>
            </div>
        </div>
    </div>

</body>
</html>