<!DOCTYPE html>
<html>
<head>
	<title>Search Donors</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<script type="text/javascript" src="../js/script.js"></script>

</head>
<body>
	<?php
	include 'header.php';
	?>

	<div class="container-row donor">

        <div class="dashboard-side">

            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>

            <form method="post">

            <div class="contain">
                <li><a href="requester_home.php">Home</a></li>

                <li><a href="#" class="active">Search Donor</a></li>

                <li><a href="donations.php">Donations</a></li>

                <li><a href="requester_profile.php" >Profile</a></li>

            </div>

            </form>



        </div>



        <div class="main">

        <div class="topic">Search Donor</div>

        <div class="type_check">

        <form action="/search_donor.php">

            <label for="group">Enter Your Finding Blood Type:</label>

            <select id="group" name="group">

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

           <div class="">
               <input type="submit" value="Submit">
           </div>

           

        </form>

         </div>
         <div class="filter">
             <form action="/search_donor.php">

            <label for="group">filter:</label>

            <select id="dist" name="dist">

                <option value="Gampaha">Gampaha</option>

                <option value="Colombo">Colombo</option>

                <option value="Galle">Galle</option>

                <option value="Kurunegala">Kurunegala</option>

                <option value="Anuradhpura">Anuradhpura </option>

                <option value="Nuwara Eliya">Nuwara Eliya</option>

                <option value="Hambanthota">Hambanthota</option>

                <option value="Jaffna">Jaffna</option>

           </select>
            </form>
         </div>

        </div>

    </div>


</body>
</html>