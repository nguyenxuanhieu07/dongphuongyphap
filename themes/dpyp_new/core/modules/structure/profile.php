<?php
// Register Custom Post Type
function wb_create_profile_post() {
	$labels = array(
		'name'                  => _x( 'Hồ sơ', 'Post Type General Name', 'tdt' ),
		'singular_name'         => _x( 'Hồ sơ', 'Post Type Singular Name', 'tdt' ),
		'menu_name'             => __( 'Hồ sơ', 'tdt' ),
		'name_admin_bar'        => __( 'Hồ sơ', 'tdt' ),
		'archives'              => __( 'Tất cả', 'tdt' ),
		'attributes'            => __( 'Item Attributes', 'tdt' ),
		'parent_item_colon'     => __( 'Parent Item:', 'tdt' ),
		'all_items'             => __( 'Tất cả', 'tdt' ),
		'add_new_item'          => __( 'Thêm mới', 'tdt' ),
		'add_new'               => __( 'Thêm mới', 'tdt' ),
		'new_item'              => __( 'Bác sĩ mới', 'tdt' ),
		'edit_item'             => __( 'Chỉnh sửa', 'tdt' ),
		'update_item'           => __( 'Cập nhật', 'tdt' ),
		'view_item'             => __( 'Xem thông tin ', 'tdt' ),
		'view_items'            => __( 'Xem tất cả', 'tdt' ),
		'search_items'          => __( 'Tìm kiếm ', 'tdt' ),
		'not_found'             => __( 'Không tìm thấy', 'tdt' ),
		'not_found_in_trash'    => __( 'Không có trong thùng rác', 'tdt' ),
		'featured_image'        => __( 'Ảnh đại diện', 'tdt' ),
		'set_featured_image'    => __( 'Chọn ảnh đại diện', 'tdt' ),
		'remove_featured_image' => __( 'Xóa ảnh đại diện', 'tdt' ),
		'use_featured_image'    => __( 'Sử dụng ảnh này', 'tdt' ),
		'insert_into_item'      => __( 'Chèn vào bài viết', 'tdt' ),
		'uploaded_to_this_item' => __( '', 'tdt' ),
		'items_list'            => __( 'Items list', 'tdt' ),
		'items_list_navigation' => __( 'Items list navigation', 'tdt' ),
		'filter_items_list'     => __( 'Filter items list', 'tdt' ),
	);
	$rewrite = array(
		'slug'                  => 'ho-so',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => __( 'Hồ sơ', 'tdt' ),
		'description'           => __( 'Thông tin Hồ sơ', 'tdt' ),
		'labels'                => $labels,
		'supports'              => array( 'title','thumbnail', 'comments' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'profile', $args );

}
add_action( 'init', 'wb_create_profile_post', 0 );
/**
 * Profile Meta box
 */
add_filter( 'rwmb_meta_boxes', 'wb_profile_meta_boxes' );
function wb_profile_meta_boxes( $meta_boxes ) {
	$meta_boxes[] = [
		'id'             => 'profile',
		'title'          => 'Thông tin chung',
		'post_types' => 'profile',
		'context'        => 'normal',
		'fields'     => [
			[
				'name' => 'Tên rút gọn',
				'id'   => 'office_name',
				'type' => 'text',
			],
			[
				'name' => 'Địa chỉ',
				'id'   => 'office_address',
				'type' => 'text',
				'size' => 80
			],
			[
				'name' => 'Số điện thoại',
				'id'   => 'office_hotline',
				'type' => 'text',
				'size' => 20
			],
			[
				'name' => 'Email',
				'id'   => 'office_email',
				'type' => 'text',
				'size' => 40
			],
			[
				'name' => 'Lịch làm việc',
				'id'   => 'office_open_time',
				'type' => 'text',
				'size' => 100
			],
			[
				'name'    => 'Giới thiệu về cơ sở',
				'id'      => 'office_content',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 10,
					'teeny'         => true,
				],
			],
			// [
            //     'name'  => 'Dịch vụ',
            //     'id'    => 'office_service',
            //     'type'        => 'group',
            //     'clone'       => true,
            //     'collapsible' => true,
            //     'group_title' => array('field' => 'name'),  // ID of the subfield
            //     'sort_clone' => true,
            //     'save_state' => true,
            //     'fields' => array(
			// 		array(
            //             'name'  => 'Tên dịch vụ',
            //             'id'    => 'name',
            //             'type'  => 'text',
            //         ),
            //         array(
            //             'name'  => 'Link dịch vụ',
            //             'id'    => 'url',
            //             'type'  => 'text',
            //         ),
            //     )
            // ],
			[
                'name'  => 'Ảnh Dịch vụ',
				'id'    => 'office_gallery',
				'type'  => 'image_advanced',
				'max_file_uploads' => 30,
            ],

		],
	];
	$meta_boxes[] = [
		'id'             => 'special_of_profile',
		'title'          => 'DS chuyên khoa trực thuộc',
		'post_types' => 'profile',
		'context'        => 'normal',
		'fields'     => [
			[
				'name'       => 'Chuyên khoa',
				'id'         => 'taxonomy',
				'type'       => 'taxonomy_advanced',
				'taxonomy'   => 'special_cat',
				'field_type' => 'checkbox_tree',
				'add_new' => true
			],

		],
	];
	return $meta_boxes;
}