<?php
if ( ! function_exists( 'wb_filter_image_pre_upload' ) ) :
	function wb_filter_image_pre_upload($file){
		$allowed_types = ['image/jpeg', 'image/png','image/jpg', 'image/gif','image/svg+xml'];
		$image_size = $file['size']/1024;
		$limit = 100;
		$limit_file_gift = 200;
		if (in_array($file['type'], $allowed_types)) {
			$image_size = $file['size']/1024;
			$file_type =  $file['type'];
			if($file_type !='image/gif'){
				if ( $image_size > $limit) {
					$file['error'] = 'Ảnh vượt quá 100Kb, vui lòng resize kích thước ảnh trước khi upload';
				}
			}else{
				if ( $image_size > $limit_file_gift) {
					$file['error'] = 'Ảnh gif vượt quá 200Kb, vui lòng resize kích thước ảnh trước khi upload';
				}
			}
		}
		return $file;
	}
	add_filter('wp_handle_upload_prefilter', 'wb_filter_image_pre_upload', 20);
endif;