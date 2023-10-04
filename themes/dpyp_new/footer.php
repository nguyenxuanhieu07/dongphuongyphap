<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DPYP
 */

$settings = get_option( 'option_form' );

$fb_link = ( $settings['footer_facebook'] != null ) ? $settings['footer_facebook'] : "#";

$ins_link = $settings['footer_instagram'] ? $settings['footer_instagram'] : "#";

$ytb_link = $settings['footer_youtube'] ? $settings['footer_youtube'] : "#";

?>
<footer class="page-footer" id="page-footer">
	<div class="footer-top">
		<div class="container">
			<p class="footer-name">TRUNG TÂM ỨNG DỤNG ĐÔNG PHƯƠNG Y PHÁP</p>
			<div class="row">
				<div class="col-md-5">
					<div class="office">
						<div class="outer-office">
							<p class="head-office">Hà Nội</p>
						</div>
						<p><i class="fa fa-map-marker" aria-hidden="true"></i> Biệt thự B31 ngõ 70 Nguyễn Thị Định, Thanh Xuân, HN</p>
						<p class="numberphone"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:097.457.3434">097.457.3434</a> - <a href="tel:(024)66873434">(024) 6687 3434</a></p>
						<p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/Ebx6AzccP6iv1CxP9" target="_blank" rel="noopener">Xem bản đồ</a></p>
					</div>
					<div class="office">
						<div class="outer-office">
							<p class="head-office">Hồ Chí Minh</p>
						</div>
						<p><i class="fa fa-map-marker" aria-hidden="true"></i> Số 145 Hoa Lan, phường 2, quận Phú Nhuận, TP. HCM</p>
						<p class="numberphone"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:02866795254">(028) 6679 5254</a></p>
						<p><i class="fa fa-sign-in" aria-hidden="true"></i><a class="view-detail" href="https://goo.gl/maps/hdjV9Uw41EPNU9JU9" target="_blank" rel="noopener">Xem bản đồ</a></p>
					</div>
				</div>
				<div class="col-md-4 col-time-calendar">
					<div class="outer-title">
						<p class="heading-title">Lịch làm việc</p>
					</div>
					<p>Làm việc tất cả các ngày trong tuần</p>
					<div class="d-flex justify-content-between">
						<p><strong>Sáng</strong>: 8h - 12h</p>
						<p><strong>Chiều</strong>: 13h30 - 17h30</p>
					</div>
					<p>Nếu đến sau 17h30 vui lòng liên hệ trước để bác sĩ đặt lịch ( <small>Trung tâm có chỗ để xe ô tô cho quý khách</small> )</p>
					<div class="outer-title">
						<p class="heading-title">Hỗ trợ</p>
					</div>
					<p>Đặt lịch khám/ tư vấn</p>
					<form action="/" class="dat-lich-footer row">
						<div class="form-group col-7">
							<input name="fullname" type="text" id="fullname-footer" placeholder="Họ tên"class="form-control" required>
							<label class="fs-0" for="fullname-footer">Họ tên</label>
						</div>
						<div class="form-group pl-0 col-5">
							<input name="numberphone" type="text" id="phone-footer" placeholder="Số điện thoại" inputmode="decimal" pattern="(\+84|0){1}(9|8|7|5|3){1}[0-9]{8}" class="form-control" required>
							<label class="fs-0" for="phone-footer">Số điện thoại</label>
						</div>
						<button type="submit" class="btn btn-submit" aria-label="submit form">Đặt lịch</button>
					</form>
				</div>
				<div class="col-md-3">
					<div class="outer-title">
						<p class="heading-title">KẾT NỐI VỚI CHÚNG TÔI</p>
					</div>
					<?php 
					if(has_nav_menu('footer')){
						wp_nav_menu(
							array(
								'theme_location'  => 'footer',
								'container'       => '',
								'container_id'    => '',
								'container_class' => '',
								'menu_id'         => false,
								'depth'           => 1,
							)
						);
					}
					?>
					<ul class="social-link d-flex">
						<li>
							<a href="<?php echo $fb_link; ?>" target="_blank" rel="noopener"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>
						</li>
						<li>
							<a href="<?php echo $ytb_link; ?>" target="_blank" rel="noopener"> <i class="fa fa-youtube" aria-hidden="true"></i> </a>
						</li>
						<li>
							<a href="<?php echo $ins_link; ?>" target="_blank" rel="noopener"> <i class="fa fa-instagram" aria-hidden="true"></i> </a>
						</li>
					</ul>
					<a href="//www.dmca.com/Protection/Status.aspx?ID=7ce030b7-8b27-4646-a351-08ab7d805f75" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca_protected_25_120.png?ID=7ce030b7-8b27-4646-a351-08ab7d805f75"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
				</div>
			</div>
		</div>
	</div>
	<div class="respond">
		<div class="container">
			<p class="text-left">
				<small>
					Thông tin trên website này chỉ mang tính chất nội bộ tham khảo; không được xem là tư vấn y khoa và không nhằm mục đích thay thế cho tư vấn, chẩn đoán hoặc điều trị từ nhân viên y tế. Khi có vấn đề về sức khỏe hoặc cần hỗ trợ cấp cứu  người đọc cần liên hệ bác sĩ và cơ sở y tế gần nhất
				</small>
			</p>
		</div>
	</div>
	<div class="copyright text-center">
		© Bản quyền: www.dongphuongyphap.com
	</div>
