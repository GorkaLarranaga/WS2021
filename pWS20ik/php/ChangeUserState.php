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
		
			$erabiltzailea = $emaitza->fetch_assoc();
			

			if($erabiltzailea['Egoera']=="aktibo")
			{
				$link->query("UPDATE erabiltzaileak SET Egoera = 'blokeatuta' WHERE Eposta='$posta'");
			}
			else
			{
				$link->query("UPDATE erabiltzaileak SET Egoera = 'aktibo' WHERE Eposta='$posta'");
			}
			
			echo "<script>location.href='HandlingAccounts.php';</script>";
			
			echo '<script> alert("Egoera aldatua"); </script>';
		}
		else echo '<script> alert("Erabiltzaile hori ez da existitzen"); </script>';
		
		mysqli_close($link);
	
?>