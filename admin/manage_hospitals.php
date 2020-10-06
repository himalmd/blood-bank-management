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
                
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">
            <div style="text-align: center; font-weight:bold; margin-top: 30px;">Manage Hospitals</div><br>
                <form action="" method="post">
                    <div class="content">
                        <li><a href="new_hospital.php">Add New Hospitals</a></li>
                        <li><a href="select_hospital.php">Update Hospital info</a></li>

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>