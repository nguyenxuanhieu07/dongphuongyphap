<?php
/**
 * Template name: (LDP) Cơ sở
 */
get_header();
$settings      = get_option('option_pages');
$setting_basis = $settings['option-basis'];

$address        = rwmb_meta('page-basis-address') ? rwmb_meta('page-basis-address') : '';
$numberphone    = rwmb_meta('page-basis-numberphone') ? rwmb_meta('page-basis-numberphone') : '';
$wordtime       = rwmb_meta('page-basis-worktime') ? rwmb_meta('page-basis-worktime') : '';
$infrastructure = rwmb_meta('infrastructure-images') ? rwmb_meta('infrastructure-images') : '';

$review       = rwmb_meta('evaluate-group') ? rwmb_meta('evaluate-group') : '';
$link_booking = isset($settings['page-booking']) ? get_page_link($settings['page-booking']) : '#';
$args         = array(
	'meta_key'   => 'workplace-user',
	'meta_value' => $address,
);

$user_query = new WP_User_Query($args);
$users      = $user_query->get_results();

?>
<main class="page-basis">
	<?php get_template_part("components/banner", "top"); ?>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h2 class="archive-title">Giới Thiệu</h2>
					<div class="basis-entry">
						<p><b>Địa chỉ: </b>
							<?php echo $setting_basis[$address - 1]['basis-address']; ?>
						</p>
						<p><b>Chuyên gia/ Bác sĩ/ Kỹ thuật viên:</b> <?php echo count($users); ?></p>
						<p><b>Số điện thoại:</b>
							<?php echo $setting_basis[$address - 1]['basis-numberphone']; ?>
						</p>
						<p><b>Thời gian làm việc:</b>
							<?php echo $wordtime; ?>
						</p>
					</div>
					<h2 class="archive-title">Cơ Sở Vật Chất</h2>
					<div class="basis-infrastructure">
						<?php
						if ($infrastructure) {
							$count = count($infrastructure);
							$i     = 0;
							foreach ($infrastructure as $key => $value) {
								if ($i = 0) {
									?>
									<div class="infrastructure-item">
										<img src="<?php echo $value['full_url']; ?>" alt="">
									</div>
									<div class="row list-infrastructure">
										<?php
								} elseif ($i > 0 && $i < $count - 1) {
									?>
										<div class="col-4 item">
											<div class="inner">
												<img src="<?php echo $value['full_url']; ?>" alt="">
											</div>
										</div>
										<?php
								} elseif ($i == $count - 1) {
									?>
										<div class="col-4 item">
											<div class="inner">
												<img src="<?php echo $value['full_url']; ?>" alt="">
											</div>
										</div>
									</div>
									<?php
								}
								$i++;
							}
						}
						?>
					</div>
					<h2 class="archive-title">Đánh Giá</h2>
					<div class="list-reviews">
						<?php
						if ($review) {
							foreach ($review as $key => $value) {
								$url_img = wp_get_attachment_image_url($value['evaluate-images'][0], '');
								?>
								<div class="review">
									<div class="avatar">
										<img src="<?php echo $url_img; ?>" alt="">
									</div>
									<div class="review-content">
										<h3 class="review-name">
											<?php echo $value['evaluate-name']; ?>
										</h3>
										<p class="review-desc">
											<?php echo $value['evaluate-content']; ?>
										</p>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>
					<h2 class="archive-title">Bản Đồ</h2>
					<div class="page-map">
						<a href="<?php echo $setting_basis[$address - 1]['map-link']; ?>" class="map-link">Xem đường đi
							ngay</a>
						<div class="google-map">
							<?php echo $setting_basis[$address - 1]['map-iframe']; ?>
							<div class="map-address">
								<h3 class="address-title">Hệ thống cơ sở</h3>
								<div class="address-content">
									<a class="btn-address" data-toggle="collapse" href="#showaddress" role="button"
										aria-expanded="false" aria-controls="showaddress"><i
											class="fa fa-chevron-circle-down" aria-hidden="true"></i>
										<?php echo $setting_basis[$address - 1]['basis-address']; ?>
									</a>
									<div class="collapse multi-collapse" id="showaddress">
										<a href="tel:<?php echo $setting_basis[$address - 1]['basis-numberphone']; ?>" class="number-phone">
											<span class="fa fa-phone"></span>
											<span>
												<?php echo $setting_basis[$address - 1]['basis-numberphone']; ?>
											</span>
										</a>
										<a href="<?php echo $link_booking; ?>" class="btn-book">Đặt hẹn ngay</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					if (!empty($users)) {
						?>
						<h2 class="archive-title">Đội Ngũ Chuyên gia</h2>
						<div class="list-doctor">
							<?php
							foreach ($users as $user) {
								$args = array(
									'data' => $user
								);
								get_template_part("components/post", "doctor", $args);
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
				<div class="col-md-4">
					<?php echo get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>