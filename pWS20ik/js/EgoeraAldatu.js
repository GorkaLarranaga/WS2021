 $(document).ready(function(){
$('#aldatu').click(function() {
    
    alert("Mesedez orria berriro kargatu");
	
		var eposta = $("#posta").val();
		  $.ajax({
			type: "POST",
			cache: false,
			url: "ChangeUserState.php",
			data: 'posta='+eposta,
		  }).done(function( msg ) {
			alert( "Egoera aldatua" );
		  }).fail( function() {
			alert( 'Errorea aldatzen');
		  });
		  
		  
		  
});

});