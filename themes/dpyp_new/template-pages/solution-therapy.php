<?php
/*
 *	Template Name: (LDP) Hệ giải pháp điều trị
 */
$post_id         = get_the_ID();
$page_specialize = rwmb_meta('page-specialize-select', '', $post_id) ? rwmb_meta('page-specialize-select', '', $post_id) : array();
$arr_id_tax      = array();
foreach ($page_specialize as $key => $value) {
	$arr_id_tax[] = $value->term_id;
}
$args_meta = get_taxonomy_conditional_logic($arr_id_tax);

$args      = array(
	'post_type'   => 'post',
	'post_status' => 'publish',
	'order'       => 'desc',
	'tax_query'   => $args_meta,
);
$list_post = new WP_Query($args);
if ($list_post->have_posts()) {
	$i = 1;
	while ($list_post->have_posts()):
		$list_post->the_post();
		echo '<pre>';
		print_r(get_the_title());
		echo '</pre>';
	endwhile;
}
?>