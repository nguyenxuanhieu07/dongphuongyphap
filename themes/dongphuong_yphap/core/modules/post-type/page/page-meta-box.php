<?php
add_filter('rwmb_meta_boxes', 'meta_box_langding_page');
function meta_box_langding_page($meta_boxes)
{
	$settings     = get_option('option_pages');
	$basis = array();
	foreach ($settings['option-basis'] as $key => $value) {
		$basis[$key+1] = $value['basis-address'];
	}
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
		'id'         => 'page-activity-meta',
		'title'      => 'Cấu trúc nội dung',
		'post_types' => 'page',
		'include'    => array(
			'template' => array('template-pages/page-news-activity.php'),
		),
		'fields'     => array(
			array(
				'name'        => __('Cấu trúc'),
				'id'          => 'news-activity-option',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'news-activity-select'),
				'add_button'  => 'Thêm',
				'fields'      => array(
					array(
						'name'        => 'Chuyên mục',
						'id'          => 'news-activity-select',
						'type'        => 'taxonomy_advanced',
						'field_type'  => 'select_advanced',
						'placeholder' => 'Lựa chọn',
						'ajax'        => true,
						'taxonomy'    => 'category',
						'query_args'  => array(
							'parent' => 0
						),
					),
				),
			),
		),
	);
	$meta_boxes[] = array(
		'id'         => 'page-faq-meta',
		'title'      => 'Cấu trúc nội dung',
		'post_types' => 'page',
		'include'    => array(
			'template' => array('template-pages/page-faq.php'),
		),
		'fields'     => array(
			array(
				'name'        => __('Câu hỏi thường gặp'),
				'id'          => 'page-faq-group',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'page-faq-title'),
				'add_button'  => 'Thêm',
				'fields'      => array(
					array(
						'name' => 'Câu hỏi',
						'id'   => 'page-faq-title',
						'type' => 'text',
						'size' => 50,
					),
					array(
						'name'    => 'Câu trả lời',
						'id'      => 'page-faq-content',
						'type'    => 'wysiwyg',
						'raw'     => false,
						'options' => [
							'textarea_rows' => 8,
							'teeny'         => false,
						],
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
		),
		'tab_style'   => 'box',
		'tab_wrapper' => true,
		'fields'      => array(
			array(
				'name'        => 'chọn địa chỉ',
				'placeholder' => 'Lựa chọn',
				'id'          => 'page-basis-address',
				'type'        => 'select_advanced',
				'options'     => $basis,
				'multiple'    => false,
				'tab'         => 'general'
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
		),
	);
	return $meta_boxes;
}