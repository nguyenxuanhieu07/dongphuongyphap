<?php 
if( !function_exists('change_date_publish') ) {

	function change_date_publish($bulk_actions) {
		$bulk_actions['change-date-post'] = __('Thay đổi ngày đăng');
		return $bulk_actions;
	}
	add_filter('bulk_actions-edit-post', 'change_date_publish' );
	add_filter('bulk_actions-edit-video', 'change_date_publish' );
	add_filter('bulk_actions-edit-doctor', 'change_date_publish' );

}


if( !function_exists('action_change_date_publish') ) {
	function action_change_date_publish($redirect_url, $action, $post_ids) {
		if ($action == 'change-date-post') {

			$dateCurrent = strtotime(date_i18n('Y-m-d'));
			$hour_current = strtotime(date_i18n('H:i'));

			foreach ($post_ids as $post_id) {
				$date = strtotime( get_the_date('Y-m-d' , $post_id ));
				$hour = strtotime( get_the_date('H:i' , $post_id ));

				if( $dateCurrent > $date ) {
					$date = $dateCurrent;
				}else{
					goto skip_hour;
				}

				if( $hour > $hour_current ) {
					$hour = $hour_current;
				}

				skip_hour:

				$date_final = date('Y-m-d' ,$date).' '. date('H:i' ,$hour);
				wp_update_post( [
					'ID'            => $post_id,
					'post_date'     => $date_final,
					'post_date_gmt' => get_gmt_from_date( $date_final ),
					'edit_date'     => true
				] );
			}
			$redirect_url = add_query_arg('change-date-post', count($post_ids), $redirect_url);
		}
		return $redirect_url;
	}

	add_filter('handle_bulk_actions-edit-post', 'action_change_date_publish', 10, 3);
	add_filter('handle_bulk_actions-edit-video', 'action_change_date_publish', 10, 3);
	add_filter('handle_bulk_actions-edit-doctor', 'action_change_date_publish', 10, 3);
}



if( !function_exists('notices_change_date_publish') ) {
	function notices_change_date_publish() {
		if (!empty($_REQUEST['change-date-post'])) {
			$num_changed = (int) $_REQUEST['change-date-post'];
			printf('<div id="message" class="updated notice is-dismissable"><p>' . __('Đã thay đổi ngày đăng của %d bài.') . '</p></div>', $num_changed);
		}
	}
	add_action('admin_notices', 'notices_change_date_publish');
}






if( !function_exists('myadmin_enqueue') ) {
	function myadmin_enqueue() {
		wp_enqueue_script('my_admin_script', get_bloginfo('template_url') . '/core/modules/set_date/js/bulk-action.js', array('jquery'), false, true);
	}
	add_action('admin_init', 'myadmin_enqueue');
}
if( !function_exists('myadmin_bulk_edit')) {
	function myadmin_bulk_edit($action, $result){
	    if ('bulk-posts' == $action && $_GET['mm']!='00' && isset($_GET['jj']) && isset($_GET['aa']) && isset($_GET['hh']) && isset($_GET['mn']) ) {
	        $date = $_GET['aa'].'-'.$_GET['mm'].'-'.$_GET['jj'].' '.$_GET['hh'].':'.$_GET['mn'].':00';
			$dateCurrent = strtotime(date_i18n('Y-m-d H:i:s'));
	        $post_date = date("Y-m-d H:i:s", strtotime($date));
	        $post_date_gmt = get_gmt_from_date($date);
	        $post_status = (strtotime($post_date) > $dateCurrent)? 'future' : 'publish';

	        $post_IDs = array_map('intval', (array) $_GET['post']);
	        foreach ($post_IDs as $post_ID) {
	            $post_data = array(
	            	'ID' => $post_ID,
	            	'post_date' => $post_date,
	            	'post_date_gmt' => $post_date_gmt,
	            	'post_status' => $post_status,
	            	'edit_date' => true
	            );
	            wp_update_post( $post_data );
	        }

	    }
	}
	add_action('check_admin_referer', 'myadmin_bulk_edit', 10, 2);
}

// end update & set date



class mediModifyTitle{
	function __construct(){
		add_filter('bulk_actions-edit-post', array( $this, 'change_title_post' ) );
		add_filter('bulk_actions-edit-video', array( $this, 'change_title_post' ) );
		add_filter('bulk_actions-edit-doctor', array( $this, 'change_title_post' ) );

		add_filter('handle_bulk_actions-edit-post', array( $this, 'action_change_title_post' ), 10, 3);
		add_filter('handle_bulk_actions-edit-video', array( $this, 'action_change_title_post' ), 10, 3);
		add_filter('handle_bulk_actions-edit-doctor', array( $this, 'action_change_title_post' ), 10, 3);

		add_action('admin_notices', array( $this, 'notices_change_title_post' ) );
	}

