<?php
require dirname(__FILE__).'/helper.php';
require dirname(__FILE__).'/health.php';
require dirname(__FILE__).'/expert.php';
require dirname(__FILE__).'/special_cat.php';
require dirname(__FILE__).'/profile.php';
require dirname(__FILE__).'/settings.php';
require dirname(__FILE__).'/re-structure-content.php';

if ( ! class_exists( 'MB_Tabs' ) ) {
	require_once MTB_DIR.'extensions/meta-box-tabs/meta-box-tabs.php';
}
/**
* Enqueue scripts and styles.
*/
function wb_structure_scripts() {	
	wp_enqueue_style( 'structure', get_template_directory_uri() . '/core/modules/structure/structure.css',array(), '1.0.1');
	wp_enqueue_script( 'structure', get_template_directory_uri() . '/core/modules/structure/structure.js', array() );

	wp_enqueue_style( 'magnific-css', get_template_directory_uri() . '/core/modules/structure/magnific-popup.min.css',array(), '1.0.1');
	wp_enqueue_script( 'magnific-js', get_template_directory_uri() . '/core/modules/structure/magnific-popup.min.js', array() );
}
add_action( 'wp_enqueue_scripts', 'wb_structure_scripts' );

// Danh sách học hàm / học vị
if(!function_exists('wb_get_degree_list')){
	function wb_get_degree_list($option_name){
		$options  = get_option($option_name);
		if(isset($options) && $options['degree_list'] !='' ){
			return $options['degree_list'];
		}
	}
}
// Danh sách post type hỗ trợ chuyên khoa
if(!function_exists('get_post_type_support_special')){
	function get_post_type_support_special(){
		$options  = get_option('structure_options');
		if(isset($options) && $options['post_type_support'] !='' ){
			return $options['post_type_support'];
		}
		else{
			return false;
		}
	}
}
// Danh sách post type hiển thị box tham vấn
if(!function_exists('get_consultation_box_post_type')){
	function get_consultation_box_post_type(){
		$options  = get_option('structure_options');
		if(isset($options) && $options['consultation_box_support'] !='' ){
			return $options['consultation_box_support'];
		}
		else{
			return false;
		}
	}
}
// Thêm chuyên khoa cho post type
if(!function_exists('add_post_type_special_cat')){
	function add_post_type_special_cat(){
		$options  = get_option('structure_options');
		$post_types = $options['post_type_support'] ? $options['post_type_support'] : [];
		foreach ($post_types as $post_type) {
			register_taxonomy_for_object_type('special_cat', $post_type);
		}
	}
}
add_action('init','add_post_type_special_cat');

// Thêm box tham vấn cho post type
if(!function_exists('wb_expert_box')){
	add_filter( 'rwmb_meta_boxes', 'wb_expert_box' );
	function wb_expert_box( $meta_boxes ) {
		$post_types = get_consultation_box_post_type();
		$meta_boxes[] = array(
			'id'         => 'consultation-box',
			'title'      => 'Tham vấn',
			'post_types' => $post_types,
			'context'    => 'side',
			'priority'   => 'high',
			'fields' => array(
				array(
					'name'        => 'Chuyên gia / Bác sĩ',
					'id'   => 'consultation-expert',
					'type'        => 'post',
					'post_type'   => 'expert',
					'field_type'  => 'select',
					'placeholder' => 'Lựa chọn',
					'query_args'  => [
						// 'post_status'    => 'publish',
						'posts_per_page' => - 1,
					],
				),
			)
		);
		return $meta_boxes;
	}
}

