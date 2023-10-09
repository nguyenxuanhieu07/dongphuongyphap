<?php
/*
 *	Template Name: Trang gom author
 */
get_header();

$page_id = get_the_ID();
$role    = rwmb_meta('role-author') ? rwmb_meta('role-author') : '';
if ($role == 'bs') {
	get_template_part("author/archive", "doctors");
} elseif ($role == 'ktv') {
	// code...
}
get_footer();