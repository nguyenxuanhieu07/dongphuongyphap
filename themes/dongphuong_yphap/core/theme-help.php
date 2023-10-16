<?php
/**
 * Short title theme
 */
if( !function_exists('theme_short_title') ){
	function theme_short_title( $number_word = 15 ){
		$title = get_the_title();
		return wp_trim_words( $title , $number_word );
	}
}

/**
 * Short content theme
 */
if( !function_exists('theme_short_content') ){
	function theme_short_content($content ='', $number_word = 20 ){
		if(!$content){
			$content = get_the_content();
		}
		return wp_trim_words( $content , $number_word );
	}
}

// Thêm hàm phân trang
if( !function_exists('theme_theme_pagination')){
	function theme_theme_pagination(){
		?>
		<div class="clearfix text-center">
			<ul class="pagination " role="navigation">
				<?php
				global $wp_query;
				$big = 999999999;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'prev_text' => __('« Trang trước'),
					'next_text' => __('Trang sau »'),
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
				) );
				?>
			</ul>
		</div>
		<?php
	}
}

function rocket_lazyload_exclude_class( $attributes ) {
    $attributes[] = 'class="skip-lazy"';
    return $attributes;
}
add_filter( 'rocket_lazyload_excluded_attributes', 'rocket_lazyload_exclude_class' );


if ( ! function_exists( 'theme_get_primary_term' ) ) {
	function theme_get_primary_term($post_id, $taxonomy = 'category'){
		$terms = get_the_terms($post_id, $taxonomy);
		if ($terms){		
			if ( class_exists('WPSEO_Primary_Term') ){
				$wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, get_the_id() );
				$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
				$term = get_term( $wpseo_primary_term,$taxonomy );
				if (is_wp_error($term)) { 
					$term_primary = $terms[0]->slug;
				} else { 
					// Yoast Primary category
					$term_primary = $term->slug;
				}
			} 
			else {
				$term_primary = $terms[0]->slug;
			}
		}
		return $term_primary;
	}
}

if(!function_exists('get_users_by_role')){
	function get_users_by_role($role,$number_of_users) {
	    $users = get_users(array(
	        'role' => $role,
	        'number'  => $number_of_users,
	    ));

	    return $users;
	}
}