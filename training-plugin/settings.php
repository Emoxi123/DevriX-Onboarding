<?php

	add_action( 'admin_menu', 'my_plugin_menu' );
	add_action( 'admin_enqueue_scripts', 'script_enqueue' );
	add_action( 'wp_ajax_add_to_base', 'add_to_base' );

	//adds the option page under "settings" bar in admin panel
function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'Filters settings', 'manage_options', 'some_slug', 'my_plugin_options' );
}

	//checks if current user is admin and if is creates form with a text field 
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'Nigga, you are not admin' ) );
	}
	 	?>
	<form method = "post" >
  	<input type="text" id="filters">type 'yes'  to show the filters and 'no' to hide them  <br>
	</form>
	<?php
}

	//registers the JS 
function script_enqueue( $hook ) { 
	wp_enqueue_script('jquery');
	wp_register_script('settings-script', plugins_url( '/settings-script.js', __FILE__ ), array('jquery') );
	wp_enqueue_script('settings-script');
}

	//checks if there is  data, returned from the js and if there is, updates the "wp_options" table in db with a new column  named "filters" 
function add_to_base(){ 
		error_log( 'HA! ' . print_r( $_POST[ 'data' ] ) );
	if(isset($_POST['data']) && isset($_POST['data']['filters'] ) ) {
	update_option( 'filters', $_POST['data']['filters'] );
	} 
	die(); //stops the exec. of the js when th update_option() is executed
}