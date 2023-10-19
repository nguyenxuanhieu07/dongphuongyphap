<?php
/**
 * Template name: Quy trình thăm khám
 */
get_header();
?>
<main class="page-procedure">
	<?php get_template_part("components/breadcrumd"); ?>
	<section class="page-slider">
		<div class="slider-inner">
			<img src="<?php echo THEME_URI; ?>/images/product/banner_1.png" alt="">
			<h1 class="slide-title">
				<?php the_title(); ?>
			</h1>
		</div>
	</section>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="box-procedure">
						<p class="box-desc">Hơn 1 thập kỷ hoạt động, Đông Phương Y Pháp áp dụng quy trình thăm khám -
							điều trị khoa học đảm bảo hiệu quả, an toàn,
							rút ngắn thời gian, thủ tục cho người bệnh</p>
					</div>
					<h2 class="archive-title">Quy Trình Thăm Khám</h2>
					<ul class="list-procedure">
						<li class="item">
							<div class="item-box">
								<span class="gim-text">1</span>
							</div>
							<div class="item-content">
								<h3 class="item-title">Thăm khám, hội chẩn</h3>
								<p>Thăm khám theo phương pháp Tứ Chẩn của YHCT</p>
							</div>
						</li>
						<li class="item">
							<div class="item-box">
								<span class="gim-text">2</span>
							</div>
							<div class="item-content">
								<h3 class="item-title">Tư vấn hệ giải pháp</h3>
								<ul>
									<li>Hội đồng bác sĩ hội chẩn, xây dựng phác đồ</li>
									<li>Thông báo, hướng dẫn chi tiết phác đồ cho người bệnh</li>
								</ul>
							</div>
						</li>
						<li class="item">
							<div class="item-box">
								<span class="gim-text">3</span>
							</div>
							<div class="item-content">
								<h3 class="item-title">Điều trị</h3>
								<ul>
									<li>Trị liệu tại trung tâm</li>
									<li>Sử dụng đông dược, sản phẩm bổ trợ tại nhà</li>
									<li>Tập luyện kết hợp chế độ thực liệu phù hợp</li>
								</ul>
							</div>
						</li>
						<li class="item">
							<div class="item-box">
								<span class="gim-text">4</span>
							</div>
							<div class="item-content">
								<h3 class="item-title">Chuyên gia đồng hành cùng người bệnh chăm sóc sức khỏe tại nhà
								</h3>
								<ul>
									<li>Kỹ thuật viên hỗ trợ tập luyện tại nhà</li>
									<li>Bác sĩ đồng hành 24/7 giải đáp thắc mắc, băn khoăn</li>
								</ul>
							</div>
						</li>
						<li class="item">
							<div class="item-box">
								<span class="gim-text">5</span>
							</div>
							<div class="item-content">
								<h3 class="item-title">Tái khám, đánh giá lại tình hình sức khỏe</h3>
								<ul>
									<li>Kỹ thuật viên hỗ trợ tập luyện tại nhà</li>
									<li>Bác sĩ đồng hành 24/7 giải đáp thắc mắc, băn khoăn</li>
								</ul>
							</div>
						</li>
					</ul>
					<?php
					$settings      = get_option('option_form');
					$settings_page = get_option('option_pages');
					$page_id       = isset($options['page-booking']) ? $options['page-booking'] : 0;
					if ($page_id) {
						$link_booking = get_page_link($page_id);
					}
					$fb_link = ($settings['footer_facebook'] != null) ? $settings['footer_facebook'] : "#";
					?>
					<h2 class="archive-title">Đặt Lịch Trước Với Chuyên Gia</h2>
					<div class="list-option-book">
						<p class="book-text">Không cần chờ đợi lâu</p>
						<div class="row">
							<div class="col-md-3">
								<div class="inner box-1">
									<h3 class="inner-title">Cách 1</h3>
									<p class="inner-text">Liên hệ hotline <b><a href="#">0974573434</a></b></p>
									<a href="tel:0974573434" class="inner-phone"><img
											src="<?php echo THEME_URI; ?>/images/icons/phone-1.png" alt=""></a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="inner box-2">
									<h3 class="inner-title">Cách 2</h3>
									<p class="inner-text">Đặt lịch qua <b><a href="tel:0974573434">Zalo</a></b> tại đây
									</p>
									<a href="tel:0974573434" class="inner-phone"><img
											src="<?php echo THEME_URI; ?>/images/icons/phone-1.png" alt=""></a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="inner box-3">
									<h3 class="inner-title">Cách 3</h3>
									<p class="inner-text">Đặt lịch qua <b><a
												href="<?php echo $fb_link; ?>">Facebook</a></b> tại đây</p>
									<a href="tel:0974573434" class="inner-phone"><img
											src="<?php echo THEME_URI; ?>/images/icons/phone-1.png" alt=""></a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="inner box-4">
									<h3 class="inner-title">Cách 4</h3>
									<p class="inner-text">Đặt lịch qua <b><a
												href="<?php echo $link_booking; ?>">Website</a></b> tại đây</p>
									<a href="tel:0974573434" class="inner-phone"><img
											src="<?php echo THEME_URI; ?>/images/icons/phone-1.png" alt=""></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<form action="" class="form-booking">
						<h2 class="form-title text-center">
							Đăng ký
							<p>Nhận tư vấn miễn phí</p>
						</h2>
						<p class="form-desc text-center">Vui lòng để lại vấn đề bạn đang gặp phải, bác sĩ sẽ hỗ trợ
							trong thời gian sớm nhất</p>
						<div class="form-group">
							<label class="form-lable" for="fullname">Họ và tên *</label>
							<input type="text" name="fullname" class="form-control control-custom" id="fullname"
								placeholder="Họ và tên *" required>
						</div>
						<div class="form-group">
							<label class="form-lable" for="numberphone">Số điện thoại *</label>
							<input type="text" name="numberphone" class="form-control control-custom" id="numberphone"
								placeholder="Số điện thoại *" required>
						</div>
						<div class="form-group">
							<label class="form-lable" for="note">Vấn đề đang gặp phải</label>
							<textarea class="form-control control-custom" id="note" rows="3" name="note"
								placeholder="Vấn đề đang gặp phải"></textarea>
						</div>
						<button type="submit" class="form-control btn-send">Gửi thông tin</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>