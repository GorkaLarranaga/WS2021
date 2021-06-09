<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	
	 
	 <?php 

						include 'DbConfig.php';

						$link = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db);
						if ($link->connect_error) 
						{
						    die("Errorea konektatzerakoan: " . $link->connect_error);
						}
						$sql_Questions = "SELECT * FROM Questions";

						$ema = $link->query($sql_Questions);

						echo '<div style="margin: auto;width: 75%;padding: 10px;"><table style="text-align: left; padding: 10px;"><tr><th> Eposta </th><th> Galdera </th><th> EZuzena </th><th> 
						EOkerra1 </th><th> EOkerra2 </th><th> EOkerra3 </th><th> Zailtasuna </th><th> Gaia </th></tr>';

						if ($ema->num_rows > 0) 
						{
							while ($row = $ema->fetch_assoc()) 
							{
								echo '<tr><td>'.$row['Eposta'].'</td><td>'.$row['Galdera'].'</td>
								<td>'.$row['EZuzena'].'</td><td>'.$row['EOkerra1'].'</td><td>'.$row['EOkerra2'].'</td>
								<td>'.$row['EOkerra3'].'</td><td>'.$row['Zailtasuna'].'</td><td>'.$row['Gaia'].'</td></tr>';
							}
							echo"</table></div>";
						} 
						else 
						{
							echo "Ez dago galderarik";
						}

						
						mysqli_close($link);


					?> 
	  
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
