<?php
/**
 * @package kalorinix
 */
define('__ROOTcreatewidget__', dirname(__FILE__));

class Create_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'create-widget', // Base ID
			__('create-widget', 'text_domain'), // Name
			array( 'description' => __( 'create-widget', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
		?>
		   <?php require_once(__ROOTcreatewidget__.'/view/CreateView.php'); ?>
		<?php
	}

 	public function form( $instance ) {
		// outputs the options form on admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}

add_action( 'widgets_init', function(){register_widget( 'Create_Widget' );});
add_action( 'wp_enqueue_scripts', 'create_scripts' );


//Mina scripts
function create_scripts() {
wp_enqueue_style( 'style-create', plugins_url('/kalorinix/create-widget/css/create.css'));
wp_enqueue_script( 'script-create', plugins_url('/kalorinix/create-widget/js/create.js'), array('jquery'), '1.0.0', true );
}