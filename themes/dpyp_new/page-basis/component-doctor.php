<?php

$args = array(
	'meta_key'   => 'workplace-user',
	'meta_value' => 'Biệt thự B31, ngõ 70 Nguyễn Thị Định, Nhân Chính. Thanh Xuân, Hà Nội',
);

$user_query = new WP_User_Query($args);
$users      = $user_query->get_results();
?>
<h2 class="archive-title">Đội Ngũ Chuyên gia</h2>
<?php
if (!empty($users)) {
	?>
	<div class="list-doctor">
		<?php
		foreach ($users as $user) {
				$args = array(
					'data' => $user
				);
				get_template_part("component/post", "doctor", $args);
		}
		?>
	</div>
	<?php
}
?>