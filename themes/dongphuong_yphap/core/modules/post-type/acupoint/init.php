<?php
require_once dirname(__FILE__) . '/acupoint-meta-box.php';
if (!function_exists('wb_create_post_type_acupoints')) {
	function wb_create_post_type_acupoints()
	{
		if (current_user_can('user_aprove_comments'))
			return;
		$labels  = array(
			'name'                  => _x('Huyệt đạo', 'Post Type Name', 'dongphuong_yphap'),
			'singular_name'         => _x('Huyệt đạo', 'Post Type Singular Name', 'dongphuong_yphap'),
			'menu_name'             => __('Huyệt đạo', 'dongphuong_yphap'),
			'name_admin_bar'        => __('Huyệt đạo', 'dongphuong_yphap'),
			'archives'              => __('Tất cả Huyệt đạo', 'dongphuong_yphap'),
			'parent_item_colon'     => __('Parent Item:', 'dongphuong_yphap'),
			'all_items'             => __('Tất cả Huyệt đạo', 'dongphuong_yphap'),
			'add_new_item'          => __('Thêm Huyệt đạo', 'dongphuong_yphap'),
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
			'slug'       => 'benh-dieu-tri',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => true,
		);
		$args    = array(
			'label'               => __('Huyệt đạo', 'dongphuong_yphap'),
			'description'         => __('Tổng hợp những Huyệt đạo', 'dongphuong_yphap'),
			'labels'              => $labels,
			'supports'            => array('title', 'editor', 'author', 'thumbnail', 'comments', 'revisions'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 10,
			'menu_icon'           => 'dashicons-image-filter',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
		);
		register_post_type('acupoints', $args);
	}
	add_action('init', 'wb_create_post_type_acupoints', 0);
}