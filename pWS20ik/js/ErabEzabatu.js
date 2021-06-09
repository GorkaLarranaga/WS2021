 function Ezabatu(posta)
  {

			$.ajax({
				type: "POST",
				cache: false,
				url: "RemoveUser.php",
				data: posta,
				dataType: "html",
				error: function(ts){alert(ts.responseText)},
				success: function(response)
				{
				}
			})
  } 