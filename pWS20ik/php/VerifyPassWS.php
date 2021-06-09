<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
				
	$ns="http://localhost//WS2021/Lab06/pWS20ik/php/VerifyPassWS.php?wsdl";		
			
	$server = new soap_server;
	$server->configureWSDL('egiaztatuPasahitza',$ns);
	$server->wsdl->schemaTargetNamespace =$ns;
	$server->register('egiaztatuPasahitza', array('x'=>'xsd:string','y'=>'xsd:int'),array('z'=>'xsd:string'),$ns);
		
	function egiaztatuPasahitza($x, $y)
	{
				
		if($y==1010)
		{
			
			$file = fopen("../txt/toppasswords.txt", "r");
			while ($linea = fscanf($file, "%s"))
			{
				if ($x == $linea[0]) 
					return "BALIOGABEA";
					
			}
			fclose($file);
			return "BALIOZKOA";
		}
		else
		{
			return "ZERBITZURIK GABE";
		}

	}
?>