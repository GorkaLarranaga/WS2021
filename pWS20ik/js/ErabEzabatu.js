 $(document).ready(function(){
$('#ezabatu').click(function() {
	
		var eposta = $("#posta").val();
	
		  $.ajax({
			type: "POST",
			cache: false,
			url: "RemoveUser.php",
			data: 'posta='+eposta,
		  }).done(function( msg ) {
			alert( "Erab ezabatua" );
			location.reload();
		  }).fail( function() {
			alert( 'Errorea ezabatzen');
		  });
		  
});

});