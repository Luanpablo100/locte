<?php 
	session_start(); 
	session_destroy(); 
	header("Location: http://localhost/locte/login.php"); 
	exit;
?>