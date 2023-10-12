<?php
$id_user          = $args['data']->ID;
$user_avatar      = get_avatar($id_user, 169);
$user_nicename    = $args['data']->data->user_nicename;
$user_profile_url = get_author_posts_url($id_user, $user_nicename);

$user_name       = get_user_meta($id_user, 'user-name', true) ? get_user_meta($id_user, 'user-name', true) : $args['data']->data->display_name;
$position_user   = get_user_meta($id_user, 'position-user', true) ? get_user_meta($id_user, 'position-user', true) : '';
$user_exp        = get_user_meta($id_user, 'user-exp', true) ? get_user_meta($id_user, 'user-exp', true) : '';

$settings = get_option('option_pages');
$link_booking = isset($settings['page-booking']) ? get_page_link($settings['page-booking']) : '#';
$user_specialize = rwmb_meta('user-specialize', ['object_type' => 'user'], $id_user) ? rwmb_meta('user-specialize', ['object_type' => 'user'], $id_user) : '';
$specialize      = [];
foreach ($user_specialize as $key => $value) {
	$specialize[] = $value->name;
}
?>
<div class="post-doctor">
	<a href="<?php echo esc_url($user_profile_url); ?>" class="post-doctor-thumbnail">
		<?php echo $user_avatar; ?>
	</a>
	<div class="post-info">
		<h3 class="post-name"><a href="<?php echo esc_url($user_profile_url); ?>" class="post-link">
				<?php echo $user_name; ?>
			</a></h3>
		<p class="post-position">
			<?php echo $position_user; ?>
		</p>
		<p class="info-item post-specialized"><b>Chuyên ngành: </b> <?php echo implode(",", $specialize); ?></p>
		<p class="info-item post-exp"><b>Kinh nghiệm: </b>
			<?php echo $user_exp; ?> năm
		</p>
	</div>
	<div class="post-action">
		<a href="<?php echo esc_url($user_profile_url); ?>" class="link link-more"><img
				src="<?php echo THEME_URI; ?>/images/icons/icon-more.png" alt="">Xem
			chi tiết</a>
		<a href="<?php echo $link_booking; ?>" class="link link-book"><img src="<?php echo THEME_URI; ?>/images/icons/icon-calender.png" alt="">Đặt
			lịch khám</a>
	</div>
</div>