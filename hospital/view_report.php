<!DOCTYPE html>
<html>
<head>
	<title>View Report</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale-1.0">
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
	require('header.php');
	?>

	<div class="container-row hospital">
        <div class="dashboard-side">
            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
            <div class="contain">
                <li><a href="list_hospital.php">Home</a></li>
                <li><a href="hospital_profile.php">Profile</a></li>
                <li><a href="#"  class="active ">View Report</a></li>
            </div>

        </div>

        <div class="column main">
            <div class="topic">REPORT</div>
        </div>
    </div>

</body>
</html>