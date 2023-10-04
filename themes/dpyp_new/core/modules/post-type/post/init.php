<?php
if( !function_exists('create_meta_featured_post')){
	add_filter( 'rwmb_meta_boxes', 'create_meta_featured_post' );
	function create_meta_featured_post( array $meta_boxes ) {

		$meta_boxes[] = array(
			'id'         => 'post_adv_setup',
			'title'      => __( 'Cài đặt', 'dpyp' ),
			'pages'      => array( 'post', ), // Post type
			'context'    => 'side',
			'priority'   => 'high',
			'show_names' => true,
			'fields'     => array(
				array(
					'name' => __( '', 'dpyp' ),
					'desc' => __( 'Tích chọn bài viết nổi bật', 'dpyp' ),
					'id'   => 'featured_link_target',
					'type' => 'checkbox',
				),
				array(
					'name' => __( '', 'dpyp' ),
					'desc' => __( 'Bật/tắt box liên hệ cuối bài', 'dpyp' ),
					'id'   => 'show_contact_box',
					'type' => 'checkbox',
					'std'  => 1
				),
			),
		);

		$meta_boxes[] = array(
	        'title'      => 'Show ở giao diện kiến thức bệnh',
	        'taxonomies' => 'category',
	        'fields' => array(
	            array(
	                'name' => 'Chuyên mục con nổi bật?',
	                'id'   => 'featured_child_term',
	                'type' => 'checkbox',
	            ),
	        ),
	    );

		return $meta_boxes;
	}
}