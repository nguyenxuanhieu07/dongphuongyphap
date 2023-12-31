<?php
add_action('rwmb_meta_boxes', function ($meta_boxes) {
	$options  = get_option('dongphuong-theme-options');
	$degree   = [];
	$position = [];
	if (!empty($options['degree-group'])) {
		foreach ($options['degree-group'] as $key => $value) {
			$degree[$value['degree-group-title']] = $value['degree-group-title'];
		}
	}
	if (!empty($options['position-group'])) {
		foreach ($options['position-group'] as $key => $value) {
			$position[$value['position-group-title']] = $value['position-group-title'];
		}
	}
	$settings = get_option('option_pages');
	$basis    = array();
	foreach ($settings['option-basis'] as $key => $value) {
		$basis[$key + 1] = $value['basis-address'];
	}
	$meta_boxes[] = array(
		'id'          => 'expert-post-meta',
		'title'       => 'Hồ sơ thành viên',
		'type'        => 'user',
		'context'     => 'normal',
		'priority'    => 'high',
		'tabs'        => array(
			'general'   => array(
				'label' => 'Thông tin chung',
				'icon'  => 'dashicons-editor-paste-text',
			),
			'structure' => array(
				'label' => 'Cấu trúc nội dung',
				'icon'  => 'dashicons-buddicons-topics',
			),
			'social'    => array(
				'label' => 'Mạng xã hội',
				'icon'  => 'dashicons-buddicons-topics',
			),
		),
		'tab_style'   => 'box',
		'tab_wrapper' => true,
		'fields'      => array(
			array(
				'name'        => __('Cấu trúc nội dung'),
				'id'          => 'user-structure',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'structure-title'),
				'add_button'  => 'Thêm cấu trúc',
				'tab'         => 'structure',
				'fields'      => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'structure-title',
						'type' => 'text',
						'size' => 50,
					),
					array(
						'name'        => 'Giao diện hiển thị',
						'placeholder' => 'Lựa chọn giao diện',
						'id'          => 'style-structure',
						'type'        => 'select_advanced',
						'options'     => array(
							'style_1' => 'Giao diện nội dung',
							'style_2' => 'Giao diện khác'
						),
						'multiple'    => false,
					),
					array(
						'visible' => ['style-structure', '=', 'style_1'],
						'name'    => 'Nội dung',
						'id'      => 'disease-faq-desc',
						'type'    => 'wysiwyg',
						'raw'     => false,
						'options' => [
							'textarea_rows' => 8,
							'teeny'         => false,
						],
					),
					array(
						'visible'     => ['style-structure', '=', 'style_2'],
						'name'        => 'Nội dung',
						'id'          => 'structure-option2',
						'type'        => 'group',
						'clone'       => true,
						'sort_clone'  => true,
						'collapsible' => true,
						'group_title' => array('field' => 'structure-option2-title'),
						'add_button'  => 'Thêm',
						'fields'      => array(
							array(
								'name'             => 'Hình ảnh',
								'id'               => 'structure-option2-images',
								'type'             => 'image_advanced',
								'max_file_uploads' => 1,
							),
							array(
								'name' => 'Tiêu đề',
								'id'   => 'structure-option2-title',
								'type' => 'text',
								'size' => 50,
							),
							array(
								'name' => 'Link',
								'id'   => 'structure-option2-link',
								'type' => 'text',
								'size' => 50,
							),
						),
					),
				),
			),
			array(
				'name' => 'Họ tên',
				'id'   => 'user-name',
				'type' => 'text',
				'size' => 30,
				'tab'  => 'general',
			),
			array(
				'name'        => 'Học hàm / học vị',
				'placeholder' => 'Lựa chọn',
				'id'          => 'degree-user',
				'type'        => 'select_advanced',
				'options'     => $degree,
				'multiple'    => false,
				'tab'         => 'general',
			),
			array(
				'name'        => 'Chức vụ',
				'placeholder' => 'Lựa chọn',
				'id'          => 'position-user',
				'type'        => 'select_advanced',
				'options'     => $position,
				'multiple'    => false,
				'tab'         => 'general',
			),
			array(
				'name'     => 'Lĩnh vực chuyên môn',
				'id'       => 'user-specialize',
				'type'     => 'taxonomy',
				'taxonomy' => 'specialize',
				'ajax'     => true,
				'multiple' => true,
				'tab'      => 'general',
			),
			array(
				'name' => 'Số năm kinh nghiệm',
				'id'   => 'user-exp',
				'type' => 'number',
				'size' => 30,
				'tab'  => 'general',
			),
			array(
				'name'        => 'Nơi công tác',
				'placeholder' => 'Lựa chọn',
				'id'          => 'workplace-user',
				'type'        => 'select_advanced',
				'options'     => $basis,
				'multiple'    => false,
				'tab'         => 'general',
			),
			array(
				'name' => 'Facebook',
				'id'   => 'dt_facebook',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'social',
			),
			array(
				'name' => 'Instagram',
				'id'   => 'dt_instagram',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'social',
			),
			array(
				'name' => 'Linkedin',
				'id'   => 'dt_linkedin',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'social',
			),
			array(
				'name' => 'Pinterest',
				'id'   => 'dt_pinterest',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'social',
			),
			array(
				'name' => 'Soundcloud',
				'id'   => 'dt_soundcloud',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'social',
			),
			array(
				'name' => 'Twitter',
				'id'   => 'dt_twitter',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'social',
			),
			array(
				'name' => 'Youtube',
				'id'   => 'dt_youtube',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'social',
			),
			array(
				'name' => 'Wikipedia',
				'id'   => 'dt_wikipedia',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'social',
			),
		),
	);

	return $meta_boxes;
});

