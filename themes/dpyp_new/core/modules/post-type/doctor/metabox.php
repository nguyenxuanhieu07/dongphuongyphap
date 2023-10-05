<?php

if( !function_exists('metabox_doctor')){
	function metabox_doctor( $meta_boxes ) {

		$meta_boxes[] = array(
			'id'         => 'doctor_info',
			'title'      => __( 'Thông tin bác sĩ', 'dpyp' ),
			'pages'      => array( 'doctor', ),
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true,
			'fields'     => array(
				array(
					'name' => __( 'Họ tên bác sĩ', 'dpyp' ),
					'desc' => __( 'tiêu đề ngắn', 'dpyp' ),
					'id'   => 'dt_ho_ten',
					'type' => 'text',
				),
				array(
					'name' => __( 'Chức danh bác sĩ', 'dpyp' ),
					'desc' => __( 'Nội dung ngắn', 'dpyp' ),
					'id'   => 'dt_danh_hieu',
					'type' => 'text',
				),
			),
		);

		$meta_boxes[] = array(
			'id' => 'doctor_profile',
			'title' => 'Liên kết mạng xã hội',
			'post_types' => array( 'doctor'),
			'context'   => 'normal',
			'priority'  => 'high',
			'fields' => array(
				array(
					'name' => 'Facebook',
					'id'   => 'dt_facebook',
					'type' => 'text',
					'size' => 80
				),
				array(
					'name' => 'Instagram',
					'id'   => 'dt_instagram',
					'type' => 'text',
					'size' => 80
				),
				array(
					'name' => 'Linkedin',
					'id'   => 'dt_linkedin',
					'type' => 'text',
					'size' => 80
				),
				array(
					'name' => 'Pinterest',
					'id'   => 'dt_pinterest',
					'type' => 'text',
					'size' => 80
				),
				array(
					'name' => 'Soundcloud',
					'id'   => 'dt_soundcloud',
					'type' => 'text',
					'size' => 80
				),
				array(
					'name' => 'Twitter',
					'id'   => 'dt_twitter',
					'type' => 'text',
					'size' => 80
				),
				array(
					'name' => 'Youtube',
					'id'   => 'dt_youtube',
					'type' => 'text',
					'size' => 80
				),
				array(
					'name' => 'Wikipedia',
					'id'   => 'dt_wikipedia',
					'type' => 'text',
					'size' => 80
				),
			)
		);

		return $meta_boxes;
	}

	add_filter( 'rwmb_meta_boxes', 'metabox_doctor' );
}