<?php
if ( ! function_exists( 'wb_get_primary_term_id' ) ){
	function wb_get_primary_term_id($post_id,$taxonomy){
		$terms = get_the_terms($post_id,$taxonomy);
		if ($terms){		
			if ( class_exists('WPSEO_Primary_Term') ){
				$wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, get_the_id() );
				$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
				$term = get_term( $wpseo_primary_term,$taxonomy );
				if (is_wp_error($term)) { 
					$term_primary = $terms[0]->term_id;
				} else { 
					// Yoast Primary category
					$term_primary = $term->term_id;
				}
			} 
			else {
				$term_primary = $terms[0]->term_id;
			}
		}
		return $term_primary;

	}
}