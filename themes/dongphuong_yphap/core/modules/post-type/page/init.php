<?php
require_once dirname(__FILE__) . '/page-meta-box.php';

function get_taxonomy_conditional_logic($arr_id_tax)
{
	$taxonomies = get_terms(
		array(
			'taxonomy'   => 'specialize',
			'hide_empty' => false
		)
	);
	$args_meta  = array(
		'relation' => 'AND',
	);
	foreach ($taxonomies as $key => $value) {
		if (!in_array($value->term_id, $arr_id_tax)) {
			$args_meta[] = array(
				'taxonomy'         => 'specialize',
				'field'            => 'id',
				'terms'            => $value->term_id,
				'include_children' => false,
				'operator'         => 'NOT IN'
			);
		} else {
			$args_meta[] = array(
				'taxonomy'         => 'specialize',
				'field'            => 'id',
				'terms'            => $value->term_id,
				'include_children' => false,
				'operator'         => 'IN'
			);
		}
	}
	return $args_meta;
}