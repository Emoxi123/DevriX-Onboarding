<?php 

add_action( 'admin_menu', 'my_plugin_menu' );
add_action( 'admin_enqueue_scripts', 'dx_add_admin_JS' );
add_action( 'wp_ajax_add_to_base', 'add_to_base' );

function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'Training Plugin', 'manage_options', 'some_slug', 'my_plugin_options' );
}


function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'Nigga, you are not admin' ) );
	}
	 	?>
	<form method = "post" >
  	<input type="checkbox" id="filters-enable">Filters enable <br>
	</form>
	<?php
}

 function dx_add_admin_JS( $hook ) {
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'samplescript-admin', plugins_url( '/samplescript-admin.js' , __FILE__ ), array('jquery'), '1.0', true );
		wp_enqueue_script( 'samplescript-admin' );

	}

function add_to_base(){ 
	//error_log( 'HU! ' . print_r( $_POST[ 'data' ][ 'dx_option_from_ajax_training' ] ) );

	if( isset( $_POST[ 'data' ] )  && isset( $_POST[ 'data' ][ 'filters-enable' ] ) ){
		//error_log( 'HA! ' . print_r( $_POST[ 'data' ] ) );
		update_option( 'filters-enable', $_POST['data']['filters-enable']);
	}
	die();
}