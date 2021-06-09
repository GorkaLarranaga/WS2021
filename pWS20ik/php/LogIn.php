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
	  <form  id="LogIn" name="LogIn" action="LogIn.php" method="post">
		<table>
		<tr>
			<th>Eposta:</th><td><input type="text" name="posta" id="posta"></td>
		</tr>
			<th>Pasahitza:</th><td><input type="password" name="pass" id="pass"></td>
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
			$Pasahitza = ($_POST['pass']);
			
			
			$link = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db);
			
			if ($link->connect_error) 
			{
				die("Errorea konektatzerakoan: " . $link->connect_error);
			}

			$sql_Erabil = "SELECT * FROM Erabiltzaileak WHERE Eposta='$EPosta'";
			
			$emaitza = $link->query($sql_Erabil);

			if($emaitza->num_rows != 0) {		
				$erabiltzailea = $emaitza->fetch_assoc();
				if($Pasahitza != $erabiltzailea['Pasahitza']) echo '<script> alert("Pasahitza gaizki"); </script>';
				else {
					
					session_start();
					$_SESSION['erab']=$erabiltzailea['Eposta'];
					if($erabiltzailea['Mota']=="admin")
					{
						echo "<script>location.href='HandlingAccounts.php';</script>";
					}
					else
					{
						echo "<script>location.href='HandlingQuizesAjax.php';</script>";
					}
					
					die();
				}
			}
			else echo '<script> alert("Erabiltzaile hori ez da existitzen"); </script>';

			mysqli_close($link);
		}
	
	?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>