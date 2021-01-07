// JavaScript Document
$(document).ready( function() {
	//if the delete button is clicked
	$( ".delete-post" ).click( function( event ) {
	   //show an confirmation alert box
		var c = confirm( "Are you sure you want to delete this post?" );
		//if the confirmation is true
		if ( c == true ) {
			
			var id = $( this ).attr( "id" );
			
			//alert( id );
			
			var data = { "deletePost" : true, "id" : id };
			//ajax function
			$.ajax({
		       // function send type
				type: "POST",
                // include link
				url: "../includes/Class.Actions.php",

				data: data,

				success: function ( result ) {

					console.log( result );
					// remove the row without reloading
					$( "#row-" + id ).remove();

				},

				error: function ( e ) {

					console.log( e.message );

				}

			});
			
			return true;
			
		} else {
			
			return false;
			
		}

	});
    
    //if the delete button is clicked
	$( ".delete-media" ).click( function( event ) {
	    //show an confirmation alert box
		var c = confirm( "Are you sure you want to delete this media?" );
		// if the confirmation is true
		if ( c == true ) {
			
			var id = $( this ).attr( "id" );
			
			//alert( id );
			
			var data = { "deleteMedia" : true, "id" : id };
			//ajax function
			$.ajax({
		
				type: "POST",

				url: "../includes/Class.Actions.php",

				data: data,

				success: function ( result ) {
                    
					console.log( result );
					// remove the media without reloading
					$( "#media-" + id ).remove();

				},

				error: function ( e ) {

					console.log( e.message );

				}

			});
			
			return true;
			
		} else {
			
			return false;
			
		}

	});
    
    //if the delete button is clicked
    $( ".delete-contact" ).click( function( event ) {
	   //show an confirmation alert box
		var c = confirm( "Are you sure you want to delete this contact?" );
		// if the confirmation is true
		if ( c == true ) {
			
			var id = $( this ).attr( "id" );
			
			//alert( id );
			
			var data = { "deleteContact" : true, "id" : id };
			
			$.ajax({
		
				type: "POST",

				url: "../includes/Class.Actions.php",

				data: data,

				success: function ( result ) {

					console.log( result );
					//remove contact without reloading
					$( "#contact-" + id ).remove();

				},

				error: function ( e ) {

					console.log( e.message );

				}

			});
			
			return true;
			
		} else {
			
			return false;
			
		}

	});
	
	//Hide and show the image information
	$( "#isProfile" ).change( function() {
		//if the profile box is checked
		if( $( this ).is( ":checked" ) )
		{
			
			//alert('checked'); // hide the form
			$( "#imageInformation" ).hide();
			
		} else {
			
			//alert('un-checked'); // show the form
			$( "#imageInformation" ).show();
			
		}
	});
	
});
