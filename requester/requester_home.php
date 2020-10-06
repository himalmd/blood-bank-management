<!DOCTYPE html>
<html>
<head>
	<title>Requester Home</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	<?php
	include('header.php');
	?>
	<div class="container-row donor">

        <div class="dashboard-side">

            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>

            <form method="post">

            <div class="contain">

            	<li><a href="#" class="active">Home</a></li>
            	
                <li><a href="search_donor.php">Search Donor</a></li>

                <li><a href="donations.php">Donations</a></li>

                <li><a href="profile.php" >Profile</a></li>

            </div>

            </form>



        </div>



        <div class="main">

            	 <div class="topic clearfix">

            	<div class="opt_1">

            	<button onclick="req_1()">Search Donors</button>

            </div>

            <div class="opt_2">

            	<button onclick="location.href='https://himal.dev/bloodbank/requester/donations.php'">Donations</button>

            </div>

            </div>

            



        </div>

    </div>

</body>
</html>