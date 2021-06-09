<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--<script src="../js/ValidateFieldsQuestion.js"></script>-->
  <script src="../js/AddQuestionAjax.js"></script>
  <script src="../js/ShowQuestionsAjax.js"></script>
  
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
		<tr>
			<th>*Eposta:</th><td><input type="text" name="posta" id="posta"></td>
		</tr>
		<tr>
			<th>*Galdera:</th><td><textarea  name="galdera" id="galdera" rows="4" cols="25"></textarea></td>
		</tr>
		<tr>
			<th>*Erantzun zuzena:</th><td><input type="text" name="ezuzena" id="ezuzena"></td>
		</tr>
		<tr>
			<th>*Erantzun okerra 1:</th><td><input type="text" name="eokerra1" id="eokerra1"></td>
		</tr>
		<tr>
			<th>*Erantzun okerra 2:</th><td><input type="text" name="eokerra2" id="eokerra2"></td>
		</tr>
		<tr>
			<th>*Erantzun okerra 3:</th><td><input type="text" name="eokerra3" id="eokerra3"></td>
		</tr>
		<tr>
			<th>*Zailtasuna:</th><td><select id="zailtasuna" name="zailtasuna"> <option value="txikia">Txikia</option> <option value="ertaina">Ertaina</option> <option value="handia">Handia</option> </select></td>
		</tr>
		<tr>
			<th>*Galderaren gaia:</th><td><input type="text" name="gaia" id="gaia"></td>
		</tr>
		<tr>
			<td><input type="button" value="Bidali" id="bidali"></td> <td><input type="reset" value="Borratu"></td>
		</tr>
		<tr>
			<td><input type="button" value="XMLikusi" id="XMLikusi"></td> 
		</tr>
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