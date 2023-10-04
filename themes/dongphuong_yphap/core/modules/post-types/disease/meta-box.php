<?php
add_filter('mb_settings_pages', function ($settings_pages) {
	$settings_pages[] = [
		'id'          => 'disease-setting',
		'option_name' => 'disease_setting',
		'menu_title'  => 'Cài đặt bệnh điều trị',
		'parent'      => 'edit.php?post_type=disease',
	];
	return $settings_pages;
});

if (!function_exists('dongphuong_disease_setting_page')) {
	add_filter('rwmb_meta_boxes', 'dongphuong_disease_setting_page');
	function dongphuong_disease_setting_page($meta_boxes)
	{
		$meta_boxes[] = array(
			'title'          => __('Cài đặt bệnh điều trị'),
			'settings_pages' => 'disease-setting',
			'fields'         => array(
				array(
					'name'        => __('Cấu trúc slider'),
					'id'          => 'slider-disease-option',
					'type'        => 'group',
					'clone'       => true,
					'sort_clone'  => true,
					'collapsible' => true,
					'group_title' => array('field' => 'disease-slide-title'),
					'add_button'  => 'Thêm slide',
					'tab'         => 'slider',
					'fields'      => array(
						array(
							'name' => 'Tiêu đề',
							'id'   => 'disease-slide-title',
							'type' => 'text',
							'size' => 50,
						),
						array(
							'name'             => 'Hình ảnh desktop',
							'id'               => 'disease-slide-images',
							'type'             => 'image_advanced',
							'max_file_uploads' => 1,
						),
						array(
							'name'             => 'Hình ảnh mobile',
							'id'               => 'disease-slide-images-mb',
							'type'             => 'image_advanced',
							'max_file_uploads' => 1,
						),
					),
				),
			),
		);
		return $meta_boxes;
	}
}

if (!function_exists('dongphuong_disease_setting')) {
	add_filter('rwmb_meta_boxes', 'dongphuong_disease_setting');
	function dongphuong_disease_setting($meta_boxes)
	{
		$meta_boxes[] = array(
			'title'       => __('Cài đặt bệnh điều trị'),
			'id'          => 'disease-option',
			'post_types'  => 'disease',
			'context'     => 'normal',
			'priority'    => 'high',
			'tabs'        => array(
				'general'  => array(
						'label' => 'Thông tin chung',
						'icon'  => 'dashicons-editor-paste-text',
					),
				'slider'   => array(
						'label' => 'Slider',
						'icon'  => 'dashicons-editor-paste-text',
					),
				'solution' => array(
						'label' => 'Giải pháp',
						'icon'  => 'dashicons-editor-paste-text',
					),
				'prevent'  => array(
						'label' => 'Phòng tránh',
						'icon'  => 'dashicons-editor-paste-text',
					),
				'faq'      => array(
						'label' => 'FAQ',
						'icon'  => 'dashicons-editor-paste-text',
					),
			),
			'tab_style'   => 'box',
			'tab_wrapper' => true,
			'fields'      => array(
				array(
					'name'    => 'Nội dung',
					'id'      => 'disease-desc',
					'type'    => 'wysiwyg',
					'raw'     => false,
					'options' => [
						'textarea_rows' => 8,
						'teeny'         => false,
					],
					'tab'     => 'general',
				),
				array(
					'name'        => __('Cấu trúc slider'),
					'id'          => 'slider-disease-option',
					'type'        => 'group',
					'clone'       => true,
					'sort_clone'  => true,
					'collapsible' => true,
					'group_title' => array('field' => 'disease-slide-title'),
					'add_button'  => 'Thêm slide',
					'tab'         => 'slider',
					'fields'      => array(
						array(
							'name' => 'Tiêu đề',
							'id'   => 'disease-slide-title',
							'type' => 'text',
							'size' => 50,
						),
						array(
							'name'             => 'Hình ảnh desktop',
							'id'               => 'disease-slide-images',
							'type'             => 'image_advanced',
							'max_file_uploads' => 1,
						),
						array(
							'name'             => 'Hình ảnh mobile',
							'id'               => 'disease-slide-images-mb',
							'type'             => 'image_advanced',
							'max_file_uploads' => 1,
						),
					),
				),
				array(
					'name'        => __('Cấu trúc solution'),
					'id'          => 'solution-disease-option',
					'type'        => 'group',
					'clone'       => true,
					'sort_clone'  => true,
					'collapsible' => true,
					'group_title' => array('field' => 'disease-solution-title'),
					'add_button'  => 'Thêm giải pháp',
					'tab'         => 'solution',
					'fields'      => array(
						array(
							'name'    => 'Tiêu đề',
							'id'      => 'disease-solution-title',
							'type'    => 'wysiwyg',
							'raw'     => false,
							'options' => [
								'textarea_rows' => 8,
								'teeny'         => false,
							],
						),
						array(
							'name'             => 'Hình ảnh',
							'id'               => 'disease-solution-images',
							'type'             => 'image_advanced',
							'max_file_uploads' => 1,
						),
					),
				),
				array(
					'name'    => 'Nội dung',
					'id'      => 'disease-prevent-desc',
					'type'    => 'wysiwyg',
					'raw'     => false,
					'options' => [
						'textarea_rows' => 8,
						'teeny'         => false,
					],
					'tab'     => 'prevent',
				),
				array(
					'name'        => __('Cấu trúc faq'),
					'id'          => 'faq-disease-option',
					'type'        => 'group',
					'clone'       => true,
					'sort_clone'  => true,
					'collapsible' => true,
					'group_title' => array('field' => 'disease-faq-title'),
					'add_button'  => 'Thêm faq',
					'tab'         => 'faq',
					'fields'      => array(
						array(
							'name' => 'Tiêu đề',
							'id'   => 'disease-faq-title',
							'type' => 'text',
							'size' => 50,
						),
						array(
							'name'    => 'Nội dung',
							'id'      => 'disease-faq-desc',
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
		return $meta_boxes;
	}
}