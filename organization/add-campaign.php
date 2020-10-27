<?php
	session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["id-4"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../reg_login.php");
    exit;
}

	// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$name = $location = $estimate= $date =$time= $hosid="";
$name_err = $location_err = $estimate_err= $date_err = $time_err= $hosid_err="";

$today=date("Y-m-d");

// queries
    $sql = "SELECT HospitalID, Name, District FROM blood_bank_hospital";
    $result = mysqli_query($link, $sql);

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// Check if hosid is empty
    if(empty(trim($_POST["hosid"]))){
        $hosid_err = "Please enter your blood bank hospital ID from the given table.";
    }else{
     	//prepare statement
            $sql="SELECT Name FROM blood_bank_hospital WHERE HospitalID=?";
            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_id);
                //set parameter
                $param_id=trim($_POST["hosid"]);

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows
                  
                    if(mysqli_stmt_num_rows($stmt)==0)
                    {
                        $hosid_err="There is no such a Hospital. please check the table again";
                    }
                    else{
                        $hosid=trim($_POST["hosid"]);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);
				}   
	
		}



	// Check if campaign name is empty
    if(empty(trim($_POST["campaign_name"]))){
        $name_err = "Please enter your campaign name.";
    } else{
        $name = trim($_POST["campaign_name"]);
    }
    // Check if location is empty
    if(empty(trim($_POST["location"]))){
        $location_err = "Please enter your location.";
    } else{
        $location = trim($_POST["location"]);
    }
    // Check if estimation is empty
    if(empty(trim($_POST["estimate"]))){
        $estimate_err = "Please enter your estimation roughly.";
    } else{
        $estimate = trim($_POST["estimate"]);
    }
    // Check if date is empty
    if(empty(trim($_POST["date"]))){
        $date_err = "Please enter your date.";
    }else{
        $date = trim($_POST["date"]);
    }
    // Check if time is empty
    if(empty(trim($_POST["time"]))){
        $time_err = "Please enter your time.";
    } else{
        $time = trim($_POST["time"]);
    }

    //check the errors before inserting database
        if(empty($hosid_err)&& empty($name_err) && empty($location_err) && empty($estimate_err) && empty($date_err) && empty($time_err)){
        	//prepare insert statemet
            $sql= "INSERT INTO campaign (Name, Location, Estimate, Dates, Tme, BHospitalID, OrganizationID) VALUES(?, ?, ?, ?, ?, ?, ?)";

            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"sssssss",$name,$location,$estimate,$date,$time, $hosid, $param_username);
                
                //set parameters
                $param_username=$_SESSION["id-4"];

                //execute the prepare statement
                if(mysqli_stmt_execute($stmt))
                {
                    // Redirect to login page
                    header("location: index?reg=ok");
                }
                else{
                    echo "Something went wrong, please try again later";
                }
                //close statement
                mysqli_stmt_close($stmt);

            }
        }


	// Close connection
    mysqli_close($link);
}


?>


<?php

	require 'header.php';
?>
<body >

	<div class="container">
		<div class="signup-content" >
			<div style="float: left;">
				<form action="" method="post" class="campaign_reg_form" id="register-form">
					<center> <h2><b>Provide Your Campaign Information</b></h2></center><br><br>
					<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
						<label>Campaign Name</label>
						<input type="text" name="campaign_name" class="form-control">
					</div>

					<div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
						<label>Location</label>
						<input type="text" name="location" class="form-control">
					</div>

					<div class="form-group <?php echo (!empty($hosid_err)) ? 'has-error' : ''; ?>">
						<label>Hospital ID</label>
						<input type="number" name="hosid" class="form-control" placeholder="select your hospital id (H-ID) from the table">
                        <span class="help-block "><?php echo $hosid_err; ?></span>
					</div>

					<div class="form-group <?php echo (!empty($estimate_err)) ? 'has-error' : ''; ?>">
						<label>Estimation</label>
						<input type="text" name="estimate" class="form-control">
					</div>

					<div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
						<label>Date</label>
						<input type="date" name="date" min="<?php echo($today);?>" class="form-control">
					</div>
					<div class="form-group <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
						<label>Time</label>
						<input type="time" name="time" class="form-control">
					</div>
					<center><p style="color: #DF01D7;">Please check the details whether exactly correct !!!</p></center>

					<div class="form-group">
                        <center><input type="submit" class="btn btn-primary" value="Submit"></center>
                    </div>

                    <div class="form-group">
                    	<center><a href="index" style="color: #848484; font-weight: bold;">Back to Home</a></center>
                	</div>
				</form>
					
			</div>
			<div style="float: right; width: 100%;">
				<center><h2>Blood Bank Hospital List in Srilanka</h2></center>
				<div class="container-table200">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column6">H-ID</th>
                            <th class="cell100 column7">Hospital Name</th>
                            <th class="cell100 column8">District</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table200-body">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
    
                                    $id = $row["HospitalID"];
                                    $hosname = $row["Name"];
                                    $district = $row["District"];

                                echo "<tr class='row100 body'><td class='cell100 column6'style=\" line-height : 3;\">".$id."</td>";
                                echo "<td class='cell100 column7'>".$hosname."</td>";
                                echo "<td class='cell100 column8'>".$district."</td></tr>";
                                }
                                
                            ?>
                        
                        </table>
                    </div>
                    
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>

</body>

</html>