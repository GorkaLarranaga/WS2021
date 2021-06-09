<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--<script src="../js/ValidateFieldsQuestion.js"></script>-->
  
  <style>
			.center {
			  margin: auto;
			  width: 75%;
			  padding: 10px;
			}

			table, tr, td, th{
				text-align: left;
				padding: 10px;
			}
		</style>
  
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	  <div class="center">
	  <form  id="SignUp" name="SignUp" action="SignUp.php" method="post">
		<table>
		<tr>
			<th>*Eposta:</th><td><input type="text" name="posta" id="posta"></td>
		</tr>
		<tr>
			<th>*Erabiltzaile mota:</th><td><select id="emota" name="emota"> <option value="ikaslea">Ikaslea</option> <option value="irakaslea">Irakaslea</option> </select></td>
		</tr>
		<tr>
			<th>*Deitura:</th><td><input type="text" name="deitura" id="deitura"></td>
		</tr>
		<tr>
			<th>*Pasahitza:</th><td><input type="password" name="pass" id="pass"></td>
		</tr>
		<tr>
			<th>*Pasahitza errepikatu:</th><td><input type="password" name="pass2" id="pass2"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Bidali" id="bidali"></td> <td><input type="reset" value="Borratu"></td>
		</tr>
		</table>
	  </form>	
	  </div>
	  
    </div>
	
	<?php
	
	include 'DbConfig.php';
	
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$EPosta = ($_POST['posta']);
			$EMota = ($_POST['emota']);
			$Deitura = ($_POST['deitura']);
			$Pasahitza = ($_POST['pass']);
			$Pasahitza2 = ($_POST['pass2']);
			
			
			$erroreak="";
			
			if (strlen($Pasahitza) < 6) $erroreak = $erroreak . "Pasahitza motzegia da\\n";
			if (strlen($Pasahitza2) < 6) $erroreak = $erroreak . "Pasahitza2 motzegia da\\n";
			if ($Pasahitza!=$Pasahitza2) $erroreak = $erroreak . "Pasahitzak desberdinak dira\\n"; 
		
		
		if(!empty($erroreak)) 
		{
			echo '<script> alert("'.$erroreak.'"); </script>';
		}
		else
		{	
			include 'ClientVerifyEnrollment.php';
			
			/*---------------EZ DUT LORTU NUSOAP ONDO JOATEA-----------------------*/
			
			
			/* PASAHITZARAKO NUSOAP
			require_once('../lib/nusoap.php');
			require_once('../lib/class.wsdlcache.php');
					
			$soapclient = new nusoap_client('http://localhost//WS2021/Lab06/pWS20ik/php/VerifyPassWS.php?wsdl', true);			
			$pasahitzaOndo = $soapclient->call('egiaztatuPasahitza', array('x'=>$Pasahitza, 'y'=>1010));		*/
			
			
			
			//ClientVerifyEnrollment.php aplikazioa "" bidaltzen dit, hau da, ez dut lortu "EZ" edo "BAI"	
			//if(egiaztatuErabiltzailea($EPosta)=="BAI" && $pasahitzaOndo=="BALIOZKOA")
			//{
				$link = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db);
				if ($link->connect_error) 
				{
					die("Errorea konektatzerakoan: " . $link->connect_error);
				}

				$sql_Erabil = "INSERT INTO Erabiltzaileak (Eposta, Mota, Deitura, Pasahitza, Pasahitza2)
				VALUES ('$EPosta', '$EMota', '$Deitura', '$Pasahitza', '$Pasahitza2')";


				if (mysqli_query($link,$sql_Erabil))
				{
					echo ("Erabiltzailea sortu egin da!\n");
					echo ("<a href = LogIn.php >Logeatu</a><br />");	
				}
				else 
				{
					echo "Error: " . $sql . "<br>" . $link->error;
				}
				mysqli_close($link);
			//}
			/*else if(egiaztatuErabiltzailea($EPosta)=="EZ")
			{
				echo '<script> alert("Posta hori ez dago Web Sistemak irakasgaian matrikulaturik"); </script>';
			}
			else if($pasahitzaOndo=="BALIOGABEA")
			{
				echo '<script> alert("Pasahitza ez du balio"); </script>';
			}
			else if($pasahitzaOndo=="ZERBITZURIK GABE")
			{
				echo '<script> alert("Zerbitzurik gabe"); </script>';
			}*/
		}
		}
	?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>