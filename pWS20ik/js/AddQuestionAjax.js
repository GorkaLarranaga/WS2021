 $(document).ready(function(){
$("#bidali").click(function(){

	var posta = $("#posta").val();
	var galdera = $("#galdera").val();
	var erantzunZuzena = $("#ezuzena").val();				
	var erantzunOkerra1 = $("#eokerra1").val();
	var erantzunOkerra2 = $("#eokerra2").val();				
	var erantzunOkerra3 = $("#eokerra3").val();
	var zailtasuna = $("#zailtasuna").val();				
	var arloa = $("#gaia").val();
	var zailtasunZenb;
	
	var zuzena = false;
	
	if (zailtasuna ="Txikia") zailtasunZenb = 1;
	else if (zailtasuna ="Ertaina") zailtasunZenb = 2;
	else zailtasunZenb = 3;

	if(galdera == "") alert("Galdera hutsik");
	else if(galdera.length < 10) alert("Galdera motzegia");
	else if(erantzunZuzena == "")  alert("Erantzun zuzena hutsik");
	else if(erantzunOkerra1 == "")  alert("1. erantzun okerra hutsik");
	else if(erantzunOkerra2 == "")  alert("2. erantzun okerra hutsik");
	else if(erantzunOkerra3 == "")  alert("3. erantzun okerra hutsik");
	else if(arloa == "")  alert("Arloa hutsik");
	else zuzena=true;
	
	if(posta == "") 
	{
		alert("Eposta hutsik");
		zuzena=false;
	}
	else
	{
		var epostaExp = new RegExp("^[a-zA-Z]{3,}[0-9]{3}@(ikasle[.]){0,1}ehu.(eus|es)$");
		if(!epostaExp.test(posta))
		{
			alert("Eposta gaizki dago idatzita");
			zuzena=false;
		}
	}
	
	if(zuzena)
	{
		var request_method = $("#galderenF").attr("method");
		var form_data = $("#galderenF").serialize();

		$.ajax(
		{
				async: true,
				type: request_method,
				url: "../php/AddQuestion.php",
				cache : false,
				data:form_data,
				success:function()
				{
					$("#erantzuna").html("Galdera gorde da");
					galderakIkusi(true);

				}

		}
		); 
	}
	else
	{
		return false;
	}
});
});