if(!function_exists('wb_consultation_box_content')){
	function wb_consultation_box_content($content) {
		global $post;
		$post_type = $post->post_type;		
		//list post type support
		$post_types = get_consultation_box_post_type();
		$special_cat_id = wb_get_primary_term_id ( $post->ID,'special_cat');
		$expert_single = get_post_meta( $post->ID,'consultation-expert',true);
		if(isset($expert_single) && $expert_single !=''){
			$expert_id = $expert_single;
			$new_content = consultation_box_info($expert_id);
		}else{
			if(isset($special_cat_id)){
				$special_cat = get_term($special_cat_id,'special_cat');
				$expert_id = get_term_meta($special_cat_id,'consultation-expert',true);
				$new_content = consultation_box_info($expert_id);
			}
		}
		
		$expert_link = get_the_permalink($expert_id);
		$fullname = get_the_title($expert_id);
		$short_name = get_post_meta($expert_id,'expert-fullname',true);
		if($short_name !=''){
			$display_name = $short_name;
		}else{
			$display_name = $fullname;
		}
		$avatar = get_the_post_thumbnail($expert_id,'full');
		$degree = get_post_meta($expert_id,'degree',true);
		$office = get_post_meta($expert_id,'expert-office',true);


		$content_modal ='';
		$content_modal .='<div class="modal fade modal-booking-doctor" id="modal-booking-doctor" tabindex="-1"
		aria-labelledby="modal-booking-doctorLabel" aria-hidden="true">';
		$content_modal .='<div class="modal-dialog">';
		$content_modal .='<div class="modal-content">';
		$content_modal .='<div class="modal-header">';
		$content_modal .='<div class="modal-title" id="modal-booking-doctorLabel">Đặt lịch hẹn</div>';
		$content_modal .='<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
		$content_modal .='<span aria-hidden="true">&times;</span>';
		$content_modal .='</button>';
		$content_modal .='</div>';
		$content_modal .='<div class="modal-body">';
		$content_modal .='<form class="send-booking-doctor">';
		$content_modal .='<div class="form-row">';
		$content_modal .='<div class="form-group col-md-6 col-6">';
		$content_modal .='<input name="fullname" type="text" class="form-control" placeholder="Họ tên" required="required">';
		$content_modal .='</div>';
		$content_modal .='<div class="form-group col-md-6  col-6">';
		$content_modal .='<input name="numberphone" type="text" class="form-control" placeholder="Số điện thoại" required="required">';
		$content_modal .='</div>';
		$content_modal .='</div>';
		$content_modal .='<div class="form-group">';
		$content_modal .='<input name="email" type="text" class="form-control" placeholder="Email">';
		$content_modal .='</div>';
		$content_modal .='<div class="form-group">';
		$content_modal .='<textarea name="content" class="form-control" required="required"placeholder="Tình trạng bệnh của bạn..." rows="3"></textarea>';
		$content_modal .='</div>';
		$content_modal .='<div class="expert-box mt-3">';
		$content_modal .='<div class="d-flex align-items-center">';
		$content_modal .='<div class="avt-box">';
		$content_modal .= $avatar;
		$content_modal .='</div>';
		$content_modal .='<div class="expert-info">';
		$content_modal .='<p class="expert-name"><strong><a href="'.$expert_link.'">'.$degree.' '.$display_name.'</a></strong>';
		$content_modal .='</p>';
		$content_modal .='<p>';
		$content_modal .='<i class="fa fa-map-marker" aria-hidden="true"></i>';
		$content_modal .='<a class="office" href="'.get_the_permalink($office).'">'.get_the_title($office).'</a>';
		$content_modal .='</p>';
		$content_modal .='</div>';
		$content_modal .='</div>';
		$content_modal .='</div>';
		$content_modal .='<input type="hidden" name="doctor" id="" value="Nguyễn Thị Tuyết Lan">';
		$content_modal .='<button type="submit" class="btn btn-submit">Đặt lịch</button>';
		$content_modal .='</form>';
		$content_modal .='</div>';
		$content_modal .='</div>';
		$content_modal .='</div>';
		$content_modal .='</div>';
		if (in_array($post_type, $post_types) && is_main_query() ) {
			return $new_content.$content_modal. $content;
		}else{
			return $content;
		}
	}
	add_filter('the_content', 'wb_consultation_box_content',0,1);
}

if(!function_exists('consultation_box_info')){
	function consultation_box_info($expert_id) {
		$expert_link = get_the_permalink($expert_id);
		$fullname = get_the_title($expert_id);
		$short_name = get_post_meta($expert_id,'expert-fullname',true);
		if($short_name !=''){
			$display_name = $short_name;
		}else{
			$display_name = $fullname;
		}
		$avatar = get_the_post_thumbnail($expert_id,'full');
		$degree = get_post_meta($expert_id,'degree',true);
		$office = get_post_meta($expert_id,'expert-office',true);
		$vcard = get_post_meta($expert_id,'expert-vcard',true);

		$special_cat_id = wb_get_primary_term_id( $expert_id,'special_cat');
		$term_special_cat = get_term_by( 'id', $special_cat_id, 'special_cat' );
		$author_id = get_post_field ('post_author', get_the_ID());
		$author_name = get_the_author_meta( 'display_name' , $author_id ); 

		if(isset($term_special_cat) && $term_special_cat !=''){
			$new_content = '<div class="consultation-box font-weight-bold">';
			$new_content .= '<span class="consultation-experts">Bài viết được tham vấn chuyên môn bởi <strong><a href="'.$expert_link.'">'.$degree.' '.$display_name.'</a></strong>';
			$new_content .= '<span class="consultation-special-cat"> - Khoa <strong><a href="'.get_term_link($term_special_cat->slug, 'special_cat').'">'.$term_special_cat->name.'</a></strong></span>';
			$new_content .= '<span class="consultation-special-cat"> - <strong>'.$vcard.'</strong></span>';
			$new_content .= '<span class="consultation-adviser"> - Cố vấn chuyên môn tại <strong><a href="'.get_the_permalink($office).'">'.get_the_title($office).'</a></strong></span>';
			$new_content .= '<span class="booking" data-toggle="modal" data-target="#modal-booking-doctor" title="Đặt lịch hẹn bác sĩ"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span></span>';
			$new_content .= '</div>';
		}
		return $new_content;
	}
}

