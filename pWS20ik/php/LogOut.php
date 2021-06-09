<?php
	session_start();
	if(!isset($_SESSION['erab'])) {
		echo "<script> window.location.href='Layout.php'; </script>";
		die();
	}

	session_unset();
	session_destroy();	
	
	echo "<script> window.location.replace('Layout.php'); </script>";
	
?>