<!DOCTYPE html>
<html>
<head>
	<title>Requester</title>
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

	<div class="container-row requester">
        <div class="dashboard-side">
            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
            <form method="post">
            <div class="contain">
                <li><a href="request_blood.php">Request Blood</a></li>
                <li><a href="search_donor.php">Search Donor</a></li>
                <li><a href="view_report.php">View Report</a></li>
                <li><a href="donations.php">Donations</a></li>
                <li><a href="#" class="active">Profile</a></li>
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">Profile</div>
        </div>
    </div>

</body>
</html>