<?php
require_once get_template_directory() . '/core/modules/widgets/option/widgets-slider.php';

function add_widgets_js(){
	wp_enqueue_style('widgets-admin', get_template_directory_uri() . '/core/modules/widgets/css/widgets.css', array(), _S_VERSION);
	wp_enqueue_script('widgets-admin', get_template_directory_uri() . '/core/modules/widgets/js/widgets.js', array('jquery'), _S_VERSION, true);
}
add_action('admin_enqueue_scripts', 'add_widgets_js');