<?php
/**
 * @package kalorinix
 */
define('__OWNVIEW__', dirname(__FILE__));

class Own_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'own-widget', // Base ID
			__('own-widget', 'text_domain'), // Name
			array( 'description' => __( 'own-widget', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
		?>
		   <?php require_once(__OWNVIEW__.'/view/OwnView.php'); ?>
		<?php
	}

 	public function form( $instance ) {
		// outputs the options form on admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}

//Mina scripts
function own_scripts() {
wp_enqueue_style( 'style-own', plugins_url('/kalorinix/own-widget/css/own.css'));
wp_enqueue_script( 'script-own', plugins_url('/kalorinix/own-widget/js/own.js'), array('jquery'), '1.0.0', true );
}

add_action( 'widgets_init', function(){
     register_widget( 'Own_Widget' );
});

add_action( 'wp_enqueue_scripts', 'own_scripts' );
