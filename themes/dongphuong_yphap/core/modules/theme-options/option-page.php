<?php
if (!function_exists('dongphuong_theme_option_settings_pages')) {
	add_filter('mb_settings_pages', 'dongphuong_theme_option_settings_pages');
	function dongphuong_theme_option_settings_pages($settings_pages)
	{
		$settings_pages[] = array(
			'id'          => 'dongphuong-theme-options',
			'option_name' => 'dongphuong-theme-options',
			'menu_title'  => __('Cài đặt chung', 'dongphuong_yphap'),
			'icon_url'    => 'dashicons-admin-generic',
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
							'size' => 80,
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
							'size' => 80,
						),
					),
				),
			),
		);
		return $meta_boxes;
	}
}