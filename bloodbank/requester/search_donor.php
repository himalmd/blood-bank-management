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
                <li><a href="#" class="active">Donations</a></li>
                <li><a href="requester_profile.php">Profile</a></li>
            </div>
            </form>

        </div>

        <div class="main">
        <div class="topic">Search Donor</div>
        <div class="type_check">
        <form action="/action_page.php">
            <label for="cars">Enter Your Finding Blood Type:</label>
            <select id="cars" name="cars">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+ </option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
           </select>
           <br><br>
           <input type="submit" value="Submit">
           
        </form>
         </div>
    </div>

</body>
</html>