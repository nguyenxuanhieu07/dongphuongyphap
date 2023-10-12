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
			// Post type
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
				array(
					'name' => __('', 'dpyp'),
					'desc' => __('Bật/tắt box liên hệ cuối bài', 'dpyp'),
					'id'   => 'show_contact_box',
					'type' => 'checkbox',
					'std'  => 1
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
		return $meta_boxes;
	}
}