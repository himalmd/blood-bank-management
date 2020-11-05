<?php
	
	session_start();

	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["id-5"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../reg_login.php");
    exit;
}
	
	// database connection
	require_once "../../config.php";



		$nic= $_SESSION["id-5"];
		
		//echo $nic; 
		$sql = "DELETE FROM normal_hospital WHERE UserName = ?";

		if($stmt = mysqli_prepare($link, $sql)){
			// Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $nic;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
            	 header("location: ../logout?logout=1");
            }else{
            	 echo "Oops! Something went wrong. Please try again later.";
            }

		// Close statement
        mysqli_stmt_close($stmt);
		}


	// Close connection
    mysqli_close($link);
	
	

?>