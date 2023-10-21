<?php
require_once dirname(__FILE__) . '/solution-meta-box.php';
if (!function_exists('wb_create_post_type_solution')) {
	function wb_create_post_type_solution()
	{
		if (current_user_can('user_aprove_comments'))
			return;
		$labels  = array(
			'name'                  => _x('Hệ giải pháp điều trị', 'Post Type Name', 'dongphuong_yphap'),
			'singular_name'         => _x('Hệ giải pháp điều trị', 'Post Type Singular Name', 'dongphuong_yphap'),
			'menu_name'             => __('Hệ giải pháp điều trị', 'dongphuong_yphap'),
			'name_admin_bar'        => __('Hệ giải pháp điều trị', 'dongphuong_yphap'),
			'archives'              => __('Tất cả Hệ giải pháp điều trị', 'dongphuong_yphap'),
			'parent_item_colon'     => __('Parent Item:', 'dongphuong_yphap'),
			'all_items'             => __('Tất cả Hệ giải pháp điều trị', 'dongphuong_yphap'),
			'add_new_item'          => __('Thêm Hệ giải pháp điều trị', 'dongphuong_yphap'),
			'add_new'               => __('Thêm mới', 'dongphuong_yphap'),
			'new_item'              => __('New Event', 'dongphuong_yphap'),
			'edit_item'             => __('Edit Item', 'dongphuong_yphap'),
			'update_item'           => __('Update Item', 'dongphuong_yphap'),
			'view_item'             => __('View Item', 'dongphuong_yphap'),
			'search_items'          => __('Search Item', 'dongphuong_yphap'),
			'not_found'             => __('Not found', 'dongphuong_yphap'),
			'not_found_in_trash'    => __('Not found in Trash', 'dongphuong_yphap'),
			'featured_image'        => __('Featured Image', 'dongphuong_yphap'),
			'set_featured_image'    => __('Set featured image', 'dongphuong_yphap'),
			'remove_featured_image' => __('Remove featured image', 'dongphuong_yphap'),
			'use_featured_image'    => __('Use as featured image', 'dongphuong_yphap'),
			'insert_into_item'      => __('Insert into item', 'dongphuong_yphap'),
			'uploaded_to_this_item' => __('Uploaded to this item', 'dongphuong_yphap'),
			'items_list'            => __('Items list', 'dongphuong_yphap'),
			'items_list_navigation' => __('Items list navigation', 'dongphuong_yphap'),
			'filter_items_list'     => __('Filter items list', 'dongphuong_yphap'),
		);
		$rewrite = array(
			'slug'       => 'he-giai-phap',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => true,
		);
		$args    = array(
			'label'               => __('Hệ giải pháp điều trị', 'dongphuong_yphap'),
			'description'         => __('Tổng hợp những Hệ giải pháp điều trị', 'dongphuong_yphap'),
			'labels'              => $labels,
			'supports'            => array('title', 'editor', 'author', 'thumbnail', 'comments', 'revisions'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 10,
			'menu_icon'           => 'dashicons-index-card',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
		);
		register_post_type('solution', $args);
	}
	add_action('init', 'wb_create_post_type_solution', 0);
}



if (!function_exists('wb_create_solution_cat')) {

	function wb_create_solution_cat()
	{
		$labels  = array(
			'name'                       => _x('Giải pháp', 'Taxonomy General Name', 'dongphuong_yphap'),
			'singular_name'              => _x('Giải pháp', 'Taxonomy Singular Name', 'dongphuong_yphap'),
			'menu_name'                  => __('Giải pháp', 'dongphuong_yphap'),
			'all_items'                  => __('Tất cả Giải pháp', 'dongphuong_yphap'),
			'parent_item'                => __('Chuyên mục cha', 'dongphuong_yphap'),
			'parent_item_colon'          => __('Chuyên mục cha', 'dongphuong_yphap'),
			'new_item_name'              => __('Thêm chuyên mục', 'dongphuong_yphap'),
			'add_new_item'               => __('Thêm mới Giải pháp', 'dongphuong_yphap'),
			'edit_item'                  => __('Chỉnh sửa', 'dongphuong_yphap'),
			'update_item'                => __('Cập nhập', 'dongphuong_yphap'),
			'view_item'                  => __('Xem chuyên mục', 'dongphuong_yphap'),
			'separate_items_with_commas' => __('Separate items with commas', 'dongphuong_yphap'),
			'add_or_remove_items'        => __('Add or remove items', 'dongphuong_yphap'),
			'choose_from_most_used'      => __('Choose from the most used', 'dongphuong_yphap'),
			'popular_items'              => __('Popular Items', 'dongphuong_yphap'),
			'search_items'               => __('Search Items', 'dongphuong_yphap'),
			'not_found'                  => __('Not Found', 'dongphuong_yphap'),
			'no_terms'                   => __('No items', 'dongphuong_yphap'),
			'items_list'                 => __('Items list', 'dongphuong_yphap'),
			'items_list_navigation'      => __('Items list navigation', 'dongphuong_yphap'),
		);
		$rewrite = array(
			'slug'         => 'giai-phap',
			'with_front'   => true,
			'hierarchical' => true,
		);
		$args    = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'rewrite'           => $rewrite,
		);
		register_taxonomy('solution_cat', array('solution'), $args);

	}
	add_action('init', 'wb_create_solution_cat', 0);
}