if (!function_exists('dongphuong_theme_option_settings_pages')) {
	add_filter('mb_settings_pages', 'dongphuong_theme_option_settings_pages');
	function dongphuong_theme_option_settings_pages($settings_pages)
	{
		$settings_pages[] = array(
			'id'          => 'dongphuong-theme-options',
			'option_name' => 'dongphuong-theme-options',
			'menu_title'  => __('Cài đặt chung', 'dongphuong_yphap'),
			'icon_url'    => 'dashicons-admin-generic',
			'parent'      => 'users.php',
		);
		return $settings_pages;
	}
}
if (!function_exists('dongphuong_theme_option_meta_box')) {
	add_filter('rwmb_meta_boxes', 'dongphuong_theme_option_meta_box');
	function dongphuong_theme_option_meta_box($meta_boxes)
	{
		$meta_boxes[] = array(
			'title'          => __('Học hàm / học vị'),
			'settings_pages' => 'dongphuong-theme-options',
			'fields'         => array(
				array(
					'name'        => __('Học hàm / học vị', 'dongphuong_yphap'),
					'id'          => 'degree-group',
					'type'        => 'group',
					'clone'       => true,
					//'sort_clone'  => true,
					'collapsible' => true,
					'group_title' => array('field' => 'degree-group-title'),
					'save_state'  => true,
					'add_button'  => 'Thêm học hàm / học vị',
					'fields'      => array(
						array(
							'name' => 'Tên',
							'id'   => 'degree-group-title',
							'type' => 'text',
							'size' => 50,
						),
					),
				),
			),
		);
		$meta_boxes[] = array(
			'title'          => __('Chức vụ'),
			'settings_pages' => 'dongphuong-theme-options',
			'fields'         => array(
				array(
					'name'        => __('Chức vụ', 'dongphuong_yphap'),
					'id'          => 'position-group',
					'type'        => 'group',
					'clone'       => true,
					//'sort_clone'  => true,
					'collapsible' => true,
					'group_title' => array('field' => 'position-group-title'),
					'save_state'  => true,
					'add_button'  => 'Thêm Chức vụ',
					'fields'      => array(
						array(
							'name' => 'Tên',
							'id'   => 'position-group-title',
							'type' => 'text',
							'size' => 50,
						),
					),
				),
			),
		);
		return $meta_boxes;
	}
}