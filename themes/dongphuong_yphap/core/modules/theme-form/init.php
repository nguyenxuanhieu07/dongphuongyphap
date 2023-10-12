<?php

if (!function_exists('form_dat_lich')) {
	function form_dat_lich()
	{
		$option_name = 'option_form';

		$google_action     = rwmb_meta('google-form-action', array('object_type' => 'setting'), $option_name);
		$entry_fullname    = rwmb_meta('google-form-entry-fullname', array('object_type' => 'setting'), $option_name);
		$entry_numberphone = rwmb_meta('google-form-entry-numberphone', array('object_type' => 'setting'), $option_name);
		$entry_email       = rwmb_meta('google-form-entry-email', array('object_type' => 'setting'), $option_name);

		$entry_pathological = rwmb_meta('google-form-entry-pathological', array('object_type' => 'setting'), $option_name);
		$entry_basis        = rwmb_meta('google-form-entry-basis', array('object_type' => 'setting'), $option_name);
		$entry_doctor       = rwmb_meta('google-form-entry-doctor', array('object_type' => 'setting'), $option_name);
		$entry_date         = rwmb_meta('google-form-entry-date', array('object_type' => 'setting'), $option_name);
		$entry_time         = rwmb_meta('google-form-entry-time', array('object_type' => 'setting'), $option_name);
		$entry_note         = rwmb_meta('google-form-entry-note', array('object_type' => 'setting'), $option_name);

		$entry_data_url         = rwmb_meta('google-form-entry-url', array('object_type' => 'setting'), $option_name);
		$entry_data_referer_url = rwmb_meta('google-form-entry-referer-url', array('object_type' => 'setting'), $option_name);

		$fields        = array(
			$entry_fullname         => $_POST["fullname"],
			$entry_numberphone      => $_POST["numberphone"],
			$entry_email            => $_POST["email"],

			$entry_pathological     => $_POST["pathological"],
			$entry_basis            => $_POST["basis"],
			$entry_doctor           => $_POST["doctor"],
			$entry_date             => $_POST["booking_date"],
			$entry_time             => $_POST["booking_time"],
			$entry_note             => $_POST["note"],

			$entry_data_url         => $_POST["data_url"],
			$entry_data_referer_url => $_POST["data_url_refer"]
		);
		$fields_string = http_build_query($fields);
		$url           = $google_action;
		$curl          = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_exec($curl);
		curl_close($curl);
		header("Refresh:0");
		die();
	}
	add_action('wp_ajax_nopriv_form_dat_lich', 'form_dat_lich');
	add_action('wp_ajax_form_dat_lich', 'form_dat_lich');
}
if (!function_exists('form_thanh_toan')) {
	function form_thanh_toan()
	{
		session_start();
		$option_name = 'option_form';

		$google_action     = rwmb_meta('checkout-action', array('object_type' => 'setting'), $option_name);
		$entry_fullname    = rwmb_meta('checkout-fullname', array('object_type' => 'setting'), $option_name);
		$entry_numberphone = rwmb_meta('checkout-numberphone', array('object_type' => 'setting'), $option_name);
		$entry_email       = rwmb_meta('checkout-email', array('object_type' => 'setting'), $option_name);

		$entry_address      = rwmb_meta('checkout-address', array('object_type' => 'setting'), $option_name);
		$entry_content      = rwmb_meta('checkout-content', array('object_type' => 'setting'), $option_name);
		$entry_product_name = rwmb_meta('checkout-product-name', array('object_type' => 'setting'), $option_name);
		$entry_price        = rwmb_meta('checkout-product-price', array('object_type' => 'setting'), $option_name);
		$entry_pay          = rwmb_meta('checkout-pay', array('object_type' => 'setting'), $option_name);

		$fields        = array(
			$entry_fullname     => $_POST["fullname"],
			$entry_numberphone  => $_POST["numberphone"],
			$entry_email        => $_POST["email"],

			$entry_address      => $_POST["address"],
			$entry_content      => $_POST["content"],
			$entry_product_name => $_POST["product_name"],
			$entry_price        => $_POST["total_price"],
			$entry_pay          => $_POST["pay"],
		);
		foreach ($_SESSION["cart"]['cart-item'] as $key => $value) {
			$total_buy = get_post_meta($key, 'total-buy', true) ? get_post_meta($key, 'total-buy', true) : 0;
			update_post_meta($key, 'total-buy', $total_buy + $value['quantity']);
		}
		$fields_string = http_build_query($fields);
		$url           = $google_action;
		$curl          = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_exec($curl);
		curl_close($curl);
		unset($_SESSION["cart"]);
		header("Refresh:0");
		die();
	}
	add_action('wp_ajax_nopriv_form_thanh_toan', 'form_thanh_toan');
	add_action('wp_ajax_form_thanh_toan', 'form_thanh_toan');
}
if (!function_exists('form_send_contact')) {
	function form_send_contact()
	{
		$option_name = 'option_form';

		$google_action     = rwmb_meta('google-form-contact-action', array('object_type' => 'setting'), $option_name);
		$entry_fullname    = rwmb_meta('google-form-contact-entry-fullname', array('object_type' => 'setting'), $option_name);
		$entry_numberphone = rwmb_meta('google-form-contact-entry-numberphone', array('object_type' => 'setting'), $option_name);
		$entry_email       = rwmb_meta('google-form-contact-entry-email', array('object_type' => 'setting'), $option_name);

		$entry_subject = rwmb_meta('google-form-contact-entry-subject', array('object_type' => 'setting'), $option_name);
		$entry_content = rwmb_meta('google-form-contact-entry-content', array('object_type' => 'setting'), $option_name);

		$entry_data_url         = rwmb_meta('google-form-contact-entry-url', array('object_type' => 'setting'), $option_name);
		$entry_data_referer_url = rwmb_meta('google-form-contact-entry-referer-url', array('object_type' => 'setting'), $option_name);

		$fields = array(
			$entry_fullname         => $_POST["fullname"],
			$entry_numberphone      => $_POST["phone"],
			$entry_email            => $_POST["email"],
			$entry_subject          => $_POST["subject"],
			$entry_content          => $_POST["content"],

			$entry_data_url         => $_POST["data_url"],
			$entry_data_referer_url => $_POST["data_url_refer"]
		);

		$fields_string = http_build_query($fields);

		$url  = $google_action;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
		curl_exec($curl);
		curl_close($curl);
		header("Refresh:0");
		die();
	}
	add_action('wp_ajax_nopriv_form_send_contact', 'form_send_contact');
	add_action('wp_ajax_form_send_contact', 'form_send_contact');
}

