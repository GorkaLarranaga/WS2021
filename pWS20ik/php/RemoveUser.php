<?php


	
			$posta = $_POST['Eposta'];

			$link = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db);
			
			if ($link->connect_error) 
			{
				die("Errorea konektatzerakoan: " . $link->connect_error);
			}
			
			query($"DELETE * FROM Erabiltzaileak WHERE Eposta='$Eposta'");




?>