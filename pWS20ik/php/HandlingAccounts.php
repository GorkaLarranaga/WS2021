<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--<script src="../js/ValidateFieldsQuestion.js"></script>-->
  <!--<script src="../js/AddQuestionAjax.js"></script>
  <script src="../js/ShowQuestionsAjax.js"></script>-->
  <script src="../js/EgoeraAldatu.js"></script>
  <script src="../js/ErabEzabatu.js"></script>
  
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
	  <form  id="galderenF" name="galderenF" method="post">
		<table>
		<thead>
		<tr>
			<th>Eposta</th><th>Pasahitza</th><th>Egoera</th><th></th><th></th>
		</tr>
		</thead>
		<tbody>
		
		<?php
		
			include 'DbConfig.php';
		
			$link = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db);
			
			if ($link->connect_error) 
			{
				die("Errorea konektatzerakoan: " . $link->connect_error);
			}

			$sql_Erabil = "SELECT * FROM Erabiltzaileak";
			
			$emaitza = $link->query($sql_Erabil);
			
			while($row = $emaitza->fetch_array()){
				$erab=$row['Eposta'];
				if($row['Mota']!="admin")
				{
				echo "<tr>";
				echo "<td>".$row['Eposta']."</td>";
				echo "<td>".$row['Pasahitza']."</td>";
				echo "<td>".$row['Egoera']."</td>";
				echo "<td><input type='button' value='Egoera aldatu' id='aldatu' onclick=egoeraAldatu('".$row['Eposta']."')> </td>";
				echo "<td><input type='button' value='Ezabatu' id='ezabatu' onclick=Ezabatu('".$row['Eposta']."')> </td>";
				echo "</tr>";
				}
        }
			
		
		
		?>
			</tbody>
		</table>
	  </form>
	  </div>
	  
		<div class="center" id="erantzuna"></div>
		<div class="center" id="XMLtaula"></div>
	  
	</div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>