if (!function_exists('form_send_sidebar')) {
	function form_send_sidebar()
	{
		$option_name = 'option_form';

		$google_action     = rwmb_meta('google-form-sidebar-action', array('object_type' => 'setting'), $option_name);
		$entry_fullname    = rwmb_meta('google-form-sidebar-entry-fullname', array('object_type' => 'setting'), $option_name);
		$entry_numberphone = rwmb_meta('google-form-sidebar-entry-numberphone', array('object_type' => 'setting'), $option_name);
		$entry_email       = rwmb_meta('google-form-sidebar-entry-email', array('object_type' => 'setting'), $option_name);

		$entry_category = rwmb_meta('google-form-sidebar-entry-category', array('object_type' => 'setting'), $option_name);
		$entry_content  = rwmb_meta('google-form-sidebar-entry-content', array('object_type' => 'setting'), $option_name);

		$entry_data_url         = rwmb_meta('google-form-sidebar-entry-url', array('object_type' => 'setting'), $option_name);
		$entry_data_referer_url = rwmb_meta('google-form-sidebar-entry-referer-url', array('object_type' => 'setting'), $option_name);

		$fields = array(
			$entry_fullname         => $_POST["fullname"],
			$entry_numberphone      => $_POST["phone"],
			$entry_email            => $_POST["email"],
			$entry_category         => $_POST["category"],
			$entry_content          => $_POST["content"],

			$entry_data_url         => $_POST["data_url"],
			$entry_data_referer_url => $_POST["data_url_refer"]
		);

		$fields_string = http_build_query($fields);

		$url  = $google_action;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
		curl_exec($curl);
		curl_close($curl);
		header("Refresh:0");
		die();
	}
	add_action('wp_ajax_nopriv_form_send_sidebar', 'form_send_sidebar');
	add_action('wp_ajax_form_send_sidebar', 'form_send_sidebar');
}

if (!function_exists('form_send_footer')) {
	function form_send_footer()
	{
		$option_name = 'option_form';

		$google_action     = rwmb_meta('google-form-footer-action', array('object_type' => 'setting'), $option_name);
		$entry_fullname    = rwmb_meta('google-form-footer-entry-fullname', array('object_type' => 'setting'), $option_name);
		$entry_numberphone = rwmb_meta('google-form-footer-entry-numberphone', array('object_type' => 'setting'), $option_name);

		$entry_data_url         = rwmb_meta('google-form-footer-entry-url', array('object_type' => 'setting'), $option_name);
		$entry_data_referer_url = rwmb_meta('google-form-footer-entry-referer-url', array('object_type' => 'setting'), $option_name);

		$fields = array(
			$entry_fullname         => $_POST["fullname"],
			$entry_numberphone      => $_POST["phone"],

			$entry_data_url         => $_POST["data_url"],
			$entry_data_referer_url => $_POST["data_url_refer"]
		);

		$fields_string = http_build_query($fields);

		$url  = $google_action;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
		curl_exec($curl);
		curl_close($curl);
		header("Refresh:0");
		die();
	}
	add_action('wp_ajax_nopriv_form_send_footer', 'form_send_footer');
	add_action('wp_ajax_form_send_footer', 'form_send_footer');
}