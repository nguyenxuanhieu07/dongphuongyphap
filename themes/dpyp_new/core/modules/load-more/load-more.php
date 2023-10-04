<?php

if( !function_exists('loadmore_scripts') ){
	function loadmore_scripts() {
		global $wp_query;

		wp_enqueue_script( 'loadmore-js', get_template_directory_uri() . '/core/modules/load-more/load-more.js', array(), '1.0', true );
		wp_localize_script( 'loadmore-js', 'loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
			'posts' => json_encode( $wp_query->query_vars ),
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages
		) );

	}
	add_action( 'wp_enqueue_scripts', 'loadmore_scripts' );
}
if( !function_exists('load_more_post')){
	function load_more_post(){

		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1;
		// $args['orderby'] = 'date';
		// $args['order'] = 'DESC';
		$args['post_status'] = 'publish';
	 
		query_posts( $args );
	 
		if( have_posts() ) :
	 
			while( have_posts() ): the_post();

				get_template_part( 'template-parts/content', 'post' );
	 
			endwhile;
	 
		endif;
		die;
	}
	add_action('wp_ajax_load_more_post', 'load_more_post');
	add_action('wp_ajax_nopriv_load_more_post', 'load_more_post');
}

if( !function_exists('load_more_doctor')){
	function load_more_doctor(){

		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1;
		// $args['orderby'] = 'name';
		// $args['order'] = 'ASC';
		$args['post_status'] = 'publish';
	 
		query_posts( $args );
	 
		if( have_posts() ) :
	 
			while( have_posts() ): the_post();

				echo '<div class="col-md-3 col-sm-6">';

				get_template_part( 'template-parts/content', 'doctor' );

				echo '</div>';
	 
			endwhile;
	 
		endif;
		die;
	}
	add_action('wp_ajax_load_more_doctor', 'load_more_doctor');
	add_action('wp_ajax_nopriv_load_more_doctor', 'load_more_doctor');
}


if( !function_exists('load_more_video')){
	function load_more_video(){

		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1;
		// $args['orderby'] = 'date';
		// $args['order'] = 'DESC';
		$args['post_status'] = 'publish';
	 
		query_posts( $args );
	 
		if( have_posts() ) :
	 
			while( have_posts() ): the_post();

				echo '<div class="col-xs-6 col-sm-4 post video-item">';

				get_template_part( 'template-parts/content', 'video' );

				echo '</div>';
	 
			endwhile;
	 
		endif;
		die;
	}
	add_action('wp_ajax_load_more_video', 'load_more_video');
	add_action('wp_ajax_nopriv_load_more_video', 'load_more_video');
}