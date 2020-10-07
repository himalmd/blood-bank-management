<!DOCTYPE html>
<html>
<head>
	<title>Manage Organizations</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	<?php
		require('header.php');
	?>

	<div class="container-row admin">
        <div class="dashboard-side">
            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
            <form method="post">
            <div class="contain">
            	<li><a href="admin_home.php">Home</a></li>
            	<li><a href="manage_donors.php" >Manage Donor</a></li>
            	<li><a href="manage_campaigns.php">Manage Campaign</a></li>
            	<li><a href="manage_organizations.php" class="active">Manage Organization</a></li>
            	<li><a href="manage_stock.php">Manage Blood Stock</a></li>
                <li><a href="donor_registration.php">Donor Registration</a></li>
                <li><a href="admin_profile.php">Profile</a></li>
                
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">Manage Organization</div>
        </div>
    </div>

</body>
</html>