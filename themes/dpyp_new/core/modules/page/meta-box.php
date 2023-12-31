<?php
add_filter('rwmb_meta_boxes', 'meta_box_langding_page');
function meta_box_langding_page($meta_boxes)
{
	$meta_boxes[] = array(
		'id'          => 'lading-page-meta',
		'title'       => 'Cấu trúc nội dung',
		'post_types'  => 'page',
		'include'     => array(
			'template' => array('template-pages/solution-therapy.php', 'template-pages/solution-product.php', 'template-pages/solution-heavy.php', 'template-pages/solution-medicine.php', 'template-pages/solution-macrobiotics.php'),
		),
		'tabs'        => array(
			'logic'       => array(
				'label' => 'Logic hiển thị bài',
				'icon'  => 'dashicons-admin-page',
			),
			'slider'      => array(
				'label' => 'Slider',
				'icon'  => 'dashicons-admin-page',
			),
			'table-price' => array(
				'label' => 'Bảng giá',
				'icon'  => 'dashicons-money-alt',
			),
		),
		'tab_style'   => 'box',
		'tab_wrapper' => true,
		'fields'      => array(
			array(
				'name'        => 'Lĩnh vực chuyên môn chính',
				'id'          => 'structure-specialize-1',
				'type'        => 'taxonomy_advanced',
				'field_type'  => 'select_advanced',
				'placeholder' => 'Lựa chọn',
				'ajax'        => true,
				'taxonomy'    => 'specialize',
				'query_args'  => array(
					'parent' => 0
				),
				'tab'         => 'logic',
			),
			array(
				'name'        => __('Hiển thị bài viết theo lĩnh vực phụ'),
				'id'          => 'specialize-structure-option',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'structure-specialize-2'),
				'add_button'  => 'Thêm lĩnh vực',
				'tab'         => 'logic',
				'fields'      => array(
					array(
						'name'        => 'Lĩnh vực chuyên môn',
						'id'          => 'structure-specialize-2',
						'type'        => 'taxonomy_advanced',
						'field_type'  => 'select_advanced',
						'placeholder' => 'Lựa chọn',
						'ajax'        => true,
						'taxonomy'    => 'specialize',
						'query_args'  => array(
							'parent' => 0
						),
					),
				),
			),
			array(
				'name'        => __('Cấu trúc slider'),
				'id'          => 'slider-specialize-option',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'specialize-slide-title'),
				'add_button'  => 'Thêm slide',
				'tab'         => 'slider',
				'fields'      => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'specialize-slide-title',
						'type' => 'text',
						'size' => 50,
					),
					array(
						'name'             => 'Hình ảnh desktop',
						'id'               => 'specialize-slide-images',
						'type'             => 'image_advanced',
						'max_file_uploads' => 1,
					),
					array(
						'name'             => 'Hình ảnh mobile',
						'id'               => 'specialize-slide-images-mb',
						'type'             => 'image_advanced',
						'max_file_uploads' => 1,
					),
				),
			),
			array(
				'name'    => 'Bảng giá',
				'id'      => 'specialize-table-price',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'table-price',
			),
		)
	);
	$meta_boxes[] = array(
		'id'         => 'medicine-meta',
		'title'      => 'Trường phái vận động',
		'post_types' => 'page',
		'include'    => array(
			'template' => array('template-pages/solution-motor.php'),
		),
		'fields'     => array(
			array(
				'name'        => __('Trường phái vận động'),
				'id'          => 'motor-option',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'motor-name'),
				'add_button'  => 'Thêm lĩnh vực',
				'tab'         => 'logic',
				'fields'      => array(
					array(
						'name' => 'Tên trường phái',
						'id'   => 'motor-name',
						'type' => 'text',
					),
					array(
						'name'    => 'Nội dung',
						'id'      => 'motor-desc',
						'type'    => 'wysiwyg',
						'raw'     => false,
						'options' => [
							'textarea_rows' => 8,
							'teeny'         => false,
						],
					),
					array(
						'id'               => 'motor-image',
						'name'             => 'Ảnh minh họa',
						'type'             => 'image_advanced',
						'force_delete'     => false,
						'max_file_uploads' => 1,
						'max_status'       => false,
						'image_size'       => 'thumbnail',
					)
				),
			),
		),
	);
	$meta_boxes[] = array(
		'id'         => 'medicine-meta',
		'title'      => 'Bài thuốc',
		'post_types' => 'page',
		'include'    => array(
			'template' => array('template-pages/solution-medicine.php'),
		),
		'fields'     => array(
			array(
				'name'        => __('Bài thuốc'),
				'id'          => 'medicine-option',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'medicine-name'),
				'add_button'  => 'Thêm lĩnh vực',
				'tab'         => 'logic',
				'fields'      => array(
					array(
						'name' => 'Tên trường phái',
						'id'   => 'medicine-name',
						'type' => 'text',
					),
					array(
						'name'    => 'Sapo Nội dung',
						'id'      => 'medicine-desc',
						'type'    => 'wysiwyg',
						'raw'     => false,
						'options' => [
							'textarea_rows' => 8,
							'teeny'         => false,
						],
					),
					array(
						'name'    => 'Nội dung',
						'id'      => 'medicine-ingredient-desc',
						'type'    => 'wysiwyg',
						'raw'     => false,
						'options' => [
							'textarea_rows' => 8,
							'teeny'         => false,
						],
					),
					array(
						'id'               => 'medicine-image',
						'name'             => 'Ảnh minh họa',
						'type'             => 'image_advanced',
						'force_delete'     => false,
						'max_file_uploads' => 1,
						'max_status'       => false,
						'image_size'       => 'thumbnail',
					)
				),
			),
		),
	);
	$meta_boxes[] = array(
		'id'         => 'medicine-meta',
		'title'      => 'Cấu trúc nội dung',
		'post_types' => 'page',
		'include'    => array(
			'template' => array('template-pages/archive-author.php'),
		),
		'fields'     => array(
			array(
				'name'        => 'Chức vụ',
				'placeholder' => 'Lựa chọn',
				'id'          => 'role-author',
				'type'        => 'select_advanced',
				'options'     => array(
					'bs'  => 'Bác sĩ',
					'ktv' => 'Kỹ thuật viên',
				),
			),
			array(
				'name'    => 'Giới thiệu chung',
				'id'      => 'page-author-content',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
			),
			array(
				'name'        => __('Cấu trúc slider'),
				'id'          => 'slider-specialize-option',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'specialize-slide-title'),
				'add_button'  => 'Thêm slide',
				'tab'         => 'slider',
				'fields'      => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'specialize-slide-title',
						'type' => 'text',
						'size' => 50,
					),
					array(
						'name'             => 'Hình ảnh desktop',
						'id'               => 'specialize-slide-images',
						'type'             => 'image_advanced',
						'max_file_uploads' => 1,
					),
					array(
						'name'             => 'Hình ảnh mobile',
						'id'               => 'specialize-slide-images-mb',
						'type'             => 'image_advanced',
						'max_file_uploads' => 1,
					),
				),
			),
		),
	);
	$meta_boxes[] = array(
		'id'         => 'archive-solution-meta',
		'title'      => 'Cấu trúc nội dung',
		'post_types' => 'page',
		'include'    => array(
			'template' => array('template-pages/archive-solution.php'),
		),
		'fields'     => array(
			array(
				'name'        => __('Lĩnh vực chuyên môn'),
				'id'          => 'archive-solution-option',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'archive-solution-select'),
				'add_button'  => 'Thêm lĩnh vực',
				'fields'      => array(
					array(
						'name'        => 'Lĩnh vực chuyên môn',
						'id'          => 'archive-solution-select',
						'type'        => 'taxonomy_advanced',
						'field_type'  => 'select_advanced',
						'placeholder' => 'Lựa chọn',
						'ajax'        => true,
						'taxonomy'    => 'specialize',
						'query_args'  => array(
							'parent' => 0
						),
					),
				),
			),
		),
	);
	$meta_boxes[] = array(
		'id'          => 'page-basis-meta',
		'title'       => 'Cấu trúc nội dung',
		'post_types'  => 'page',
		'include'     => array(
			'template' => array('template-pages/page-basis.php'),
		),
		'tabs'        => array(
			'general'        => array(
				'label' => 'Giới thiệu',
				'icon'  => 'dashicons-editor-paste-text',
			),
			'infrastructure' => array(
				'label' => 'Cơ sở vật chất',
				'icon'  => 'dashicons-buddicons-topics',
			),
			'evaluate'       => array(
				'label' => 'Đánh giá',
				'icon'  => 'dashicons-star-filled',
			),
			'map'            => array(
				'label' => 'Map',
				'icon'  => 'dashicons-location',
			),
		),
		'tab_style'   => 'box',
		'tab_wrapper' => true,
		'fields'      => array(
			array(
				'name' => 'Địa chỉ',
				'id'   => 'page-basis-address',
				'type' => 'text',
				'tab'  => 'general'
			),
			array(
				'name' => 'Số điện thoại',
				'id'   => 'page-basis-numberphone',
				'type' => 'text',
				'tab'  => 'general'
			),
			array(
				'name' => 'Thời gian làm việc',
				'id'   => 'page-basis-worktime',
				'type' => 'text',
				'tab'  => 'general'
			),
			array(
				'name'          => 'Hình ảnh',
				'id'            => 'infrastructure-images',
				'type'          => 'image_advanced',
				'max_file_size' => '1gb',
				'tab'           => 'infrastructure'
			),
			array(
				'name'        => 'Nội dung',
				'id'          => 'evaluate-group',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'evaluate-title'),
				'add_button'  => 'Thêm',
				'tab'         => 'evaluate',
				'fields'      => array(
					array(
						'name'             => 'Avatar',
						'id'               => 'evaluate-images',
						'type'             => 'image_advanced',
						'max_file_uploads' => 1,
					),
					array(
						'name' => 'Tên',
						'id'   => 'evaluate-name',
						'type' => 'text',
						'size' => 50,
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'evaluate-content',
						'type' => 'text',
						'size' => 50,
					),
				),
			),
			array(
				'name' => 'Link Map',
				'id'   => 'map-link',
				'type' => 'text',
				'size' => 50,
				'tab'  => 'map',
			),
			array(
				'name' => 'iframe Map',
				'id'   => 'map-iframe',
				'type' => 'textarea',
				'size' => 50,
				'tab'  => 'map',
			),
		),
	);
	return $meta_boxes;
}