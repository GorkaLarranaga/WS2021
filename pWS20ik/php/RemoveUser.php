<?php

		include 'DbConfig.php';
		
		$posta = $_POST['posta'];
		
		$link = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db);
			
		if ($link->connect_error) 
		{
			die("Errorea konektatzerakoan: " . $link->connect_error);
		}
		
		$sql_Erabil = "SELECT * FROM erabiltzaileak WHERE Eposta='$posta'";
		
		$emaitza = $link->query($sql_Erabil);
		
		if($emaitza->num_rows != 0) 
		{	
			$link->query("DELETE FROM erabiltzaileak WHERE Eposta='$posta'");
			
			echo '<script> alert("erab ezabatua"); </script>';
		}
		else echo '<script> alert("Erabiltzaile hori ez da existitzen"); </script>';
			
		mysqli_close($link);
	
	
?>