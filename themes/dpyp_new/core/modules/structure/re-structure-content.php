<?php
if(!function_exists('re_structure_post_type')){
	function re_structure_post_type(){
		$options  = get_option('structure_options');
		$post_types = $options['structure_content_post_type'] ? $options['structure_content_post_type'] : [];
		foreach ($post_types as $post_type) {
			remove_post_type_support($post_type,'editor');
		}
	}
	add_action( 'init', 're_structure_post_type' );
}

if(!function_exists('wb_structure_content_meta_boxes')){
	add_filter( 'rwmb_meta_boxes', 'wb_structure_content_meta_boxes' );
	function wb_structure_content_meta_boxes( $meta_boxes ) {
		$options  = get_option('structure_options');
		$post_types = $options['structure_content_post_type'];
		$meta_boxes[] = array(
			'id'         => 'structure-content',
			'title'      => 'Cấu trúc nội dung',
			'post_types' => $post_types,
			'context'    => 'normal',
			'priority'   => 'high',
			'fields' => array(
				[
					'id'         => 'structure-content-group',
					'type'       => 'group', 
					'clone'      => true, 
					'sort_clone' => true,
					'collapsible' => true,
					'add_button' => 'Thêm mới',
					'group_title' => array( 'field' => 'entry-title' ),
					'fields'     => [
						array(
							'name' => 'Tiêu đề',
							'id'   => 'entry-title',
							'type' => 'text',
							'size'=> 50,
						),
						array(
							'name' => 'Nội dung',
							'id'   => 'entry-content',
							'type'    => 'wysiwyg',
							'raw'     => false,
							'options' => [
								'textarea_rows' => 15,
								// 'teeny'         => true,
							],

						),
					],
				],
			)
		);
		return $meta_boxes;
	}
}