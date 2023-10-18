<?php
add_filter('rwmb_meta_boxes', 'dongphuong_products_metabox');
function dongphuong_products_metabox($meta_boxes)
{
	$meta_boxes[] = array(
		'title'       => __('Cấu trúc nội dung'),
		'id'          => 'products-option',
		'post_types'  => 'product',
		'context'     => 'normal',
		'priority'    => 'high',
		'tabs'        => array(
			'general'   => array(
				'label' => 'Thông tin sản phẩm',
				'icon'  => 'dashicons-editor-paste-text',
			),
			'information' => array(
				'label' => 'Thông tin tổng quan',
				'icon'  => 'dashicons-align-right',
			),
			'uses' => array(
				'label' => 'Công dụng',
				'icon'  => 'dashicons-align-right',
			),
			'uses-object'        => array(
				'label' => 'Đối tượng sử dụng',
				'icon'  => 'dashicons-align-right',
			),
			'usesing-product' => array(
				'label' => 'Cách dùng',
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
				'name'    => 'Mô tả sản phẩm',
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
				'name' => 'Một số hình ảnh sản phẩm',
				'id'   => 'product-gallery',
				'type' => 'image_advanced',
				'tab'  => 'general',
			),
			array(
				'name'    => 'Mô tả thông tin',
				'id'      => 'product-information-content',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'information',
			),
			array(
				'name'        => __('Thông tin tổng quan'),
				'id'          => 'product-information',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'information-title'),
				'add_button'  => 'Thêm thông tin',
				'tab'         => 'information',
				'fields'      => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'information-title',
						'type' => 'text',
						'size' => 50,
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'information-content',
						'type' => 'text',
						'size' => 50,
					),
				),
			),
			array(
				'name'        => __('Công dụng'),
				'id'          => 'product-uses',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'product-uses'),
				'add_button'  => 'Thêm công dụng',
				'tab'         => 'uses',
				'fields'      => array(
					array(
						'name' => 'Công dụng',
						'id'   => 'product-uses',
						'type' => 'text',
						'size' => 50,
					),
				),
			),
			array(
				'name'        => __('Đối tượng nên sử dụng'),
				'id'          => 'product-uses-object',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'product-uses-object'),
				'add_button'  => 'Thêm ',
				'tab'         => 'uses-object',
				'fields'      => array(
					array(
						'name' => 'Đối tượng',
						'id'   => 'product-uses-object',
						'type' => 'text',
						'size' => 50,
					),
				),
			),
			array(
				'name'        => __('Đối tượng không nên sử dụng'),
				'id'          => 'product-not-uses-object',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'product-not-uses-object'),
				'add_button'  => 'Thêm ',
				'tab'         => 'uses-object',
				'fields'      => array(
					array(
						'name' => 'Đối tượng',
						'id'   => 'product-not-uses-object',
						'type' => 'text',
						'size' => 50,
					),
				),
			),
			array(
				'name'    => 'Mô tả thông tin',
				'id'      => 'usesing-product-content',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'usesing-product',
			),
		),
	);
	return $meta_boxes;
}