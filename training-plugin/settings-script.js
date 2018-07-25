$ = jQuery; 

$(document).ready(function($){
	
	$("#filters").change(function(){ 

		if( $( '#filters' ).val() == "yes" ){
			alert( "yes" );

				$("#filters").val("yes");
				var ajax_field_value = $("#filters").val();

				$.post( ajaxurl, { data: { "filters" : ajax_field_value }, action: "add_to_base" } );


		} else if( $('#filters'). val() == "no" ){
			alert( "no" );
			$("#filters").val("no");
				var ajax_field_value = $("#filters").val();

				$.post( ajaxurl, { data: { "filters" : ajax_field_value }, action: "add_to_base" } );

		}
	});
}); 