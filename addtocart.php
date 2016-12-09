<?php 
//PHP file to be called to add book to session
session_start();

if(isset($_POST['cart']))
{
	if( strlen($_SESSION['cart']) == 0)
		$_SESSION['cart'] = $_POST['cart'];
	else
		$_SESSION['cart'] = $_SESSION['cart']. " " .$_POST['cart'];
}

