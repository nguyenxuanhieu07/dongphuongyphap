<?php
require_once dirname(__FILE__) . '/user-meta-box.php';

add_action( 'init', 'add_role_author' );
function add_role_author() {
	add_role(
		'bs',
		'Bác sĩ',
		array(
			'read'         => true,
			'edit_posts'   => true,
			'delete_posts' => false,
		)
	);
	add_role(
		'ktv',
		'Kỹ thuật viên	',
		array(
			'read'         => true,
			'edit_posts'   => true,
			'delete_posts' => false,
		)
	);
}