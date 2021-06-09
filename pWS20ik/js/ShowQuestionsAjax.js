 $(document).ready(function(){
$("#XMLikusi").click(function(){

	var xml;
	
	if (window.XMLHttpRequest) xml = new XMLHttpRequest();
	else xml = new ActiveXObject("Microsoft.XMLHTTP");
	
	xml.onreadystatechange = function()
	{
		if(xml.readyState == 4 && xml.status==200)
		{
			var emaitza = xml.responseXML;
			var taula = "<table><tr><th>Egilea</th><th>Galderaren enuntziatua</th><th>Erantzun zuzena</th></tr>";
			var aux = emaitza.getElementsByTagName("assessmentItem");
			var view = false;
			var orriTamaina = 800;
			
			for(var i=0; i< aux.length; i++)
			{
				if(!view)
				{
					view = true;
				}
				taula +="<tr>" + "<td>" + aux[i].getAttribute("author") + "</td>" + "<td>" + aux[i].getElementsByTagName("itemBody")[0].getElementsByTagName("p")[0].childNodes[0].nodeValue + "</td>" + "<td>" + aux[i].getElementsByTagName("correctResponse")[0].getElementsByTagName("response")[0].childNodes[0].nodeValue + "</td>" + "</tr>";
				orriTamaina+=30;
			}
			taula+="</table>";
			
			if (view)
			{
				document.getElementById("n1").style.height = orriTamaina +"px";
				document.getElementById("s1").style.height = orriTamaina +"px";
				document.getElementById("XMLtaula").innerHTML = taula;
				document.getElementById("erantzuna").innerHTML = "";
				
			}
			else 
			{
				document.getElementById("n1").style.height = orriTamaina +"px";
				document.getElementById("s1").style.height = orriTamaina +"px";
				document.getElementById("XMLtaula").innerHTML = "XML-a hustik dago.";
			}
		}
	}
	xml.open('GET', '../xml/Questions.xml?q='+new Date().getTime(), true);
	xml.send();
});
});