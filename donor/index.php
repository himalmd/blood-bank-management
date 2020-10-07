<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php

	require('header.php');

?>


<body>
	<div class="container-row donor">
        <div class="dashboard-side">
            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
            <div class="contain">
            	<li><a href="#" class="active">Home</a></li>
                <li><a href="donor_profile.php" >Profile</a></li>
                <li><a href="donate_blood.php" >Donate Blood</a></li>
                <li><a href="view_report.php" >View Report</a></li>
                <li><a href="search_donor.php" >Search Donor</a></li>
                <li><a href="#">Donations</a></li>
                <li><a href="logout.php">Log out</a></li>
            </div>
        </div>
        <div class="main">
            <div class="page-header">
                <p class="greeting">Hi, <b><?php echo htmlspecialchars($_SESSION["nic"]); ?></b>. Welcome to your dashboard!</p>
            </div>
            <div class="tile-container">
                <a href="#">
                    <div class="tile">
                        <h3>Donate Blood</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                    </div>
                </a>
                <a href="#">
                <div class="tile">
                    <h3>View Report</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                </div>
                </a>
                <a href="#">
                <div class="tile">
                    <h3>Search Donor</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                </div>
                </a>
                <a href="#">
                <div class="tile">
                    <h3>Donations</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                </div>
                </a>
            </div>
            
            
<!--            
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
            
-->            
        </div>
    </div>
</body>

</html>