</footer>
<!-- Modal booking-->
<div class="modal fade modal-booking-doctor" id="modal-booking-doctor" tabindex="-1" aria-labelledby="modal-booking-doctorLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" id="modal-booking-doctorLabel">Đặt lịch hẹn</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="send-booking-doctor">
					<div class="form-row">
						<div class="form-group col-md-6 col-6">
							<input name="fullname" type="text" class="form-control" placeholder="Họ tên"
							required="required">
						</div>
						<div class="form-group col-md-6  col-6">
							<input name="numberphone" type="text" class="form-control" placeholder="Số điện thoại"
							required="required">
						</div>
					</div>
					<div class="form-group">
						<input name="email" type="text" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
						<textarea name="content" class="form-control" required="required"
						placeholder="Tình trạng bệnh của bạn..." rows="3"></textarea>
					</div>
					<div class="expert-box mt-3">
						<div class="d-flex align-items-center">
							<div class="avt-box">
								<img src="<?php echo get_template_directory_uri();?>/images/expert/1.jpg" alt="">
							</div>
							<div class="expert-info">
								<p class="expert-name"><strong>Ths.BS chuyên khoa II Nguyễn Thị Tuyết Lan</strong>
								</p>
								<p>
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									<a class="office" href="#">TDT cơ sở Nguyễn Thị Định</a>
								</p>

							</div>

						</div>
					</div>
					<input type="hidden" name="doctor" id="" value="Nguyễn Thị Tuyết Lan">
					<input type="hidden" name="profile" id="" value="Thuốc dân tộc - Nguyễn Thị Định">
					<button type="submit" class="btn btn-submit">Đặt lịch</button>
				</form>
			</div>
		</div>
	</div>
</div>

<section class="bottom-support">
	<div class="container">
		<div class="d-flex">
			<div class="col-hotline d-flex align-items-center">
				<button class="d-block btn-icon-phone d-sm-none d-md-none" aria-label="Btn hotline"><i class="fa fa-phone" aria-hidden="true"></i> Gọi điện</button>
				<div class="wrap-hotline">
					<a href="tel:02466873434" class="btn btn-hotline"> <span>HN</span> (024) 6687 3434 </a> <a href="tel:02866795254" class="btn btn-hotline"> <span>HCM</span> (028) 6679 5254 </a>
				</div>
			</div>
			<a href="/dat-lich-kham-tu-van" class="btn btn-appointment ml-auto">
				<span class="icon"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> </span> Đặt lịch khám
			</a>
		</div>
	</div>
