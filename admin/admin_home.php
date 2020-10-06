<!DOCTYPE html>
<html>
<head>
	<title>System Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
	<!--<style>
        body {
  			background-image: url('../img/blood.jpg');
  			background-repeat: no-repeat;
  			background-attachment: fixed;  
  			background-size: cover;
			 }
    
    </style>    -->
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
                <li><a href="#" class="active">Home</a></li>
            	<li><a href="manage_admin.php" class="active">Manage Admin</a></li>
                <li><a href="manage_hospitals.php">Manage Hospitals</a></li>
                <li><a href="view_report.php">View Report</a></li>
                
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">Manage Admin</div>
        </div>
    </div>

</body>
</html>