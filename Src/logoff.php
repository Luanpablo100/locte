<?php 
	session_start(); 
	session_destroy(); 
	header("Location: $host_ip/login.php"); 
	exit;
?>