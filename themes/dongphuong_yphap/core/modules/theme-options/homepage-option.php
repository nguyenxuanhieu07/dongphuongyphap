<?php
add_filter('mb_settings_pages', 'dongphuong_homepage_options');
function dongphuong_homepage_options($settings_pages)
{
	if (current_user_can('user_aprove_comments'))
		return;
	$settings_pages[] = array(
		'id'          => 'dongphuong-homepage-options',
		'option_name' => 'dongphuong-homepage-options',
		'menu_title'  => 'Trang chủ',
		'parent'      => 'dongphuong-theme-options',
	);
	return $settings_pages;
}