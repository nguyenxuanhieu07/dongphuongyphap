<?php
require_once dirname(__FILE__) . '/specialize-meta-box.php';
// Register Custom Taxonomy
if (!function_exists('wb_create_specialize')) {

	function wb_create_specialize()
	{
		$labels  = array(
			'name'                       => _x('Lĩnh vực chuyên môn', 'Taxonomy General Name', 'dongphuong_yphap'),
			'singular_name'              => _x('Lĩnh vực chuyên môn', 'Taxonomy Singular Name', 'dongphuong_yphap'),
			'menu_name'                  => __('Lĩnh vực chuyên môn', 'dongphuong_yphap'),
			'all_items'                  => __('Tất cả Lĩnh vực chuyên môn', 'dongphuong_yphap'),
			'parent_item'                => __('Chuyên mục cha', 'dongphuong_yphap'),
			'parent_item_colon'          => __('Chuyên mục cha', 'dongphuong_yphap'),
			'new_item_name'              => __('Thêm chuyên mục', 'dongphuong_yphap'),
			'add_new_item'               => __('Thêm mới Lĩnh vực chuyên môn', 'dongphuong_yphap'),
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
			'slug'         => 'chuyen-mon',
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
		register_taxonomy('specialize', array('solution', 'disease', 'acupoints', 'post', 'product'), $args);

	}
	add_action('init', 'wb_create_specialize', 0);
}