<?php
$settings      = get_option('option_pages');
$setting_basis = $settings['option-basis'];
$product_id    = get_the_ID();
$terms         = get_the_terms($product_id, 'specialize');
$id_doctor     = rwmb_meta('specialize-doctor', ['object_type' => 'term'], $terms[0]->term_id) ? rwmb_meta('specialize-doctor', ['object_type' => 'term'], $terms[0]->term_id) : '';
if($id_doctor):
$doctor           = get_userdata($id_doctor);
$doctor_avatar    = get_avatar($id_doctor, 150);
$user_name        = rwmb_meta('user-name', ['object_type' => 'user'], $id_doctor) ? rwmb_meta('user-name', ['object_type' => 'user'], $id_doctor) : $doctor->data->display_name;
$workplace_doctor = rwmb_meta('workplace-user', ['object_type' => 'user'], $id_doctor) ? rwmb_meta('workplace-user', ['object_type' => 'user'], $id_doctor) : '';
$link_booking     = isset($settings['page-booking']) ? get_page_link($settings['page-booking']) : '#';
?>
<div class="box-doctor-side">
	<a href="<?php echo get_author_posts_url($id_doctor); ?>" class="avatar">
		<?php echo $doctor_avatar; ?>
	</a>
	<div class="box-meta">
		<p class="box-text">Tư vấn chuyên môn bài viết</p>
		<h3 class="box-name"><a href="<?php echo get_author_posts_url($id_doctor); ?>" class="link-text">
				<?php echo $user_name; ?>
			</a></h3>
		<p class="box-work">
			<?php echo $setting_basis[$workplace_doctor - 1]['basis-address']; ?>
		</p>
		<div class="box-action">
			<a href="<?php echo $link_booking; ?>" class="btn-schedule">Đặt lịch ngay</a>
			<a href="<?php echo get_author_posts_url($id_doctor); ?>" class="btn-view">Xem hồ sơ</a>
		</div>
	</div>
</div>
<?php 
endif;