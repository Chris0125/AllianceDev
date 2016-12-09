<?php
//Logouts by destroying session
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'dbconnect.php';
session_start();

session_unset();
session_destroy();

//print_r($_SESSION);
//$_SESSION["cart"] = "";
header("Location: index.php");

?>