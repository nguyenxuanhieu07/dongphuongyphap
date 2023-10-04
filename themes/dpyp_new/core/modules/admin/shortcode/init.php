<?php 
function lb_add_tinymce() {
	global $typenow;
	if (empty($typenow)) return;
	add_filter('mce_external_plugins', 'lb_mce_external_plugins_filter');
	add_filter('mce_buttons', 'lb_mce_buttons_filter');
}
add_action('admin_head', 'lb_add_tinymce');

function lb_mce_external_plugins_filter($plugin_array) {
	$plugin_array['suggest_link'] = get_template_directory_uri() . '/core/modules/admin/shortcode/js/tinymce-custom-button.js';
	return $plugin_array;
}

function lb_mce_buttons_filter($buttons) {
	array_push($buttons, 'suggest_link');
	return $buttons;
}


// Add Shortcode
function tdt_create_cta_contact() {
	ob_start();
	?>
	<div class="cta-plugin">
		<div class="cta-contact">
			<div class="row">
				<div class="col-md-6 col-12 order-md-12">
					<span class="cta-contact--book"><a href="/dat-lich-kham-benh" title="" target="_blank"><i class="fa fa-bell mr5 a-ring"></i> Đặt lịch khám</a></span>
				</div>
				<div class="col-md-6 col-12 order-md-6">
					<span class="cta-contact--add">Thông tin liên hệ</span>
				</div>
			</div>
			<div class="cta-contact-cn">
				<div class="contact-head">
					<div class="row">
						<div class="col-md-3 d-none d-md-block d-lg-block">
							<img class="img-fluid" src="<?php echo get_template_directory_uri();?>/images/logo.png">
						</div>
						<div class="col-md-9 align-self-center">
							<div class="contact-head-info">
								<div class="c-text">
									<h3 class="title green">TRUNG TÂM NGHIÊN CỨU VÀ ỨNG DỤNG THUỐC DÂN TỘC</h3>
									<span>Nâng tầm giá trị y học Dân Tộc</span>
									<p><i class="fa fa-globe mr5"></i> www.thuocdantoc.org<small class="mh10">/</small><i class="fa fa-envelope mr5"></i> info@thuocdantoc.org</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="ctd-contact--info">
							<span>Hà Nội</span>
							<p><i class="fa fa fa-map-marker mr5"></i> <strong>Địa chỉ:</strong>  B31 Ngõ 70 - Nguyễn Thị Định - Q.Thanh Xuân - Hà Nội</p>
							<p><i class="fa fa-phone mr5"></i> <strong>Điện thoại:</strong> <a href="tel:02471096699" title="Gọi điện ngay">(024)7109 6699</a></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="ctd-contact--info">
							<span>Hồ Chí Minh</span>
							<p><i class="fa fa fa-map-marker mr5"></i> <strong>Địa chỉ:</strong> Số 145 Hoa Lan, Phường 2, Quận Phú Nhuận, TP. Hồ Chí Minh</p>
							<p><i class="fa fa-phone mr5"></i> <strong>Điện thoại:</strong> <a href="tel:02871096699" title="Gọi điện ngay">(028)7109 6699</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'cta-contact', 'tdt_create_cta_contact' );