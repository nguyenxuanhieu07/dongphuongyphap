<?php 
$id_user = $args['data']->ID;
$user_avatar = get_avatar( $id_user ,169 );
$user_nicename = $args['data']->data->user_nicename;
$user_profile_url = get_author_posts_url($id_user, $user_nicename);

$user_name =get_user_meta( $id_user, 'user-name', true ) ?get_user_meta( $id_user, 'user-name', true ) : $args['data']->data->display_name;
$position_user = get_user_meta( $id_user, 'position-user', true ) ? get_user_meta( $id_user, 'position-user', true ) : '';
$user_specialize = get_user_meta( $id_user, 'user-specialize', true ) ? get_user_meta( $id_user, 'user-specialize', true ) : '';
$user_exp = get_user_meta( $id_user, 'user-exp', true ) ? get_user_meta( $id_user, 'user-exp', true ) : '';
		echo "<pre>";
		print_r(rwmb_meta('user-specialize','',$id_user));
		echo "</pre>";
		die();

?>
<div class="post-doctor">
	<a href="<?php echo esc_url($user_profile_url); ?>" class="post-doctor-thumbnail">
		<?php echo $user_avatar;  ?>
	</a>
	<div class="post-info">
		<h3 class="post-name"><a href="<?php echo esc_url($user_profile_url); ?>" class="post-link"><?php echo $user_name; ?></a></h3>
		<p class="post-position"><?php echo $position_user; ?></p>
		<p class="info-item post-specialized"><b>Chuyên ngành: </b>Nội/ Da liễu/ Nam khoa/
			Nội tiết/ tim mạch/ Thận -Tiết niệu</p>
		<p class="info-item post-exp"><b>Kinh nghiệm: </b><?php echo $user_exp; ?></p>
	</div>
	<div class="post-action">
		<a href="<?php echo esc_url($user_profile_url); ?>" class="link link-more"><img src="<?php echo THEME_URI; ?>/images/icons/icon-more.png" alt="">Xem
			chi tiết</a>
		<a href="#" class="link link-book"><img src="<?php echo THEME_URI; ?>/images/icons/icon-calender.png" alt="">Đặt
			lịch khám</a>
	</div>
</div>