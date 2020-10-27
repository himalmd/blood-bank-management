<?php

// Initialize the session

session_start();

 

// Unset all of the session variables

$_SESSION = array();

 

// Destroy the session.

session_destroy();

 


// Redirect to login page

if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['logout']==1) {
	
	header("location: ../reg_login.php?key=ok");

}else{
	header("location: ../reg_login.php");
}



exit;

?>