<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body onload="initClock()">
	<?php
		require 'header.php';
	?>
	<div class="container-row admin">
        <div class="dashboard-side">
            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
            <form method="post">
            <div class="contain">
            	<li><a href="#" class="active">Home</a></li>
            	<li><a href="manage_donors.php">Manage Donor</a></li>
            	<li><a href="manage_campaigns.php">Manage Campaign</a></li>
            	<li><a href="manage_organizations.php">Manage Organization</a></li>
            	<li><a href="manage_stock.php">Manage Blood Stock</a></li>
                <li><a href="donor_registration.php">Donor Registration</a></li>
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