<?php
	session_start();
	// Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["id-2"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../reg_login.php");
    exit;
}

    require_once "../../config.php";

?>