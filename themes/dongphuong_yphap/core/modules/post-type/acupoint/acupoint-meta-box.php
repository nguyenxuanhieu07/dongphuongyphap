<?php
if (!function_exists('create_meta_acupoints_post')) {
	add_filter('rwmb_meta_boxes', 'create_meta_acupoints_post');
	function create_meta_acupoints_post(array $meta_boxes)
	{
		$meta_boxes[] = array(
			'title'      => 'Cấu trúc nội dung',
			'post_types' => 'acupoints',
			'context'    => 'normal',
			'priority'   => 'high',
			'fields'     => array(
				array(
					'name' => 'Tên rút gọn',
					'id'   => 'acupoints-name-short',
					'type' => 'text',
					'size' => 50,
				),
				array(
					'name'        => __(''),
					'id'          => 'post-group-content',
					'type'        => 'group',
					'clone'       => true,
					'sort_clone'  => true,
					'collapsible' => true,
					'group_title' => array('field' => 'post-title'),
					'add_button'  => 'Thêm',
					'fields'      => array(
						array(
							'name' => 'Tiêu đề',
							'id'   => 'post-title',
							'type' => 'text',
							'size' => 50,
						),
						array(
							'name'    => 'Nội dung',
							'id'      => 'post-content',
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