	function change_title_post($bulk_actions) {
		$bulk_actions['change-title-post'] = __('Thay đổi tiêu đề');
		return $bulk_actions;
	}

	function action_change_title_post($redirect_url, $action, $post_ids) {
		if ($action == 'change-title-post') {
			foreach ($post_ids as $post_id) {
				$yoast_title = get_post_meta( $post_id, '_yoast_wpseo_title', true);
				preg_match_all("/\%\%(.*?)\%\%/", $yoast_title, $matches_res);
				$snippet_arr = $matches_res[1];
				if( $snippet_arr != null ) {
					foreach( $snippet_arr as $key_value ) {
						if( $key_value == 'currentyear'){
							$yoast_title = str_replace( '%%'.$key_value.'%%', date_i18n('Y') , $yoast_title);
						}elseif( $key_value == 'title'){
							$yoast_title = str_replace( '%%'.$key_value.'%%', get_the_title($post_id) , $yoast_title);
						}else{
							$yoast_title = str_replace( '%%'.$key_value.'%%', "" , $yoast_title);
						}
					}
				}else {
					$yoast_title = $yoast_title;
				}
				wp_update_post( [
					'ID'            => $post_id,
					'post_title'     => $yoast_title,
				] );
			}
			$redirect_url = add_query_arg('change-title-post', count($post_ids), $redirect_url);
		}
		return $redirect_url;
	}

	function notices_change_title_post() {
		if (!empty($_REQUEST['change-title-post'])) {
			$num_changed = (int) $_REQUEST['change-title-post'];
			printf('<div id="message" class="updated notice is-dismissable"><p>' . __('Đã thay đổi tiêu đề của %d bài bằng tiêu đề SEO.') . '</p></div>', $num_changed);
		}
	}
}
new mediModifyTitle();








class mediDateRange{
	function __construct(){
		// if you do not want to remove default "by month filter", remove/comment this line
		// add_filter( 'months_dropdown_results', '__return_empty_array' );
		// include CSS/JS, in our case jQuery UI datepicker
		add_action( 'admin_enqueue_scripts', array( $this, 'jqueryui' ) );
		// HTML of the filter
		add_action( 'restrict_manage_posts', array( $this, 'form' ) );
		// the function that filters posts
		add_action( 'pre_get_posts', array( $this, 'filterquery' ) );
	}

	function jqueryui(){
		wp_enqueue_style( 'jquery-ui', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
	}

	function form(){
		$from = ( isset( $_GET['mediDateFrom'] ) && $_GET['mediDateFrom'] ) ? $_GET['mediDateFrom'] : '';
		$to = ( isset( $_GET['mediDateTo'] ) && $_GET['mediDateTo'] ) ? $_GET['mediDateTo'] : '';
		echo '<style>
		input[name="mediDateFrom"], input[name="mediDateTo"]{
			line-height: 28px;
			height: 28px;
			margin: 0;
			width:125px;
		}
		</style>
		<input type="text" name="mediDateFrom" placeholder="Ngày bắt đầu" value="' . esc_attr( $from ) . '" />
		<input type="text" name="mediDateTo" placeholder="Ngày kết thúc" value="' . esc_attr( $to ) . '" />
		<script>
		jQuery( function($) {
			var from = $(\'input[name="mediDateFrom"]\'),
			    to = $(\'input[name="mediDateTo"]\');
			$( \'input[name="mediDateFrom"], input[name="mediDateTo"]\' ).datepicker( {dateFormat : "yy-mm-dd"} );
			// by default, the dates look like this "April 3, 2017"
    			// I decided to make it 2017-04-03 with this parameter datepicker({dateFormat : "yy-mm-dd"});

    			// the rest part of the script prevents from choosing incorrect date interval
    			from.on( \'change\', function() {
				to.datepicker( \'option\', \'minDate\', from.val() );
			});
			to.on( \'change\', function() {
				from.datepicker( \'option\', \'maxDate\', to.val() );
			});
		});
		</script>';

	}
	
	function filterquery( $admin_query ){
		global $pagenow;
		if (
			is_admin()
			&& $admin_query->is_main_query()
			// by default filter will be added to all post types, you can operate with $_GET['post_type'] to restrict it for some types
			&& in_array( $pagenow, array( 'edit.php', 'upload.php' ) )
			&& ( ! empty( $_GET['mediDateFrom'] ) || ! empty( $_GET['mediDateTo'] ) )
		) {
			$admin_query->set(
				'date_query', // I love date_query appeared in WordPress 3.7!
				array(
					'after' => sanitize_text_field( $_GET['mediDateFrom'] ), // any strtotime()-acceptable format!
					'before' => sanitize_text_field( $_GET['mediDateTo'] ),
					'inclusive' => true, // include the selected days as well
					'column'    => 'post_date' // 'post_modified', 'post_date_gmt', 'post_modified_gmt'
				)
			);
		}
		return $admin_query;
	}
}
new mediDateRange();
