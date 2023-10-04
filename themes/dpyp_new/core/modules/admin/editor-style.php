<?php
if ( ! function_exists( 'wb_add_editor_styles' ) ) :
	function wb_add_editor_styles() {
		$font_url = str_replace(',', '%2C', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap' );
		add_editor_style( $font_url);
		add_editor_style( 'editor-style.css?v1' );
	}
	add_action( 'after_setup_theme', 'wb_add_editor_styles' );
endif;