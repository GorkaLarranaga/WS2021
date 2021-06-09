<?php
		
	function egiaztatuErabiltzailea($POSTA)
	{	
		require_once('../lib/nusoap.php');
		require_once('../lib/class.wsdlcache.php');
					
		$soapclient = new nusoap_client('http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl', true);					
		$matrikulatua = $soapclient->call('egiaztatuE', array('x'=>$POSTA));
		
		return $matrikulatua;
	}
	
?>