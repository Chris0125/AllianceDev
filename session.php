<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'dbconnect.php';
session_start();

print_r($_SESSION);
//$_SESSION["cart"] = "(1,1) (1,2)";


?>