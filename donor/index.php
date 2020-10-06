<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>

<html>

<head>

	<title>Home</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>

</head>

<body class="">

	<?php

	require('header.php');

	?>



	<div class="container-row donor">

        <div class="dashboard-side">

            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>

            <form method="post">

            <div class="contain">

            	<li><a href="#" class="active">Home</a></li>

                <li><a href="donor_profile.php" >Profile</a></li>

                <li><a href="donate_blood.php" >Donate Blood</a></li>

                <li><a href="view_report.php" >View Report</a></li>

                <li><a href="search_donor.php" >Search Donor</a></li>

                <li><a href="#">Donations</a></li>
                
                <li><a href="logout.php" class="btn btn-danger">Log out</a></li>
            </div>

            </form>



        </div>



        <div class="main">

        <!--    <div class="topic clearfix">

            	<div class="opt_1">

            	<button onclick="add_campaign()">Create Campaign</button>

            </div>

            <div class="opt_2">

            	<button onclick="location.href='https://himal.dev/bloodbank/organization/my_campaign.php'">View My Campaign</button>

            </div>

            </div>
        -->

    <div class="page-header">
        <p>Hi, <b><?php echo htmlspecialchars($_SESSION["nic"]); ?></b>. Welcome to your dashboard!</p>
    </div>
        <h1><center>HOME</center></h1>
        <div class="descriptor clearfix">
            <div class="fd_1">
                <button onclick="donor_1()">Donate Blood</button>
            </div>
            <div class="fd_2">
                <button onclick="donor_2()">View Report</button>
            </div>
            <div class="fd_3">
                <button onclick="donor_3()">Search Donor</button>
            </div>
            <div class="fd_4">
                <button onclick="donor_4()">Donations</button>
            </div>
              
        </div>

        <div class="capable">
            <button onclick="questions()">
                <h2>Am I<br>Capable to the<br>Donation?</h2>
            </button>
            
        </div>
            

        </div>

    </div>



</body>

</html>