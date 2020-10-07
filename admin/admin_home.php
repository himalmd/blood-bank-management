<!DOCTYPE html>
<html>
<head>
	<title>System Admin</title>
    <script type="text/javascript" src="../js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	
	<!--<style>
        body {
  			background-image: url('../img/blood.jpg');
  			background-repeat: no-repeat;
  			background-attachment: fixed;  
  			background-size: cover;
			 }
    
    </style>    -->
</head>

<body onload="initClock()">
	<?php
	include 'header.php';
	?>

	<div class="container-row admin">
        <div class="dashboard-side">
            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
            <form method="post">
            <div class="contain">
                <li><a href="#" class="active">Home</a></li>
            	<li><a href="manage_admin.php">Manage Admin</a></li>
                <li><a href="manage_hospitals.php">Manage Hospitals</a></li>
                <li><a href="view_report.php">View Report</a></li>
                <li><a href="admin_profile.php">Profile</a></li>
                
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">HOME</div>
            <!--digital clock start-->
                <div class="datetime">
                    <div class="date">
                        <span id="dayname">Day</span>,
                        <span id="month">Month</span>
                        <span id="daynum">00</span>,
                        <span id="year">Year</span>
                    </div>
                    <div class="time">
                        <span id="hour">00</span>:
                        <span id="minutes">00</span>:
                        <span id="seconds">00</span>
                        <span id="period">AM</span>
                    </div>
                </div>
                    <!--digital clock end-->
        </div>
    </div>

</body>
</html>