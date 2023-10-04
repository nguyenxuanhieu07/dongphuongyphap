<?php
add_filter('rwmb_meta_boxes', 'dongphuong_solution_metabox');
function dongphuong_solution_metabox($meta_boxes)
{
	$bs_user        = get_users(array('role' => 'bs'));
	$bs_users_array = array();
	foreach ($bs_user as $user) {
		$bs_users_array[$user->ID] = $user->display_name;
	}
	$meta_boxes[] = array(
		'id'         => 'specialize-options',
		'title'      => 'Hiện thị thông tin',
		'taxonomies' => array('specialize'),
		'context'    => 'normal',
		'style'      => 'default',
		'priority'   => 'high',
		'fields'     => array(
			array(
				'name'        => 'Bác sĩ',
				'id'          => 'specialize-doctor',
				'type'        => 'select_advanced',
				'multiple'    => true,
				'placeholder' => 'Chọn bác sĩ',
				'options'     => $bs_users_array,
			),
		),
	);
	return $meta_boxes;
}

if (!function_exists('dongphuong_solution_setting')) {
	add_filter('rwmb_meta_boxes', 'dongphuong_solution_setting');
	function dongphuong_solution_setting($meta_boxes)
	{
		$meta_boxes[] = array(
			'title'       => __('Cài đặt bệnh điều trị'),
			'id'          => 'solution-option',
			'post_types'  => 'solution',
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
					'id'      => 'solution-desc',
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
					'id'          => 'slider-solution-option',
					'type'        => 'group',
					'clone'       => true,
					'sort_clone'  => true,
					'collapsible' => true,
					'group_title' => array('field' => 'solution-slide-title'),
					'add_button'  => 'Thêm slide',
					'tab'         => 'slider',
					'fields'      => array(
						array(
							'name' => 'Tiêu đề',
							'id'   => 'solution-slide-title',
							'type' => 'text',
							'size' => 50,
						),
						array(
							'name'             => 'Hình ảnh desktop',
							'id'               => 'solution-slide-images',
							'type'             => 'image_advanced',
							'max_file_uploads' => 1,
						),
						array(
							'name'             => 'Hình ảnh mobile',
							'id'               => 'solution-slide-images-mb',
							'type'             => 'image_advanced',
							'max_file_uploads' => 1,
						),
					),
				),
				array(
					'name'        => __('Cấu trúc solution'),
					'id'          => 'solution-solution-option',
					'type'        => 'group',
					'clone'       => true,
					'sort_clone'  => true,
					'collapsible' => true,
					'group_title' => array('field' => 'solution-solution-title'),
					'add_button'  => 'Thêm giải pháp',
					'tab'         => 'solution',
					'fields'      => array(
						array(
							'name'    => 'Tiêu đề',
							'id'      => 'solution-solution-title',
							'type'    => 'wysiwyg',
							'raw'     => false,
							'options' => [
								'textarea_rows' => 8,
								'teeny'         => false,
							],
						),
						array(
							'name'             => 'Hình ảnh',
							'id'               => 'solution-solution-images',
							'type'             => 'image_advanced',
							'max_file_uploads' => 1,
						),
					),
				),
				array(
					'name'    => 'Nội dung',
					'id'      => 'solution-prevent-desc',
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
					'id'          => 'faq-solution-option',
					'type'        => 'group',
					'clone'       => true,
					'sort_clone'  => true,
					'collapsible' => true,
					'group_title' => array('field' => 'solution-faq-title'),
					'add_button'  => 'Thêm faq',
					'tab'         => 'faq',
					'fields'      => array(
						array(
							'name' => 'Tiêu đề',
							'id'   => 'solution-faq-title',
							'type' => 'text',
							'size' => 50,
						),
						array(
							'name'    => 'Nội dung',
							'id'      => 'solution-faq-desc',
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