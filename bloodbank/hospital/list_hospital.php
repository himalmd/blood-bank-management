<!DOCTYPE html>
<html>
<head>
	<title>List Hospitals</title>
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

	<div class="container-row hospital">
        <div class="dashboard-side">
            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
            <form method="post">
            <div class="contain">
                <li><a href="#" class="active">Home</a></li>
            	<li><a href="hospital_profile.php">Profile</a></li>
                <li><a href="#">View Report</a></li>
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">nearest hospital to you</div>
        </div>
    </div>

</body>
</html>