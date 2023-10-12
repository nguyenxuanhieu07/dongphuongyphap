<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'rwmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes[] = array(
		'id'         => 'video_metabox',
		'title'      => __( 'Video Options', 'cmb' ),
		'pages'      => array( 'video', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name' => __( 'Video Nổi bật', 'cmb' ),
				'desc' => __( 'Tích chọn video nổi bật', 'cmb' ),
				'id'   => $prefix . 'featured_video',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Video ID youtube', 'cmb' ),
				'desc' => __( 'Nhập video ID Youtube', 'cmb' ),
				'id'   => $prefix . 'video_id_youtube',
				'type' => 'text',
			),
			array(
				'name' => __( 'Iframe Video', 'cmb' ),
				'desc' => __( 'Nhập iframe video muốn hiển thị (iframe YOUTUBE hoặc video FACEBOOK)', 'cmb' ),
				'id'   => $prefix . 'video_iframe',
				'type' => 'textarea',
			),
		),
	);

	$meta_boxes[] = array(
		'id'         => 'video_metabox_side',
		'title'      => __( 'Video chia sẻ khách hàng - nổi bật', 'cmb' ),
		'pages'      => array( 'video', ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name' => __( 'Video Nổi bật - Chia sẻ khách hàng', 'cmb' ),
				'desc' => __( 'Tích chọn video nổi bật', 'cmb' ),
				'id'   => $prefix . 'featured_video_testimonial',
				'type' => 'checkbox',
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}
