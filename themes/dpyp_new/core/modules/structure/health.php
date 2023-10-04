<?php
// Register Custom Post Type
if(!function_exists('wb_create_knowledge_post')){
	function wb_create_knowledge_post() {
		$labels = array(
			'name'                  => _x( 'Bệnh học', 'Post Type General Name', 'tdt' ),
			'singular_name'         => _x( 'Bệnh học', 'Post Type Singular Name', 'tdt' ),
			'menu_name'             => __( 'Bệnh học', 'tdt' ),
			'name_admin_bar'        => __( 'Bệnh học', 'tdt' ),
			'archives'              => __( 'Tất cả', 'tdt' ),
			'attributes'            => __( 'Item Attributes', 'tdt' ),
			'parent_item_colon'     => __( 'Parent Item:', 'tdt' ),
			'all_items'             => __( 'Tất cả bài viết', 'tdt' ),
			'add_new_item'          => __( 'Thêm bài viết mới', 'tdt' ),
			'add_new'               => __( 'Thêm mới', 'tdt' ),
			'new_item'              => __( 'Bài viết mới', 'tdt' ),
			'edit_item'             => __( 'Chỉnh sửa', 'tdt' ),
			'update_item'           => __( 'Cập nhật', 'tdt' ),
			'view_item'             => __( 'Xem bài viết', 'tdt' ),
			'view_items'            => __( 'Xem tất cả bài viết', 'tdt' ),
			'search_items'          => __( 'Tìm kiếm Bệnh học', 'tdt' ),
			'not_found'             => __( 'Không tìm thấy', 'tdt' ),
			'not_found_in_trash'    => __( 'Không có trong thùng rác', 'tdt' ),
			'featured_image'        => __( 'Ảnh đại diện', 'tdt' ),
			'set_featured_image'    => __( 'Chọn ảnh đại diện', 'tdt' ),
			'remove_featured_image' => __( 'Xóa ảnh đại diện', 'tdt' ),
			'use_featured_image'    => __( 'Sử dụng ảnh', 'tdt' ),
			'insert_into_item'      => __( 'Chèn vào bài viết', 'tdt' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'tdt' ),
			'items_list'            => __( 'Items list', 'tdt' ),
			'items_list_navigation' => __( 'Items list navigation', 'tdt' ),
			'filter_items_list'     => __( 'Filter items list', 'tdt' ),
		);
		$rewrite = array(
			'slug'                  => 'benh-hoc',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Kiến thức bệnh học', 'tdt' ),
			'description'           => __( 'Bệnh học', 'tdt' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'comments','revisions', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 4,
			'menu_icon'             => 'dashicons-nametag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'kien-thuc-benh-hoc',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
		);
		register_post_type( 'knowledge', $args );

	}
	add_action( 'init', 'wb_create_knowledge_post', 0 );
}


// Register Custom Post Type
//function wb_create_solution_post() {
//	$labels = array(
//		'name'                  => _x( 'Nghiên cứu', 'Post Type General Name', 'tdt' ),
//		'singular_name'         => _x( 'Nghiên cứu', 'Post Type Singular Name', 'tdt' ),
//		'menu_name'             => __( 'Nghiên cứu', 'tdt' ),
//		'name_admin_bar'        => __( 'Nghiên cứu', 'tdt' ),
//		'archives'              => __( 'Tất cả', 'tdt' ),
//		'attributes'            => __( 'Item Attributes', 'tdt' ),
//		'parent_item_colon'     => __( 'Parent Item:', 'tdt' ),
//		'all_items'             => __( 'Tất cả bài viết', 'tdt' ),
//		'add_new_item'          => __( 'Thêm bài viết mới', 'tdt' ),
//		'add_new'               => __( 'Thêm mới', 'tdt' ),
//		'new_item'              => __( 'Bài viết mới', 'tdt' ),
//		'edit_item'             => __( 'Chỉnh sửa', 'tdt' ),
//		'update_item'           => __( 'Cập nhật', 'tdt' ),
//		'view_item'             => __( 'Xem bài viết', 'tdt' ),
//		'view_items'            => __( 'Xem tất cả bài viết', 'tdt' ),
//		'search_items'          => __( 'Tìm kiếm Nghiên cứu', 'tdt' ),
//		'not_found'             => __( 'Không tìm thấy', 'tdt' ),
//		'not_found_in_trash'    => __( 'Không có trong thùng rác', 'tdt' ),
//		'featured_image'        => __( 'Ảnh đại diện', 'tdt' ),
//		'set_featured_image'    => __( 'Chọn ảnh đại diện', 'tdt' ),
//		'remove_featured_image' => __( 'Xóa ảnh đại diện', 'tdt' ),
//		'use_featured_image'    => __( 'Sử dụng ảnh', 'tdt' ),
//		'insert_into_item'      => __( 'Chèn vào bài viết', 'tdt' ),
//		'uploaded_to_this_item' => __( 'Uploaded to this item', 'tdt' ),
//		'items_list'            => __( 'Items list', 'tdt' ),
//		'items_list_navigation' => __( 'Items list navigation', 'tdt' ),
//		'filter_items_list'     => __( 'Filter items list', 'tdt' ),
//	);
//	$rewrite = array(
//		'slug'                  => 'nghien-cuu',
//		'with_front'            => true,
//		'pages'                 => true,
//		'feeds'                 => true,
//	);
//	$args = array(
//		'label'                 => __( 'Nghiên cứu', 'tdt' ),
//		'description'           => __( 'Nghiên cứu', 'tdt' ),
//		'labels'                => $labels,
//		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments','revisions', ),
//		'hierarchical'          => false,
//		'public'                => true,
//		'show_ui'               => true,
//		'show_in_menu'          => true,
//		'menu_position'         => 4,
//		'menu_icon'             => 'dashicons-superhero-alt',
//		'show_in_admin_bar'     => true,
//		'show_in_nav_menus'     => true,
//		'can_export'            => true,
//		'has_archive'           => false,
//		'exclude_from_search'   => false,
//		'publicly_queryable'    => true,
//		'rewrite'               => $rewrite,
//		'capability_type'       => 'post',
//		'show_in_rest'          => true,
//	);
//	register_post_type( 'solution', $args );

//}
//add_action( 'init', 'wb_create_solution_post', 0 );

/**
 * knowledge Meta box
 */
if(!function_exists('wb_knowledge_meta_boxes')){
	add_filter( 'rwmb_meta_boxes', 'wb_knowledge_meta_boxes' );
	function wb_knowledge_meta_boxes( $meta_boxes ) {
		$meta_boxes[] = array(
			'id' => 'knowledge_short_title',
			'title' => 'Tên rút gọn',
			'post_types' => array('knowledge'),
			'context'   => 'normal',
			'priority'  => 'high',
			'fields' => array(
				array(
					'name' => 'Tên rút gọn',
					'id'   => 'short_title',
					'type' => 'text',
				),
			),
		);
		return $meta_boxes;
	}
}
