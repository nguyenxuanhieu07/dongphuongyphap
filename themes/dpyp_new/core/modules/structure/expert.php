<?php
// Post type Chuyên gia
if(!function_exists('wb_create_expert_post')){
	function wb_create_expert_post() {
		$labels = array(
			'name'                  => _x( 'Bác sĩ - Chuyên gia', 'Post Type General Name', 'tdt' ),
			'singular_name'         => _x( 'Bác sĩ - Chuyên gia', 'Post Type Singular Name', 'tdt' ),
			'menu_name'             => __( 'BS / Chuyên gia', 'tdt' ),
			'name_admin_bar'        => __( 'BS / Chuyên gia', 'tdt' ),
			'archives'              => __( 'Tất cả', 'tdt' ),
			'attributes'            => __( 'Item Attributes', 'tdt' ),
			'parent_item_colon'     => __( 'Parent Item:', 'tdt' ),
			'all_items'             => __( 'Tất cả', 'tdt' ),
			'add_new_item'          => __( 'Thêm mới', 'tdt' ),
			'add_new'               => __( 'Thêm mới', 'tdt' ),
			'new_item'              => __( 'Bác sĩ mới', 'tdt' ),
			'edit_item'             => __( 'Chỉnh sửa', 'tdt' ),
			'update_item'           => __( 'Cập nhật', 'tdt' ),
			'view_item'             => __( 'Xem thông tin ', 'tdt' ),
			'view_items'            => __( 'Xem tất cả', 'tdt' ),
			'search_items'          => __( 'Tìm kiếm ', 'tdt' ),
			'not_found'             => __( 'Không tìm thấy', 'tdt' ),
			'not_found_in_trash'    => __( 'Không có trong thùng rác', 'tdt' ),
			'featured_image'        => __( 'Ảnh đại diện', 'tdt' ),
			'set_featured_image'    => __( 'Chọn ảnh đại diện', 'tdt' ),
			'remove_featured_image' => __( 'Xóa ảnh đại diện', 'tdt' ),
			'use_featured_image'    => __( 'Sử dụng ảnh này', 'tdt' ),
			'insert_into_item'      => __( 'Chèn vào bài viết', 'tdt' ),
			'uploaded_to_this_item' => __( '', 'tdt' ),
			'items_list'            => __( 'Items list', 'tdt' ),
			'items_list_navigation' => __( 'Items list navigation', 'tdt' ),
			'filter_items_list'     => __( 'Filter items list', 'tdt' ),
		);
		$rewrite = array(
			'slug'                  => 'chuyen-gia',
			'with_front'            => false,
			'pages'                 => true,
			'feeds'                 => false,
		);
		$args = array(
			'label'                 => __( 'Bác sĩ', 'tdt' ),
			'description'           => __( 'Thông tin bác sĩ', 'tdt' ),
			'labels'                => $labels,
			'supports'              => array( 'title','thumbnail', 'comments' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-buddicons-buddypress-logo',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'doi-ngu-chuyen-gia',
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'expert', $args );
	}
	add_action( 'init', 'wb_create_expert_post', 0 );
}

/**
 * Expert Meta box
 */
if(!function_exists('wb_expert_meta_boxes')){
	add_filter( 'rwmb_meta_boxes', 'wb_expert_meta_boxes' );
	function wb_expert_meta_boxes( $meta_boxes ) {
		$option_name = 'structure_options';
		$degree_list = wb_get_degree_list($option_name);
		$degree_options = array();
		if(!empty($degree_list)){
			foreach ($degree_list as $degree) {
				$degree_options[$degree] = $degree;
			}
		}
		$meta_boxes[] = array(
			'id'         => 'expert-post-meta',
			'title'      => 'Hồ sơ bác sĩ / chuyên gia',
			'post_types' => 'expert',
			'context'    => 'normal',
			'priority'   => 'high',
			'tabs'      => array(
				'general' => array(
					'label' => 'Thông tin chung',
					'icon'  => 'dashicons-email',
				),
				'social'  => array(
					'label' => 'Mạng xã hội',
					'icon'  => 'dashicons-share', 
				),
				'exp'    => array(
					'label' => 'Kinh nghiệm',
					'icon'  => 'dashicons-list-view',
				),
				'award'    => array(
					'label' => 'Giải thưởng',
					'icon'  => 'dashicons-awards',
				),
				'research'    => array(
					'label' => 'Công trình nghiên cứu',
					'icon'  => 'dashicons-awards',
				),
				'training'    => array(
					'label' => 'Quá trình đào tạo',
					'icon'  => 'dashicons-awards',
				),
			),
			'tab_style' => 'box',
			'tab_wrapper' => true,
			'fields' => array(
				array(
					'name' => 'Họ tên',
					'id'   => 'expert-fullname',
					'type' => 'text',
					'size'=> 50,
					'tab'  => 'general',
				),
				array(
					'name' => 'Chức vụ',
					'id'   => 'expert-vcard',
					'type' => 'text',
					'size'=> 50,
					'tab'  => 'general',
				),
				array(
					'name' => 'Học hàm / học vị',
					'placeholder' => 'Lựa chọn',
					'id'   => 'degree',
					'type' => 'select',
					'options'  => $degree_options,
					'size'=> 50,
					'tab'  => 'general',
				),
				array(
					'name'        => 'Nơi công tác',
					'id'          => 'expert-office',
					'type'        => 'post',
					'post_type'   => 'profile',
					'field_type'  => 'checkbox_list',
					'tab'  => 'general',
					'placeholder' => 'Lựa chọn',
					'query_args'  => [
						// 'post_status'    => 'publish',
						'posts_per_page' => -1,
					],
				),
				array(
					'name' => 'Giới thiệu ngắn',
					'id'   => 'expert-desc',
					'type'    => 'wysiwyg',
					'raw'     => false,
					'options' => [
						'textarea_rows' => 8,
						'teeny'         => true,
					],
					'tab'  => 'general',
				),
				array(
					'name' => 'Facebook',
					'id'   => 'expert-facebook',
					'type' => 'text',
					'size'=> 50,
					'tab'  => 'social',
				),
				array(
					'name' => 'Zalo',
					'id'   => 'expert-zalo',
					'type' => 'text',
					'size'=> 50,
					'tab'  => 'social',
				),
				array(
					'name' => 'Instagram',
					'id'   => 'expert-instagram',
					'type' => 'text',
					'size'=> 50,
					'tab'  => 'social',
				),
				array(
					'name' => 'Tiktok',
					'id'   => 'expert-tiktok',
					'type' => 'text',
					'size'=> 50,
					'tab'  => 'social',
				),
				array(
					'name'    => 'Kinh nghiệm',
					'id'      => 'expert-exp',
					'type'    => 'wysiwyg',
					'raw'     => false,
					'options' => [
						'textarea_rows' => 8,
						'teeny'         => true,
					],
					'tab'  => 'exp',
				),
				array(
					'name' => 'Giải thưởng',
					'id'   => 'expert-award',
					'type'    => 'wysiwyg',
					'raw'     => false,
					'options' => [
						'textarea_rows' => 8,
						'teeny'         => true,
					],
					'tab'  => 'award',
				),
				array(
					'name' => 'Công trình nghiên cứu',
					'id'   => 'expert-research',
					'type'    => 'wysiwyg',
					'raw'     => false,
					'options' => [
						'textarea_rows' => 8,
						'teeny'         => true,
					],
					'tab'  => 'research',
				),
				array(
					'name' => 'Quá trình đào tạo',
					'id'   => 'expert-certificate',
					'type'    => 'wysiwyg',
					'raw'     => false,
					'options' => [
						'textarea_rows' => 8,
						'teeny'         => true,
					],
					'tab'  => 'training',
				),	
			)
		);
		return $meta_boxes;
	}
}

if(!function_exists('wb_add_schema_expert')){
	function wb_add_schema_expert(){
		if(is_singular('expert')){
			$expert_id = get_the_ID();
			$expert_link = get_the_permalink($expert_id);
			$fullname = get_the_title($expert_id);
			$short_name = get_post_meta($expert_id,'expert-fullname',true);
			if($short_name !=''){
				$display_name = $short_name;
			}else{
				$display_name = $fullname;
			}
			$avatar = wp_get_attachment_url( get_post_thumbnail_id($expert_id) );
			$degree = get_post_meta($expert_id,'degree',true);
			$office = get_post_meta($expert_id,'expert-office',true);
			$facebook = rwmb_meta('expert-facebook');
			$zalo = rwmb_meta('expert-zalo');
			$instagram = rwmb_meta('expert-instagram');
			$tiktok = rwmb_meta('expert-tiktok');
			?>
			<script type="application/ld+json">{
				"@context": "http://schema.org/",
				"@type": "Person",
				"name": "<?php echo $display_name;?>",
				"alternateName": "<?php echo $display_name;?>",
				"url": "<?php echo $expert_link;?>",
				"image": "<?php echo $avatar; ?>",

				"sameAs":[
					<?php if($facebook !='') echo $facebook.',';?>
					<?php if($zalo !='') echo $zalo.',';?>
					<?php if($instagram !='') echo $instagram.',';?>
					<?php if($tiktok !='') echo $tiktok.',';?>
				],
				"jobTitle": "<?php echo $degree;?>",
				"worksFor": {
					"@type": "Organization",
					"name": "<?php echo get_the_title($office);?>"
				}
			}</script>
			<?php
		}
	}
	add_action('wp_head','wb_add_schema_expert');
}