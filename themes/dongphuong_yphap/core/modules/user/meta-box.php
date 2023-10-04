<?php
add_action('rwmb_meta_boxes', function ($meta_boxes) {
	$options  = get_option('dongphuong-theme-options');
	$degree   = [];
	$position = [];
	foreach ($options['degree-group'] as $key => $value) {
		$degree[$value['degree-group-title']] = $value['degree-group-title'];
	}
	foreach ($options['position-group'] as $key => $value) {
		$position[$value['position-group-title']] = $value['position-group-title'];
	}
	$meta_boxes[] = array(
		'id'          => 'expert-post-meta',
		'title'       => 'Hồ sơ thành viên',
		'type'        => 'user',
		'context'     => 'normal',
		'priority'    => 'high',
		'tabs'        => array(
			'general'      => array(
					'label' => 'Thông tin chung',
					'icon'  => 'dashicons-editor-paste-text',
				),
			'train'        => array(
					'label' => 'Quá trình đào tạo',
					'icon'  => 'dashicons-buddicons-topics',
				),
			'reward'       => array(
					'label' => 'Giải thưởng',
					'icon'  => 'dashicons-buddicons-replies',
				),
			'exp'          => array(
					'label' => 'Kinh nghiệm',
					'icon'  => 'dashicons-beer',
				),
			'construction' => array(
					'label' => 'Công trình nghiên cứu',
					'icon'  => 'dashicons-megaphone',
				),
			'organization' => array(
					'label' => 'Tổ chức / cơ quan',
					'icon'  => 'dashicons-megaphone',
				),
		),
		'tab_style'   => 'box',
		'tab_wrapper' => true,
		'fields'      => array(
			array(
				'name'    => 'Giới thiệu',
				'id'      => 'user-desc',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'general',
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
				'type'        => 'radio',
				'options'     => array(
					'hn'  => 'Biệt thự B31, ngõ 70 Nguyễn Thị Định, Nhân Chính. Thanh Xuân, Hà Nội',
					'hcm' => 'Số 145 Hoa Lan, phường 2, quận Phú Nhuận, HCM'
				),
				'tab'         => 'general',
			),
			array(
				'name'        => 'Học hàm / học vị',
				'placeholder' => 'Lựa chọn',
				'id'          => 'degree-user',
				'type'        => 'select_advanced',
				'options'     => $degree,
				'multiple'    => true,
				'tab'         => 'general',
			),
			array(
				'name'        => 'Chức vụ',
				'placeholder' => 'Lựa chọn',
				'id'          => 'position-user',
				'type'        => 'select_advanced',
				'options'     => $position,
				'multiple'    => true,
				'tab'         => 'general',
			),
			array(
				'name'    => 'Nội dung',
				'id'      => 'reward-desc-user',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'reward',
			),
			array(
				'name'    => 'Nội dung',
				'id'      => 'train-desc-user',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'train',
			),
			array(
				'name'    => 'Nội dung',
				'id'      => 'exp-desc-user',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'exp',
			),
			array(
				'name'    => 'Nội dung',
				'id'      => 'construction-desc-user',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'construction',
			),
			array(
				'name'    => 'Nội dung',
				'id'      => 'construction-desc-user',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'organization',
			),
		),
	);

	return $meta_boxes;
});