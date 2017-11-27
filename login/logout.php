<?php
	session_start();
	
	include("includes/vSession.php");
	include("includes/debut.php");

	
	session_destroy();
	
	header("Location:index.php");

?>

