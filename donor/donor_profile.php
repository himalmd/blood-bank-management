<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$nic = htmlspecialchars($_SESSION["nic"]);

require_once "../config.php";
$sql = "SELECT * FROM donor WHERE nic = '$nic'";

$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $firstname = $row["first_name"];
    $lastname = $row["lastname"];
    $dob = $row["dob"];
    $bloodgroup = $row["bloodgroup"];
    $gender = $row["gender"];
    $addressline1 = $row["addressline1"];
    $addressline2 = $row["addressline2"];

  }
} else {
  echo "0 results";
}

?>



<!DOCTYPE html>

<html>

<head>

	<title>My Profile</title>

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

            <form method="post">

            <div class="contain">

                <li><a href="index.php">Home</a></li>

            	<li><a href="#" class="active">Profile</a></li>

                <li><a href="donate_blood.php">Donate Blood</a></li>

                <li><a href="view_report.php">View Report</a></li>

                <li><a href="search_donor.php">Search Donor</a></li>

                <li><a href="donations.php">Donations</a></li>

            </div>

            </form>



        </div>



        <div class="main">

            <div class="topic">Profile</div>
            
            <table>
                <tr>
                    <td>Full Name</td>
                    <td><?php echo $firstname." ".$lastname; ?></td>
                </tr>
                <tr>
                    <td>NIC</td>
                    <td><?php echo $nic; ?></td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $addressline1."<br>".$addressline2; ?></td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $gender; ?></td>
                </tr>
            </table>

        </div>

    </div>



</body>

</html>