</section>

<div class="modal-hotline-mobile">
	<span class="close-modal">
		<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 409.806 409.806" style="enable-background: new 0 0 409.806 409.806;" xml:space="preserve">
			<g>
				<path
				d="M228.929,205.01L404.596,29.343c6.78-6.548,6.968-17.352,0.42-24.132c-6.548-6.78-17.352-6.968-24.132-0.42 c-0.142,0.137-0.282,0.277-0.42,0.42L204.796,180.878L29.129,5.21c-6.78-6.548-17.584-6.36-24.132,0.42 c-6.388,6.614-6.388,17.099,0,23.713L180.664,205.01L4.997,380.677c-6.663,6.664-6.663,17.468,0,24.132 c6.664,6.662,17.468,6.662,24.132,0l175.667-175.667l175.667,175.667c6.78,6.548,17.584,6.36,24.132-0.42 c6.387-6.614,6.387-17.099,0-23.712L228.929,205.01z"
				></path>
			</g>
		</svg>
	</span>
	<img class="logo lazyloaded" src="<?php echo THEME_URI; ?>/images/logo-white.png" alt="" />
	<p class="slogan">Tổng đài tư vấn bệnh học</p>
	<div class="text-center cta-text">Kết nối với đội ngũ bác sĩ, chuyên gia của chúng tôi để được giải đáp thắc mắc của bạn, để lại số điện thoại để được tư vấn</div>
	<form action="" class="send-numberphone dat-lich-footer">
		<input type="hidden" name="fullname" value="Gọi lại cho tôi">
		<input name="numberphone" id="txt-numberphone-input" type="text" inputmode="decimal" pattern="(\+84|0){1}(9|8|7|5|3){1}[0-9]{8}" class="form-control" placeholder="" />
		<button type="submit" class="btn-send">Gọi lại cho tôi</button>
	</form>
	<p class="text-or">Hotline tư vấn</p>
	<div class="hotline-item">
		<a href="tel:02466873434">
			<span class="location"> Hà Nội </span> (024) 6687 3434
			<span class="call-button">
				<img src="<?php echo THEME_URI; ?>/images/icon-phone-white.svg"/> Gọi
			</span>
		</a>
	</div>
	<div class="hotline-item">
		<a href="tel:02866795254">
			<span class="location"> Hồ Chí Minh </span> (028) 6679 5254
			<span class="call-button">
				<img src="<?php echo THEME_URI; ?>/images/icon-phone-white.svg"/> Gọi
			</span>
		</a>
	</div>
	<div class="hotline-item">
		<a href="tel:02036570128">
			<span class="location"> Quảng Ninh </span> (0203) 657 0128
			<span class="call-button">
				<img src="<?php echo THEME_URI; ?>/images/icon-phone-white.svg"/> Gọi
			</span>
		</a>
	</div>
</div>

<?php get_template_part('component/modal', 'video'); ?>

<?php get_template_part('component/modal', 'search'); ?>

<?php get_template_part('component/action', 'single'); ?>

<?php get_template_part('component/footer', 'hotline'); ?>

<a href="#" id="btn-to-top" class="btn-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i>to top</a>

<?php if( is_single() ){ ?>
	<script>
		jQuery(document).ready(function () {
            // share other
			var btn_share_other = jQuery(".action-share li.other-share a");
			if( btn_share_other.length ){
				btn_share_other.on('click', function(e) {
					e.preventDefault();
					if (navigator.share) {
						navigator.share({
							title: <?php echo "'" . get_the_title() . "'"; ?> ,
							text: <?php echo "'" . get_the_excerpt() . "'"; ?>,
							url: <?php echo "'" . get_the_permalink() . "'"; ?>,
						})
					}
				});
			}
		});
	</script>
<?php } ?>
<script type="text/javascript" src="https://erp.vietmecgroup.com/api1/web-data.js" defer=""></script>

<?php wp_footer(); ?>

</body>
</html>
