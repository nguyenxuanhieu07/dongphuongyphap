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
$user_name       = rwmb_meta('user-name', ['object_type' => 'user'], $id_user) ? rwmb_meta('user-name', ['object_type' => 'user'], $id_user) : $user->data->display_name;
$degree_user     = rwmb_meta('degree-user', ['object_type' => 'user'], $id_user) ? rwmb_meta('degree-user', ['object_type' => 'user'], $id_user) : '';
$workplace_user  = rwmb_meta('workplace-user', ['object_type' => 'user'], $id_user) ? rwmb_meta('workplace-user', ['object_type' => 'user'], $id_user) : '';
$user_specialize = rwmb_meta('user-specialize', ['object_type' => 'user'], $id_user) ? rwmb_meta('user-specialize', ['object_type' => 'user'], $id_user) : '';
$specialize      = [];
foreach ($user_specialize as $key => $value) {
	$specialize[] = $value->name;
}
$settings = get_option('option_pages');
$setting_basis = $settings['option-basis'];
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
				<?php echo $setting_basis[$workplace_user-1]['basis-address']; ?>
			</p>
			<p class="box-text"><b>Lĩnh vực điều trị:</b> <?php echo implode(",", $specialize); ?></p>
		<?php endif; ?>
	</div>
</div>