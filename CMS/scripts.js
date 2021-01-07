// JavaScript Document
$(document).ready( function() {
	
	$(".btn-search").click( function(event) {
	
		event.preventDefault();
    
		var $input = $('.nine input');

		$input.focus();

		if ( $input.val().length > 0 ) {

			// submit form
			
			$( "#searchForm" ).submit();

		}

	});
	
});

// For Demo Purpose [Changing input group text on focus]
$(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
});
