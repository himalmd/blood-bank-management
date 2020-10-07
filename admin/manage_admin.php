
<!DOCTYPE html>
<html>
<head>
	<title>System Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
	<!--<style>
        body {
  			background-repeat: no-repeat;
  			background-attachment: fixed;  
  			background-size: cover;
			 }
    
    </style> -->
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
            	<li><a href="manage_admin.php" class="active">Manage Admin</a></li>
                <li><a href="manage_hospitals.php">Manage Hospitals</a></li>
                <li><a href="view_report.php">View Report</a></li>
                <li><a href="admin_profile.php">Profile</a></li>
                
            </div>
            </form>

        </div>

        <div class="main">
            <div class="topic">
            <div style="text-align: center; font-weight:bold; margin-top: 30px;">Manage Admins</div><br>
                <form action="" method="post">
                    <div class="content">
                         <li><a href="new_admin.php" >Add New Admin</a></li>
                        <li><a href="select_admin.php">Update Admin info</a></li>

                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>

</body>
</html>
