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

	<title>Donor</title>

	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<script type="text/javascript" src="../js/script.js"></script>



</head>



<body class="">

	<?php

	include 'header.php';

	?>



	<div class="container-row donor">

        <div class="dashboard-side">

            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>

            <div class="contain">
                <li><a href="donor_home.php">Home</a></li>

            	<li><a href="donor_profile.php" >Profile</a></li>

                <li><a href="donate_blood.php" >Donate Blood</a></li>

                <li><a href="view_report.php" >View Report</a></li>

                <li><a href="#" class="active">Search Donor</a></li>

                <li><a href="donations.php">Donations</a></li>
            </div>
        </div>



        <div class="main">

        <div class="topic">Search Donor</div>

        <div class="type_check">

        <form action="donor-results.php" method="POST">

            <label for="bgroup">Enter Your Finding Blood Type:</label>

            <select id="bgroup" name="bgroup">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+ </option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            
            <select id="location" name="location">
                <option value="Ampara">Ampara</option>
                <option value="Anuradhapura">Anuradhapura</option>
                <option value="Badulla">Badulla</option>
                <option value="Batticaloa">Batticoloa</option>
                <option value="Colombo">Colombo</option>
                <option value="Galle">Galle</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Hambantota">Hambantota</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Kalutara">Kalutara</option>
                <option value="Kandy">Kandy</option>
                <option value="Kegalle">Kegalle</option>
                <option value="Kilinochchi">Kilinochchi</option>
                <option value="Kurunegala">Kurunegala</option>
                <option value="Mannar">Mannar</option>
                <option value="Matale">Matale</option>
                <option value="Matara">Matara</option>
                <option value="Monaragala">Monaragala</option>
                <option value="Mullativu">Mullativu</option>
                <option value="Nuwara Eliya">Nuwara Eliya</option>
                <option value="Polonnaruwa">Polonnaruwa</option>
                <option value="Puttalam">Puttalam</option>
                <option value="Ratnapura">Ratnapura</option>
                <option value="Trincomalee">Trincomalee</option>
                <option value="Vavniya">Vavniya</option>
           </select>
           <br><br>
           <input type="submit" value="Submit">
        </form>
        </div>

    </div>



</body>

</html>