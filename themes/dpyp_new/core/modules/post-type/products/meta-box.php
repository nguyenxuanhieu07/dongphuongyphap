<?php
add_filter('rwmb_meta_boxes', 'dongphuong_products_metabox');
function dongphuong_products_metabox($meta_boxes)
{
	$meta_boxes[] = array(
		'title'       => __('Cấu trúc nội dung'),
		'id'          => 'products-option',
		'post_types'  => 'products',
		'context'     => 'normal',
		'priority'    => 'high',
		'tabs'        => array(
			'general'   => array(
				'label' => 'Thông tin sản phẩm',
				'icon'  => 'dashicons-editor-paste-text',
			),
			'gallery'   => array(
				'label' => 'Ảnh gallery',
				'icon'  => 'dashicons-format-image',
			),
			'structure' => array(
				'label' => 'Cấu trúc nội dung',
				'icon'  => 'dashicons-align-right',
			),
		),
		'tab_style'   => 'box',
		'tab_wrapper' => true,
		'fields'      => array(
			array(
				'name' => 'Tên sản phẩm',
				'id'   => 'product-name',
				'type' => 'text',
				'size' => 50,
				'tab'  => 'general',
			),
			array(
				'name' => 'Giá gốc',
				'id'   => 'product-price',
				'type' => 'number',
				'size' => 50,
				'tab'  => 'general',
			),
			array(
				'name' => 'Giá sale',
				'id'   => 'product-sale',
				'type' => 'number',
				'size' => 50,
				'tab'  => 'general',
			),
			array(
				'name'    => 'Mô tả ngắn',
				'id'      => 'product-desc',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'general',
			),
			array(
				'name' => 'Hình ảnh',
				'id'   => 'product-gallery',
				'type' => 'image_advanced',
				'tab'  => 'gallery',
			),
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
						),
					),
				),
			),
		),
	);
	return $meta_boxes;
}

if (!function_exists('dongphuong_setting_produts')) {
	add_filter('mb_settings_pages', 'dongphuong_setting_produts');
	function dongphuong_setting_produts($settings_pages)
	{
		$settings_pages[] = array(
			'id'          => 'dongphuong-setting-products',
			'option_name' => 'dongphuong-setting-products',
			'menu_title'  => __('Cài đặt chung', 'dongphuong_yphap'),
			'icon_url'    => 'dashicons-admin-generic',
			'parent'      => 'edit.php?post_type=products',
		);
		return $settings_pages;
	}
}
if (!function_exists('dongphuong_product_setting_metabox')) {
	add_filter('rwmb_meta_boxes', 'dongphuong_product_setting_metabox');
	function dongphuong_product_setting_metabox($meta_boxes)
	{
		$pages        = get_pages();
		$option_page   = [];
		if (!empty($pages)) {
			foreach ($pages as $key => $value) {
				$option_page[$value->ID] = $value->post_title;
			}
		}
		$meta_boxes[] = array(
			'title'          => __('Trang liên kết'),
			'settings_pages' => 'dongphuong-setting-products',
			'fields'         => array(
				array(
					'name'        => 'Trang thanh toán',
					'placeholder' => 'Lựa chọn',
					'id'          => 'page-checkout',
					'type'        => 'select_advanced',
					'options'     => $option_page,
					'multiple'    => false,
				),
			),
		);
		return $meta_boxes;
	}
}