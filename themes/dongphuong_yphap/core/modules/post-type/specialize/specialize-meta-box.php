<?php
function dongphuong_solution_metabox($meta_boxes)
{
	$bs_user        = get_users(array('role' => 'bs'));
	$bs_users_array = array();
	foreach ($bs_user as $user) {
		$bs_users_array[$user->ID] = $user->display_name;
	}
	$meta_boxes[] = array(
		'id'         => 'specialize-options',
		'title'      => 'Hiện thị thông tin',
		'taxonomies' => array('specialize'),
		'context'    => 'normal',
		'style'      => 'default',
		'priority'   => 'high',
		'fields'     => array(
			array(
				'name'             => 'Icon',
				'id'               => 'specialize-images',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'name'        => 'Hệ giải pháp',
				'id'          => 'specialize-solution',
				'type'        => 'taxonomy_advanced',
				'field_type'  => 'select_advanced',
				'placeholder' => 'Lựa chọn',
				'multiple'    => true,
				'ajax'        => true,
				'taxonomy'    => 'solution_cat',
				'query_args'  => array(
					'parent' => 0
				),
			),
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