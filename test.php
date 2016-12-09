<?php
//PHP File to test conncection to test SQL connection to server.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'dbconnect.php';
//print_r($_SESSION);

	$check_email = $conn->query("SELECT Email FROM users WHERE Email='{$_POST['email']}'");
    //print_r( $_POST);
	if ($check_email->num_rows > 0)
    {
		$pass = $conn->query("SELECT Password FROM users WHERE Email='{$_POST['email']}'");
		$pass = $pass->fetch_assoc();
	}
?>