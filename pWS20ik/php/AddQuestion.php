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


				if($_SERVER['REQUEST_METHOD']=='POST')
				{
					$EPosta = ($_POST['posta']);
					$EZuzena = ($_POST['ezuzena']);
					$Galdera = ($_POST['galdera']);
					$EOkerra1 = ($_POST['eokerra1']);
					$EOkerra2 = ($_POST['eokerra2']);
					$EOkerra3 = ($_POST['eokerra3']);
					$Zailtasun = ($_POST['zailtasuna']);
					$Gaia = ($_POST['gaia']);


		$erroreak = "";
		
		$regex='/^[a-zA-Z]{3,}[0-9]{3}@(ikasle[.]){0,1}ehu.(eus|es)$/';
		
		if(!preg_match($regex,$EPosta))
		{
			$erroreak = $erroreak . "Eposta gaizki dago idatzita\\n";
		}
		
		if (empty($Galdera)) $erroreak = $erroreak . "Galderaren hutsik dago\\n";
		else if (strlen($Galdera) < 10) $erroreak = $erroreak . "Galderaren motzegia da\\n";
		if (empty($EZuzena)) $erroreak = $erroreak . "Erantzun zuzena hutsik dago\\n";
		if (empty($EOkerra1)) $erroreak = $erroreak . "Erantzun okerra1 hutsik dago\\n";
		if (empty($EOkerra2)) $erroreak = $erroreak . "Erantzun okerra2 hutsik dago\\n";
		if (empty($EOkerra3)) $erroreak = $erroreak . "Erantzun okerra3 hutsik dago\\n";
		if (empty($Gaia)) $erroreak = $erroreak . "Gaia hutsik dago\\n";
		
		if($Zailtasun=='txikia') $Zail=1;
		else if($Zailtasun=='ertaina') $Zail=2;
		else $Zail=3;
		
		
		
		if (!empty($erroreak)) 
		{
			echo '<script> alert("'.$erroreak.'"); </script>';
			echo("Saiatu galdera berriro sartzen: <a href='QuestionForm.php'>Galderak</a>");
		}
		else
		{		
					$link = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db);
					if ($link->connect_error) 
					{
					    die("Errorea konektatzerakoan: " . $link->connect_error);
					}

					$sql_Questions = "INSERT INTO questions (Eposta, Galdera, EZuzena, EOkerra1, EOkerra2, EOkerra3, Zailtasuna, Gaia)
					VALUES ('$EPosta', '$Galdera', '$EZuzena', '$EOkerra1', '$EOkerra2', '$EOkerra3', '$Zail', '$Gaia')";


                    if (mysqli_query($link,$sql_Questions))
					{
					    echo ("Galdera gorde egin da!\n");
						echo ("<a href = showQuestions.php >Galdera guztiak ikusi</a><br />");	
					}
					else 
					{
					    echo "Error: " . $sql . "<br>" . $link->error;
						echo ("<a href = QuestionForm.php > Errorea, saiatu berriro</a><br />");	
					}

					mysqli_close($link);
					
					
					$fitxategia = simplexml_load_file("../xml/Questions.xml");
					
					if(!$fitxategia)
					{
							echo '<script> alert("xml fitxategia ez da kargatu"); </script>';
					}
	
					$assessmentItem = $fitxategia->addChild('assessmentItem');
					$assessmentItem->addAttribute('author', $EPosta);
					$assessmentItem->addAttribute('subject', $Gaia);
					
					$itemBody = $assessmentItem->addChild('itemBody');
					$itemBody->addChild('p', $Galdera);
					$correctResponse = $assessmentItem->addChild('correctResponse');
					$correctResponse->addChild('response', $EZuzena);
					$incorrectResponses = $assessmentItem->addChild('incorrectResponses');
					$incorrectResponses->addChild('response', $EOkerra1);
					$incorrectResponses->addChild('response', $EOkerra2);
					$incorrectResponses->addChild('response', $EOkerra3);
						
					$fitxategia->asXML("../xml/Questions.xml");
					
					
					echo ("XML fitxategia ondo eguneratu da");
		}
	}
				?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
