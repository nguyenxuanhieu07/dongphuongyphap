<?php
// Create settings page
add_filter( 'mb_settings_pages', 'wb_expert_settings_pages' );
function wb_expert_settings_pages( $settings_pages ){
	$settings_pages[] = array(
		'id'            => 'structure-options',
		'option_name'   => 'structure_options',
		'menu_title'    => __( 'Cài đặt cấu trúc', 'tdt' ),
		'icon_url'      => 'dashicons-admin-generic',
		'parent'      => 'options-general.php',
		'help_tabs' => [
			[
				'title'   => 'Cài đặt',
				'content' => '<p>Thêm cài đặt cơ sở của đơn vị, bệnh viện, chi nhánh hoạt động ở các tỉnh thành</p>',
			],
		],
	);
	
	return $settings_pages;
}
function wb_metabox_structure_settings_pages($meta_boxes){
	$post_type_opt = array();
	$post_type_object_post = get_post_type_object('post');
	$post_type_object_page = get_post_type_object('page');
	$post_type_opt['post'] = $post_type_object_post->labels->name;
	$post_type_opt['page'] = $post_type_object_page->labels->name;
	$post_types = get_post_types( array( '_builtin' => false ) );
	
	foreach ( $post_types as $post_type ) {
		$post_type_object = get_post_type_object( $post_type );
		$post_type_label = $post_type_object->labels->name;
		$post_type_opt[$post_type] = $post_type_label;
	}
	$meta_boxes[] = [
		'id'             => 'degree_meta',
		'title'          => 'Danh sách học hàm / Học vị',
		'settings_pages' => 'structure-options',
		'context'        => 'normal',
		'fields'         => [
			[
				'name' => 'Học hàm / Học vị',
				'id'   => 'degree_list',
				'type' => 'text',
				'clone'      	=> true,
				'add_button' 	=> 'Thêm mới',
			],
		],
	];
	$meta_boxes[] = [
		'id'             => 'support_post_type',
		'title'          => 'Chuyên khoa - Post type',
		'settings_pages' => 'structure-options',
		'context'        => 'normal',
		'fields'         => [
			[
				'name'            => 'Tích chọn các post type có chuyên khoa',
				'id'              => 'post_type_support',
				'type'            => 'checkbox_list',
				'inline'          => true,
				'select_all_none' => true,
				'options' => $post_type_opt
			],
		],
	];
	$meta_boxes[] = [
		'id'             => 'consultation-box',
		'title'          => 'Box tham vấn',
		'settings_pages' => 'structure-options',
		'context'        => 'normal',
		'fields'         => [
			[
				'name'            => 'Tích chọn post type hiển thị box tham vấn',
				'id'              => 'consultation_box_support',
				'type'            => 'checkbox_list',
				'inline'          => true,
				'select_all_none' => true,
				'options' => $post_type_opt
			],
		],
	];

	$meta_boxes[] = [
		'id'             => 'structure-content',
		'title'          => 'Bài viết có cấu trúc',
		'settings_pages' => 'structure-options',
		'context'        => 'normal',
		'fields'         => [
			[
				'name'            => 'Tích chọn post type nội dung có cấu trúc',
				'id'              => 'structure_content_post_type',
				'type'            => 'checkbox_list',
				'inline'          => true,
				'select_all_none' => true,
				'options' => $post_type_opt
			],
		],
	];
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'wb_metabox_structure_settings_pages');