$ = jQuery;

$(document).ready(function($) {
	$("#filters-enable").change( function() { 

		if($('#filters-enable').is(':checked')) {
			alert("filters are enabled.");
			
			//$('#dx_option_from_ajax_training').val(1);
			$('#filters-enable').val( 1 );
			var ajax_field_value = $('#filters-enable').val();

			$.post( ajaxurl, { data: { "filters-enable" : ajax_field_value }, action: "add_to_base" } );
		} else { 
			alert("filters are disabled."); 

			//$('#dx_option_from_ajax_training').val("off");
			$('#filters-enable').val( 0 );
			var ajax_field_value = $('#filters-enable').val();

			$.post( ajaxurl, { data: { "filters-enable" : ajax_field_value }, action: "add_to_base" } );
		}
	});

});

