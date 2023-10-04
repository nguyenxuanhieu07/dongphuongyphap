<?php
// Register Custom Post Type
function mdn_create_medicine_post() {
	$labels = array(
		'name'                  => _x( 'Bác sĩ', 'Post Type General Name', 'dpyp' ),
		'singular_name'         => _x( 'Bác sĩ', 'Post Type Singular Name', 'dpyp' ),
		'menu_name'             => __( 'Bác sĩ', 'dpyp' ),
		'name_admin_bar'        => __( 'Bác sĩ', 'dpyp' ),
		'archives'              => __( 'Tất cả', 'dpyp' ),
		'attributes'            => __( 'Item Attributes', 'dpyp' ),
		'parent_item_colon'     => __( 'Parent Item:', 'dpyp' ),
		'all_items'             => __( 'Tất cả bài viết', 'dpyp' ),
		'add_new_item'          => __( 'Thêm bài viết mới', 'dpyp' ),
		'add_new'               => __( 'Thêm mới', 'dpyp' ),
		'new_item'              => __( 'Bài viết mới', 'dpyp' ),
		'edit_item'             => __( 'Chỉnh sửa', 'dpyp' ),
		'update_item'           => __( 'Cập nhật', 'dpyp' ),
		'view_item'             => __( 'Xem bài viết', 'dpyp' ),
		'view_items'            => __( 'Xem tất cả bài viết', 'dpyp' ),
		'search_items'          => __( 'Tìm kiếm Bác sĩ', 'dpyp' ),
		'not_found'             => __( 'Không tìm thấy', 'dpyp' ),
		'not_found_in_trash'    => __( 'Không có trong thùng rác', 'dpyp' ),
		'featured_image'        => __( 'Ảnh đại diện', 'dpyp' ),
		'set_featured_image'    => __( 'Chọn ảnh đại diện', 'dpyp' ),
		'remove_featured_image' => __( 'Xóa ảnh đại diện', 'dpyp' ),
		'use_featured_image'    => __( 'Sử dụng ảnh', 'dpyp' ),
		'insert_into_item'      => __( 'Chèn vào bài viết', 'dpyp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'dpyp' ),
		'items_list'            => __( 'Items list', 'dpyp' ),
		'items_list_navigation' => __( 'Items list navigation', 'dpyp' ),
		'filter_items_list'     => __( 'Filter items list', 'dpyp' ),
	);
	$rewrite = array(
		'slug'                  => 'bac-si',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Bác sĩ', 'dpyp' ),
		'description'           => __( 'Bác sĩ', 'dpyp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions','author'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'bac-si',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'doctor', $args );

}
add_action( 'init', 'mdn_create_medicine_post', 0 );
// if ( ! function_exists( 'mdn_create_medicine_cat' ) ) {

// Register Custom Taxonomy
// 	function mdn_create_medicine_cat() {

// 		$labels = array(
// 			'name'                       => _x( 'Danh mục Bác sĩ', 'Taxonomy General Name', 'dpyp' ),
// 			'singular_name'              => _x( 'Danh mục Bác sĩ', 'Taxonomy Singular Name', 'dpyp' ),
// 			'menu_name'                  => __( 'Danh mục Bác sĩ', 'dpyp' ),
// 			'all_items'                  => __( 'Tất cả danh mục', 'dpyp' ),
// 			'parent_item'                => __( 'Danh mục cha', 'dpyp' ),
// 			'parent_item_colon'          => __( 'Parent Item:', 'dpyp' ),
// 			'new_item_name'              => __( 'Danh mục mới', 'dpyp' ),
// 			'add_new_item'               => __( 'Thêm danh mục mới', 'dpyp' ),
// 			'edit_item'                  => __( 'Chỉnh sửa', 'dpyp' ),
// 			'update_item'                => __( 'Cập nhật', 'dpyp' ),
// 			'view_item'                  => __( 'Xem danh mục', 'dpyp' ),
// 			'separate_items_with_commas' => __( 'Separate items with commas', 'dpyp' ),
// 			'add_or_remove_items'        => __( 'Xóa danh mục', 'dpyp' ),
// 			'choose_from_most_used'      => __( 'Choose from the most used', 'dpyp' ),
// 			'popular_items'              => __( 'Popular Items', 'dpyp' ),
// 			'search_items'               => __( 'Tìm kiếm danh mục', 'dpyp' ),
// 			'not_found'                  => __( 'Not Found', 'dpyp' ),
// 			'no_terms'                   => __( 'No items', 'dpyp' ),
// 			'items_list'                 => __( 'Items list', 'dpyp' ),
// 			'items_list_navigation'      => __( 'Items list navigation', 'dpyp' ),
// 		);
// 		$rewrite = array(
// 			'slug'                       => 'danh-muc-thuoc',
// 			'with_front'                 => true,
// 			'hierarchical'               => false,
// 		);
// 		$args = array(
// 			'labels'                     => $labels,
// 			'hierarchical'               => true,
// 			'public'                     => true,
// 			'show_ui'                    => true,
// 			'show_admin_column'          => true,
// 			'show_in_nav_menus'          => true,
// 			'show_tagcloud'              => true,
// 			'rewrite'                    => $rewrite,
// 		);
// 		register_taxonomy( 'medicine-cat', array( 'medicine' ), $args );
// 	}
// 	add_action( 'init', 'mdn_create_medicine_cat', 0 );
// }