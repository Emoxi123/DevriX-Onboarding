<?php 
/*
Plugin Name:  Training plugin
Basic WordPress Plugin Header Comment
Author:       Emo ^^
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
*/
define( 'PLUGIN_PATH', dirname( __FILE__ ) );

if( get_option( 'filters' ) == "da" ) {
	add_filter( 'the_content', 'add_string_under_title_1', 1 );
	add_filter( 'the_content', 'add_string_under_title_2', 2 );
	add_filter( 'the_content', 'add_string_3', 3);
}

function add_string_under_title_1( $content ){
	
	$string1 = 'By Emo   ';
	if( is_single() ){
	  	$together = $string1 . $content;
	}
	return $together;
}

function add_string_under_title_2( $content ){
	
	$string2 = 'Onboarding filther: ';
	if( is_single() ){
    	$together = $string2 . $content;
	}
	return $together;
	
}

function add_string_3( $content ){
	if( is_single() ){
		$put_separate = explode( '<p>', $content );
		$string3 = "Text";
		$put_separate[1] .= $string3;
		$content = implode( $put_separate, "<p>" );
     }
		
     return $content;
    	
}
//require_once( PLUGIN_PATH . '/menu-settings.php' );
require_once( PLUGIN_PATH . '/settings.php');

