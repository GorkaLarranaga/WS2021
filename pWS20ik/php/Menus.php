<div id='page-wrap'>
<header class='main' id='h1'>

<?php
    session_start();
    if(!isset($_SESSION['erab'])) {
    ?>
	<span class="right"><a href="SignUp.php">Erregistratu</a></span>
        <span class="right"><a href="LogIn.php">Login</a></span>
	
	
<?php	
		
	}else
	{
   ?>
     <span class="right"><a href="LogOut.php">Logout</a></span>
	 <span class="right"><?php echo ($_SESSION['erab'])?></span>
		
	<?php   
		
	}
 
	?> 



</header>
<nav class='main' id='n1' role='navigation'>
	<?php
    if(!isset($_SESSION['erab'])) {
       
		
	}else
	{
		if($_SESSION['erab']=="admin@ehu.es")
		{
			?>
			<span><a href='HandlingAccounts.php'>HandlingAccounts</a></span>
			<?php
		}
   ?>
	<span><a href='Layout.php'>Hasiera</a></span>
	<span><a href='QuestionForm.php'>Galderak</a></span>
	<span><a href='ShowQuestions.php'>Galderak ikusi</a></span>
	<span><a href='ShowXmlQuestions.php'>Galderak ikusi XML</a></span>
	<span><a href='HandlingQuizesAjax.php'>Galderak AJAX</a></span>
	<span><a href='Credits.php'>Kredituak</a></span>
	
	<?php   
		
	}
 
	?> 
</nav>
