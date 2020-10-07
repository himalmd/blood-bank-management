<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$bgroup = $location = "";
$bgroup_err = $location_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

     // Validate bloodgroup
    if(empty(trim($_POST["bgroup"]))){
        $bgroup_err = "Please select a blood group";     
    } else{
        $bgroup = trim($_POST["bgroup"]);
    }

    // Validate location
    if(empty(trim($_POST["location"]))){
        $location_err = "Please enter a location.";     
    } else{
        $location = trim($_POST["location"]);
    }
    
    if(empty($bgroup_err) && empty($location_err)){
        $sql = "SELECT first_name, last_name, addressline1, addressline2, bloodgroup, telephone FROM donor WHERE bloodgroup = '$bgroup'";

        $result = mysqli_query($link, $sql);
        
        
        
    }
    
    // Close connection
    mysqli_close($link);
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
                <li><a href="index.php">Home</a></li>

            	<li><a href="donor_profile.php" >Profile</a></li>

                <li><a href="donate_blood.php" >Donate Blood</a></li>

                <li><a href="view_report.php" >View Report</a></li>

                <li><a href="#" class="active">Search Donor</a></li>

                <li><a href="donations.php">Donations</a></li>
            </div>
        </div>



        <div class="main">
            <div class="topic">Search Results</div>

            <div class="limiter">
		        <div class="container-table100">
			        <div class="wrap-table100">
        				<div class="table100 ver2 m-b-110">
        					<div class="table100-head">
        						<table>
        							<thead>
        								<tr class="row100 head">
        									<th class="cell100 column1">Name</th>
        									<th class="cell100 column2">Address</th>
        									<th class="cell100 column3">Telephone</th>
        								</tr>
        							</thead>
        						</table>
        					</div>
        
        					<div class="table100-body js-pscroll">
        						<table>
        							<tbody>
        							    <?php 
                                            if (mysqli_num_rows($result) > 0) {
                                                  // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $firstname = $row["first_name"];
                                                    $lastname = $row["last_name"];
                                                    $address = $row["addressline1"]." ".$row["addressline2"];
                                                    $telephone = $row["telephone"];
                                                    
                                                    echo "<tr class='row100 body'><td class='cell100 column1'>".$firstname." ".$lastname."</td>";
                                                    echo "<td class='cell100 column2'>".$address."</td>";
                                                    echo "<td class='cell100 column3'>".$telephone."</td></tr>";
                                                    
                                                }
                                            } else {
                                                  echo "0 results";
                                            }
                                        ?>
        							</tbody>
        						</table>
        					</div>
        				</div>
			</div>
		</div>
	        </div>
            
        </div>



</body>

</html>