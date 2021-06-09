 function egoeraAldatu(posta)
  {			
	

			$.ajax({
				type: "POST",
				cache: false,
				url: "ChangeUserState.php",
				data: posta,
				dataType: "html",
				error: function(ts){alert(ts.responseText)},
				success: function(response)
				{
				}
			})
  } 