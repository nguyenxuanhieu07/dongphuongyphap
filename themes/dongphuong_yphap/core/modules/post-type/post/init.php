<?php
if (!function_exists('create_meta_featured_post')) {
	add_filter('rwmb_meta_boxes', 'create_meta_featured_post');
	function create_meta_featured_post(array $meta_boxes)
	{
		$bs_user        = get_users(array('role' => 'bs'));
		$bs_users_array = array();
		foreach ($bs_user as $user) {
			$bs_users_array[$user->ID] = $user->display_name;
		}
		$meta_boxes[] = array(
			'id'         => 'post_adv_setup',
			'title'      => __('Cài đặt', 'dpyp'),
			'pages'      => array('post'),
			'context'    => 'side',
			'priority'   => 'high',
			'show_names' => true,
			'fields'     => array(
				array(
					'name' => __('', 'dpyp'),
					'desc' => __('Tích chọn bài viết nổi bật', 'dpyp'),
					'id'   => 'featured_link_target',
					'type' => 'checkbox',
				),
			),
		);

		$meta_boxes[] = array(
			'id'         => 'category_setting',
			'title'      => 'Tùy chọn hiển thị',
			'post_types' => array('post'),
			'taxonomies' => array('category'),
			'context'    => 'normal',
			'priority'   => 'high',
			'fields'     => array(
				array(
					'name'        => 'Bác sĩ',
					'id'          => 'specialize-doctor',
					'type'        => 'select_advanced',
					'multiple'    => false,
					'placeholder' => 'Chọn bác sĩ',
					'options'     => $bs_users_array,
				),
			),
		);
		$meta_boxes[] = array(
			'title'      => 'Cấu trúc nội dung',
			'post_types' => 'post',
			'context'    => 'normal',
			'priority'   => 'high',
			'fields'     => array(
				array(	
					'id'        => 'post_enable_structure',
					'name'      => 'Sử dụng cấu trúc mới',
					'type'      => 'switch',
					'style'     => 'rounded',
					'on_label'  => 'Yes',
					'off_label' => 'No',
				),
				array(
					'name'        => __(''),
					'visible'     => array('post_enable_structure', '=', '1'),
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