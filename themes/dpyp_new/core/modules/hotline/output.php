<?php
if(!function_exists('tdt_hotline')):
	function tdt_hotline(){
		global $post;
		if( is_single() || is_category() ) {
			$post_id = $post->ID;
			$taxonomy = 'category';
			$post_term_slug = wb_get_primary_term($post_id,$taxonomy);
			$post_term = get_term_by('slug', $post_term_slug, $taxonomy);

			if(isset($post_term) && $post_term !=''){
				$hotline =  tdt_get_hotline($taxonomy,$post_term->term_id);
				
				if( $hotline == '' ) {
					$hotline_options = get_option('hotline_options');
					if(isset($hotline_options['hotline_post_default']) && $hotline_options['hotline_post_default'] !=''){
						$hotline = $hotline_options['hotline_post_default'];
					}
				}
			}
		}else{
			$hotline_options = get_option('hotline_options');
			if(isset($hotline_options['hotline_post_default']) && $hotline_options['hotline_post_default'] !=''){
				$hotline = $hotline_options['hotline_post_default'];
			}
		}

		if(isset($hotline) && $hotline !=''){
			return $hotline;
		}
	}
endif;
if(!function_exists('tdt_get_hotline')):
	function tdt_get_hotline($taxonomy,$term_id){
		$hotline = '';
		$hotline_options = get_option('hotline_options');
		$hotline_post_default = '';
		if(isset($hotline_options['hotline_post_default']) && $hotline_options['hotline_post_default'] !=''){
			$hotline_post_default = $hotline_options['hotline_post_default'];
		}

		$hotline_default = $hotline_post_default;

		$str_key = 'hotline_post_status';
		$status  = $hotline_options[$str_key];
		if($status){
			$option_group_key = 'hotline-post-group';
			$hotline_group = $hotline_options[$option_group_key];
			foreach ($hotline_group as $group) {
				if(in_array($term_id, $group) ){
					if($group['hotline_status']){
						$hotline = $group['hotline-number'];
						break;
					}
				}else{
					$list_parents = get_ancestors($term_id, $taxonomy);
					if( count($list_parents) > 0 ) {
						foreach ($list_parents as $key_value) {
							if(in_array($key_value, $group) ){
								$hotline = $group['hotline-number'];
								break;
							}
						}
					}else{
						$hotline = $hotline_default;
					}
				}
			}
		}
		return $hotline;
	}
endif;

if(!function_exists('tdt_zalo')):
	function tdt_zalo(){
		global $post;
		if( is_single() || is_category() ) {
			$post_id = $post->ID;
			$taxonomy = 'category';
			$post_term_slug = wb_get_primary_term($post_id,$taxonomy);
			$post_term = get_term_by('slug', $post_term_slug, $taxonomy);
			if(isset($post_term) && $post_term !=''){
				$hotline =  tdt_get_zalo($taxonomy,$post_term->term_id);
				
				if( $hotline == '' ) {
					$hotline_options = get_option('hotline_options');
					if(isset($hotline_options['zalo_post_default']) && $hotline_options['zalo_post_default'] !=''){
						$hotline = $hotline_options['zalo_post_default'];
					}
				}
			}
		}else{
			$hotline_options = get_option('hotline_options');
			if(isset($hotline_options['zalo_post_default']) && $hotline_options['zalo_post_default'] !=''){
				$hotline = $hotline_options['zalo_post_default'];
			}
		}
		if(isset($hotline) && $hotline !=''){
			return $hotline;
		}
	}
endif;
if(!function_exists('tdt_get_zalo')):
	function tdt_get_zalo($taxonomy,$term_id){
		$zalo = '';
		$hotline_options = get_option('hotline_options');
		$zalo_post_default = '';
		if(isset($hotline_options['zalo_post_default']) && $hotline_options['zalo_post_default'] !=''){
			$zalo_post_default = $hotline_options['zalo_post_default'];
		}

		$zalo_default = $zalo_post_default;

		$str_key = 'hotline_post_status';
		$status  = $hotline_options[$str_key];
		if($status){
			$option_group_key = 'hotline-post-group';
			$hotline_group = $hotline_options[$option_group_key];
			foreach ($hotline_group as $group) {				
				if(in_array($term_id, $group) ){
					if($group['hotline_status']){
						$zalo = $group['zalo-number'];
						break;
					}
				}else{
					$list_parents = get_ancestors($term_id, $taxonomy);
					if( count($list_parents) > 0 ) {
						foreach ($list_parents as $key_value) {
							if(in_array($key_value, $group) ){
								$zalo = $group['zalo-number'];
								break;
							}
						}
					}else{
						$zalo = $zalo_default;
					}
				}
			}
		}

		return $zalo;
	}
endif;

if(!function_exists('tdt_messenger')):
	function tdt_messenger(){
		global $post;
		if( is_single() || is_category() ) {
			$post_id = $post->ID;
			$taxonomy = 'category';
			$post_term_slug = wb_get_primary_term($post_id,$taxonomy);
			$post_term = get_term_by('slug', $post_term_slug, $taxonomy);
			if(isset($post_term) && $post_term !=''){
				$messenger =  tdt_get_messenger($taxonomy, $post_term->term_id);
				
				if( $messenger == '' ) {
					$hotline_options = get_option('hotline_options');
					if(isset($hotline_options['messenger_post_default']) && $hotline_options['messenger_post_default'] !=''){
						$messenger = $hotline_options['messenger_post_default'];
					}
				}
			}
		}else{
			$hotline_options = get_option('hotline_options');
			if(isset($hotline_options['messenger_post_default']) && $hotline_options['messenger_post_default'] !=''){
				$messenger = $hotline_options['messenger_post_default'];
			}
		}
		if(isset($messenger) && $messenger !=''){
			return $messenger;
		}
	}
endif;
if(!function_exists('tdt_get_messenger')):
	function tdt_get_messenger($taxonomy, $term_id){
		$messenger = '';
		$hotline_options = get_option('hotline_options');
		$messenger_post_default = '';
		if(isset($hotline_options['messenger_post_default']) && $hotline_options['messenger_post_default'] !=''){
			$messenger_post_default = $hotline_options['messenger_post_default'];
		}
		$messenger_default = $messenger_post_default;

		$str_key = 'hotline_post_status';
		$status  = $hotline_options[$str_key];
		if($status){
			$option_group_key = 'hotline-post-group';
			$hotline_group = $hotline_options[$option_group_key];
			foreach ($hotline_group as $group) {				
				if(in_array($term_id,$group) ){
					if($group['hotline_status']){
						$messenger = $group['messenger-link'];
						break;
					}
				}else{
					$list_parents = get_ancestors($term_id, $taxonomy);
					if( count($list_parents) > 0 ) {
						foreach ($list_parents as $key_value) {
							if(in_array($key_value, $group) ){
								$messenger = $group['messenger-link'];
								break;
							}
						}
					}else{
						$messenger = $messenger_default;
					}
				}
			}
		}
		return $messenger;
	}
endif;