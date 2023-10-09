<?php
$page_id     = get_the_ID();
$address     = rwmb_meta('page-basis-address') ? rwmb_meta('page-basis-address') : '';
$numberphone = rwmb_meta('page-basis-numberphone') ? rwmb_meta('page-basis-numberphone') : '';
$wordtime    = rwmb_meta('page-basis-worktime') ? rwmb_meta('page-basis-worktime') : '';
?>
<h2 class="archive-title">Giới Thiệu</h2>
<div class="basis-entry">
	<p><b>Địa chỉ: </b>
		<?php echo $address; ?>
	</p>
	<p><b>Chuyên gia/ Bác sĩ/ Kỹ thuật viên:</b> 30</p>
	<p><b>Số điện thoại:</b>
		<?php echo $numberphone; ?>
	</p>
	<p><b>Thời gian làm việc:</b>
		<?php echo $wordtime; ?>
	</p>
</div>