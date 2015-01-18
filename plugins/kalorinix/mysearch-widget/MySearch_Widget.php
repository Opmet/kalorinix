<?php
/**
 * @package kalorinix
 */
define('__MYVIEW__', dirname(__FILE__));

class MySearch_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'mysearch-widget', // Base ID
			__('mysearch-widget', 'text_domain'), // Name
			array( 'description' => __( 'mysearch-widget', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
		?>
		   <?php require_once(__MYVIEW__.'/view/MyView.php'); ?>
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
function search_scripts() {
wp_enqueue_style( 'style-search', plugins_url('/kalorinix/mysearch-widget/css/mySearch.css'));
wp_enqueue_script( 'script-search', plugins_url('/kalorinix/mysearch-widget/js/mySearch.js'), array('jquery'), '1.0.0', true );
}

add_action( 'widgets_init', function(){
     register_widget( 'mysearch_Widget' );
});

add_action( 'wp_enqueue_scripts', 'search_scripts' );
