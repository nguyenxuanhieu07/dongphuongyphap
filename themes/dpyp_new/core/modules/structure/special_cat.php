<?php
// Register Custom Taxonomy Special Cat
function wb_create_special_cat() {
	$labels = array(
		'name'                       => _x( 'Chuyên khoa', 'Taxonomy General Name', 'tdt' ),
		'singular_name'              => _x( 'Chuyên khoa', 'Taxonomy Singular Name', 'tdt' ),
		'menu_name'                  => __( 'Chuyên khoa', 'tdt' ),
		'all_items'                  => __( 'Tất cả chuyên khoa', 'tdt' ),
		'parent_item'                => __( 'Chuyên khoa cha', 'tdt' ),
		'parent_item_colon'          => __( 'Chuyên khoa cha', 'tdt' ),
		'new_item_name'              => __( 'Thêm chuyên khoa', 'tdt' ),
		'add_new_item'               => __( 'Thêm chuyên khoa', 'tdt' ),
		'edit_item'                  => __( 'Chỉnh sửa', 'tdt' ),
		'update_item'                => __( 'Cập nhật', 'tdt' ),
		'view_item'                  => __( 'Xem chuyên khoa', 'tdt' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'tdt' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'tdt' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'tdt' ),
		'popular_items'              => __( 'Popular Items', 'tdt' ),
		'search_items'               => __( 'Search Items', 'tdt' ),
		'not_found'                  => __( 'Not Found', 'tdt' ),
		'no_terms'                   => __( 'No items', 'tdt' ),
		'items_list'                 => __( 'Items list', 'tdt' ),
		'items_list_navigation'      => __( 'Items list navigation', 'tdt' ),
	);
	$rewrite = array(
		'slug'                       => 'chuyen-khoa',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'          => true,
	);
	register_taxonomy( 'special_cat', array( 'expert' ), $args );
}
add_action( 'init', 'wb_create_special_cat', 0 );

// Register Metabox for Special Cat
add_filter( 'rwmb_meta_boxes', 'special_cat_meta_boxes' );
function special_cat_meta_boxes( $meta_boxes ){
	$meta_boxes[] = array(
		'title'      => 'Thông tin về chuyên khoa',
		'taxonomies' => 'special_cat',
		'fields' => array(
			array(
				'name' => 'Tên đầy đủ (nếu có)',
				'id'   => 'special_name',
				'type' => 'text',
				'size' => 100
			),
			array(
				'name' => 'Số điện thoại nếu có',
				'id'   => 'special_hotline',
				'type' => 'text',
				'desc' => 'Hotline tư vấn của chuyên khoa'
			),
			array(
				'name' => 'Phương pháp điều trị',
				'id'   => 'special_method',
				'type' => 'wysiwyg',
			),
			array(
				'name' => 'Ảnh chuyên khoa',
				'id'   => 'special_thumbnail',
				'type' => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'name'        => 'Chuyên gia / Bác sĩ',
				'id'   => 'consultation-expert',
				'type'        => 'post',
				'post_type'   => 'expert',
				'field_type'  => 'select',
				'placeholder' => 'Lựa chọn',
				'query_args'  => [
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				],
			),
		),
	);
	return $meta_boxes;
}