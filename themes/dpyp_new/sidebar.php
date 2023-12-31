<?php
$ngayThangHienTai   = date("d/m");
$ngayThangTiepTheo1 = date("d/m", strtotime("+1 day"));
$ngayThangTiepTheo2 = date("d/m", strtotime("+2 days"));
if (is_author()) {
	$check_author   = 1;
	$author         = get_queried_object();
	$author_id      = $author->ID;
	$user_name      = get_user_meta($author_id, 'user-name', true) ? get_user_meta($author_id, 'user-name', true) : '';
	$workplace_user = get_user_meta($author_id, 'workplace-user', true) ? get_user_meta($author_id, 'workplace-user', true) : '';
}
?>
<form action="" class="form-booking">
	<h2 class="form-title text-center">
		Đặt lịch khám chữa bệnh
	</h2>
	<div class="form-group">
		<label class="form-lable" for="fullname">Họ và tên *</label>
		<input type="text" name="fullname" class="form-control control-custom" id="fullname" placeholder="Họ và tên*"
			required>
	</div>
	<div class="form-group">
		<label class="form-lable" for="numberphone">Số điện thoại *</label>
		<input type="text" name="numberphone" class="form-control control-custom" id="numberphone"
		placeholder="Số điện thoại*" inputmode="decimal" pattern="(\+84|0){1}(9|8|7|5|3){1}[0-9]{8}" required>
	</div>
	<div class="form-group">
		<label class="form-lable" for="email-sidebar">Email</label>
		<input name="email" id="email-sidebar" inputmode="email" type="email" placeholder="Email"
			class="form-control control-custom" />
	</div>
	<div class="form-group">
		<label class="form-lable" for="note">Vấn đề đang gặp phải</label>
		<textarea class="form-control control-custom" id="note" rows="3" name="note"
			placeholder="Vấn đề đang gặp phải"></textarea>
	</div>

	<div class="form-group">
		<label class="form-lable" for="select_basis">Lựa chọn cơ sở *</label>
		<select id="select_basis" name="basis" class="form-control control-custom" <?php if ($check_author)
			echo 'disabled'; ?>>
			<option value="">Lựa chọn cơ sở *</option>
			<option value="Hà Nội" <?php selected($workplace_user,'Hà Nội'); ?>>Biệt thự B31, ngõ 70 Nguyễn Thị Định, Nhân Chính. Thanh Xuân, Hà
				Nội</option>
			<option value="Hồ Chí Minh" <?php selected($workplace_user, 'Hồ Chí Minh'); ?>>Số 145 Hoa Lan, phường 2, quận Phú Nhuận, HCM</option>
		</select>
	</div>
	<div class="form-group ">
		<label class="form-lable" for="select_basis">Lựa chọn bác sĩ *</label>
		<select id="select_basis" name="doctor" class="form-control control-custom" <?php if ($check_author)
			echo 'disabled'; ?>>
			<?php if ($check_author): ?>
				<option value="<?php echo $user_name; ?>">
					<?php echo $user_name; ?>
				</option>
			<?php else: ?>
				<option selected="">Lựa chọn bác sĩ *</option>
				<option>...</option>
			<?php endif; ?>
		</select>
	</div>
	<div class="form-group ">
		<label class="form-lable">Ngày khám *</label>
		<div class="list-date">
			<div class="date-item" data-value="<?php echo $ngayThangHienTai; ?>">
				<p class="item-title">
					<?php echo $ngayThangHienTai; ?>
				</p>
				<p class="item-text">hôm nay</p>
			</div>
			<div class="date-item" data-value="<?php echo $ngayThangTiepTheo1; ?>">
				<p class="item-title">
					<?php echo $ngayThangTiepTheo1; ?>
				</p>
				<p class="item-text">Ngày mai</p>
			</div>
			<div class="date-item" data-value="<?php echo $ngayThangTiepTheo2; ?>">
				<p class="item-title">
					<?php echo $ngayThangTiepTheo2; ?>
				</p>
				<p class="item-text">Ngày kìa</p>
			</div>
			<div class="date-item date-more">
				<p class="item-title">+</p>
				<p class="item-text">Khác</p>
				<input type="text" class="form-control booking-date">
				<input type="text" name="booking-date" hidden>
			</div>

		</div>
	</div>
	<div class="form-group ">
		<label class="form-lable">Giờ khám *</label>
		<div class="list-time">
			<div class="date-item" data-value="08:00">
				<input class="form-check-input" type="radio" name="time-hours" id="raidio1" value="08:00" hidden="">
				<label class="item-title" for="raidio1">08:00</label>
			</div>
			<div class="date-item" data-value="08:30">
				<input class="form-check-input" type="radio" name="time-hours" id="raidio2" value="08:30" hidden="">
				<label class="item-title" for="raidio2">08:30</label>
			</div>
			<div class="date-item" data-value="09:00">
				<input class="form-check-input" type="radio" name="time-hours" id="raidio3" value="09:00" hidden="">
				<label class="item-title" for="raidio3">09:00</label>
			</div>
			<div class="date-item" data-value="09:30">
				<input class="form-check-input" type="radio" name="time-hours" id="raidio4" value="09:30" hidden="">
				<label class="item-title" for="raidio4">09:30</label>
			</div>
			<input type="text" name="booking-time" hidden>
		</div>
	</div>
	<button class="form-control btn-send">Gửi thông tin</button>
</form>