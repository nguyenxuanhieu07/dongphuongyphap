<?php
$id_user = get_the_author_meta('ID');
$user    = get_userdata($id_user);
$role    = $user->roles[0];
if ($role == 'bs') {
	$postion = 'Bác sĩ';
} elseif ($role == 'ktv') {
	$postion = 'Kỹ thuật viên';
}

$user_avatar     = get_avatar($id_user, 150);
$user_name       = get_user_meta($id_user, 'user-name', true) ? get_user_meta($id_user, 'user-name', true) : $user->data->display_name;
$degree_user     = get_user_meta($id_user, 'degree-user', true) ? get_user_meta($id_user, 'degree-user', true) : '';
$workplace_user  = get_user_meta($id_user, 'workplace-user', true) ? get_user_meta($id_user, 'workplace-user', true) : '';
$user_specialize = get_user_meta($id_user, 'user-specialize', true) ? get_user_meta($id_user, 'user-specialize', true) : '';
?>
<div class="box-author-doctor">
	<div class="box-avatar">
		<?php echo $user_avatar; ?>
	</div>
	<div class="box-info">
		<h1 class="box-title">
			<?php echo $user_name; ?> <img src="<?php echo THEME_URI; ?>/images/icons/check (2).png" alt=""
				class="img-check">
		</h1>
		<?php if (isset($postion)): ?>
			<p class="box-text"><b>Chức vụ:</b>
				<?php echo $postion; ?>
			</p>

			<p class="box-text"><b>Học hàm/ Học vị:</b>
				<?php echo $degree_user; ?>
			</p>
			<p class="box-text"><b>Nơi công tác:</b>
				<?php echo $workplace_user; ?>
			</p>
			<p class="box-text"><b>Lĩnh vực điều trị:</b> Bệnh viện Đại học Y Hà Nội</p>
		<?php endif; ?>
	</div>
</div>