if(!function_exists('conlution_expert_sidebar')){
	function conlution_expert_sidebar($expert_id) {
		$expert_link = get_the_permalink($expert_id);
		$fullname = get_the_title($expert_id);
		$short_name = get_post_meta($expert_id,'expert-fullname',true);
		if($short_name !=''){
			$display_name = $short_name;
		}else{
			$display_name = $fullname;
		}
		$avatar = get_the_post_thumbnail($expert_id,'full');
		$degree = get_post_meta($expert_id,'degree',true);
		$office = get_post_meta($expert_id,'expert-office',true);
		$vcard = get_post_meta($expert_id,'expert-vcard',true);

		$author_id = get_post_field ('post_author', get_the_ID());
		$author_name = get_the_author_meta( 'display_name' , $author_id ); 

		$expert_html = '<div class="conlution-expert-sidebar">';
		$expert_html .= '<div class="expert">';
		$expert_html .= '<div class="avatar">'.$avatar.'</div>';
		$expert_html .= '<div class="expert-info"><p>Cố vấn chuyên môn bài viết</p>';
		$expert_html .= '<p class="expert-title">'.$display_name.'</p>';
		$expert_html .= '<p class="vcard">'.get_the_title($office).'</p>';
		$expert_html .= '<p class="expert-meta"><span class="icon-doctor"></span>'.$vcard.'</p>';
		$expert_html .= '<p class="expert-meta"><span class="icon-edu"></span>'.$degree.'</p>';
		$expert_html .= '</div>';
		$expert_html .= '</div>';
		$expert_html .= '<div class="action">';
		$expert_html .= '<a href="'.$expert_link.'" class="btn btn-readmore uppercase">Xem thêm</a>';
		$expert_html .= '<a href="#" class="btn btn-appointment"><i class="fa fa-calendar"></i> Đặt lịch hẹn</a>';
		$expert_html .= '</div>';
		$expert_html .= '</div>';

		return $expert_html;
	}
}
// Custom template
add_filter( 'single_template', 'wb_custom_single_template' );

function wb_custom_single_template( $single_template ) {
	global $post;
	if ( $post->post_type == 'expert' ) {
		$single_template = dirname( __FILE__ ) . '/template/single-expert.php';
	}
	if ( $post->post_type == 'profile' ) {
		$single_template = dirname( __FILE__ ) . '/template/single-profile.php';
	}
	if ( $post->post_type == 'solution' ) {
		$single_template = dirname( __FILE__ ) . '/template/single-solution.php';
	}
	if ( $post->post_type == 'knowledge' ) {
		$single_template = dirname( __FILE__ ) . '/template/single-knowledge.php';
	}	
	return $single_template;
}

// Custom Special Taxonomy template

function custom_special_cat_template( $template ) {
	$term = get_queried_object();
	if ( $term && $term->taxonomy == 'special_cat' ) {
		$template =  dirname( __FILE__ ) . '/template/special_cat.php';
	}
	return $template;
}
add_filter( 'template_include', 'custom_special_cat_template' );

// Custom Special Taxonomy template

function custom_expert_template( $template ) {
	if ( is_post_type_archive('expert') ) {
		$template =  dirname( __FILE__ ) . '/template/archive-expert.php';
	}
	return $template;
}
add_filter( 'template_include', 'custom_expert_template' );

// Custom Archive Knowledge template

function custom_knowledge_template( $template ) {
	if ( is_post_type_archive('knowledge') ) {
		$template =  dirname( __FILE__ ) . '/template/archive-knowledge.php';
	}
	return $template;
}
add_filter( 'template_include', 'custom_knowledge_template' );