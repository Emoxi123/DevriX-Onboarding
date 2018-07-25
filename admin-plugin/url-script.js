 $ = jQuery; 
jQuery(document).ready(function() {

 	$('#link-form').on( 'click', function() {
 		//alert( "blah" );
 		if($('#text-form').val() == ""){
 			alert( "put a link" );
 		} else {
 		 	var value_of_url = $('#text-form').val();
 		}
 		 $.post( ajaxurl, { data : { 'text-form' : value_of_url }, action : 'fetch_url_http' }, function(status) {
				 		$('#window-title').html( '<p>Site title: ' + status + '</p>' );
		           });
		 

 	});

 });