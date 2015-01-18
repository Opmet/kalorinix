<?php
/**
 * Plugin Name: KaloriNix
 * Plugin URI: http://www.itandersson.se
 * Description: Ett test.
 * Version: 1.0
 * Author: Joakim Andersson
 * Author URI: http://www.itandersson.se
 * License: null
 */

include_once 'model/ConfigFile.php';
include_once 'mysearch-widget/MySearch_Widget.php';
include_once 'create-widget/Create_Widget.php';
include_once 'own-widget/Own_Widget.php';

function kalorinix_scripts() {
//not: Registrering bör antagligen göras i templaten istället. Kolla på det innan utrullning.
//Länk till en informativ sida: 
//http://www.wpbeginner.com/wp-themes/replace-default-wordpress-jquery-script-with-google-library/
wp_deregister_script('jquery');
wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.0.0');
wp_enqueue_script('jquery');

//Bootstrap
wp_enqueue_style( 'bootstrap-css', plugins_url('/kalorinix/css/bootstrap.min.css'));
wp_enqueue_script( 'bootstrap-js', plugins_url('/kalorinix/js/bootstrap.min.js'), array('jquery'), '1.0.0', true );
}

//Session
function register_session(){
	if( !session_id() )
		session_start();
}

add_action('init','register_session');
add_action( 'wp_enqueue_scripts', 'kalorinix_scripts' );
