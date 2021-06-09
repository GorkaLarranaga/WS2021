<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
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
	  <form  id="galderenF" name="galderenF" action="AddQuestion.php" method="post">
		<table>
			<thead>
				<tr>
					<th>Egilea</th><th>Galderaren enuntziatua</th><th>Erantzun zuzena</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$fitxategia= new SimpleXMLElement('../xml/Questions.xml', null, true);

				foreach($fitxategia->assessmentItem as $fitxategia) 
				{
					echo "<tr>";
						echo "<td>" .$fitxategia['author']."</td>";
						echo "<td>" .$fitxategia->itemBody->p."</td>";
						echo "<td>" .$fitxategia->correctResponse->response."</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	  </form>	
	  </div>
	  
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
