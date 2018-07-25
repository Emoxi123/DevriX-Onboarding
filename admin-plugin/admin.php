<?php
/*
Plugin Name:  Training plugin 2
Basic WordPress Plugin Header Comment
Author:       Emo ^^
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
*/

add_action( 'admin_menu', 'my_plugin_menu' );
add_action( 'admin_enqueue_scripts', 'script_enqueue' );
add_action( 'wp_ajax_fetch_url_http', 'fetch_url_http');

function my_plugin_menu() {
	add_options_page( 'My Plugin Options', ' some settings', 'manage_options', 'some_slug', 'my_plugin_options' );
}

	//checks if current user is admin and if is creates form with a text field 
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'Nigga, you are not admin' ) );
	}
	 ?> 
	<form method = "post" > 
	<input type = "text" id = "text-form">
	<button type = "button" id = "link-form"> ne6to <br></button> 
	</form>

 	<div id="window-title"> 
  	  asd
 	</div>
		<?php

	
 
}	

function script_enqueue( $hook ) { 
	wp_enqueue_script('jquery');
	wp_register_script( 'url-script', plugins_url( '/url-script.js', __FILE__ ), array('jquery') );
	wp_enqueue_script( 'url-script' );
}

function fetch_url_http() {
	if( isset( $_POST['data'] ) && isset( $_POST['data']['text-form'] ) ) { 

		$url_from_ajax = $_POST['data']['text-form'];
		$get_header = wp_remote_get($url_from_ajax);
		//error_log($url_from_ajax);

		if( is_wp_error($get_header) ) {
					echo 'Bruh, this is not a site link :) ';
					die();
		} 
		if( isset( $get_header['body'] ) ) {
			if( preg_match( '/<title>(.*)<\/title>/', $get_header['body'], $matches ) ) {
				echo json_encode( $matches[1] );
				die();
		
			}	
		}
	}

	die();
}