<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'rwmb_meta_boxes', 'cmb_testinomial_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_testinomial_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['testinomial_metabox'] = array(
		'id'         => 'testinomial_metabox',
		'title'      => __( 'Options', 'cmb' ),
		'pages'      => array( 'testimonial', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(			
			
			array(
				'name' => __( 'Tên người chia sẻ', 'cmb' ),
				'desc' => __( 'Nhập tên hiển thị', 'cmb' ),
				'id'   => $prefix . 'testimonial_name',
				'type' => 'text',
				),
			array(
				'name'    => __( 'Mô tả ngắn', 'cmb' ),
				'desc'    => __( 'Đoạn mô tả ngắn ', 'cmb' ),
				'id'      => $prefix . 'testimonial_description',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
				),
			array(
				'name'    => __( 'Xếp hạng', 'cmb' ),
				'desc'    => __( 'Xếp hạng chia sẻ (5 sao hoặc 4 sao)', 'cmb' ),
				'id'      => $prefix . 'testimonial_review',
				'type'    => 'select',
				'options' => array(
					'5' => __( '5 Sao', 'cmb' ),
					'4'   => __( '4 Sao', 'cmb' ),
					'3'     => __( '3 sao', 'cmb' ),
					),
				),
			),
		);

	// Add other metaboxes as needed

	return $meta_boxes;
}
