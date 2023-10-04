<?php
$cat_id = 0;
if( is_category() ){
	$cat_id = get_queried_object()->term_id;

}elseif( is_single() && function_exists('yoast_get_primary_term_id') ){
	$cat_id = yoast_get_primary_term_id('category',get_the_ID());

} ?>
<div class="col-md-3 sidebar">

	<?php
	$enable_ads_sidebar = rwmb_meta('enable_ads_sidebar');
	if($enable_ads_sidebar == ''){
		$enable_ads_sidebar = true;
	}
	if($enable_ads_sidebar){
		echo do_shortcode('[ads_sidebar]');
	}
	?>
	
	<div class="widget widget-hotline">
		<a href="tel:097.457.3434">Hotline: 097.457.3434</a>
	</div>
	<div class="widget widget-form sticky">
		<div class="widget-title">
			Gửi câu hỏi tư vấn
		</div>
		<div class="widget-content">
			<form class="form-label form-sidebar send-question">
				<div class="form-group">
					<input name="fullname" type="text" id="fullname-sidebar" class="form-control" required="required" />
					<label for="fullname-sidebar">Họ tên</label>
				</div>
				<div class="form-group">
					<input name="numberphone" type="text" id="phone-sidebar" inputmode="decimal" pattern="(\+84|0){1}(9|8|7|5|3){1}[0-9]{8}" class="form-control" required="required" />
					<label for="phone-sidebar">Số điện thoại</label>
				</div>
				<div class="form-group">
					<input name="email" id="email-sidebar" inputmode="email" type="email" class="form-control" />
					<label for="email-sidebar">Email</label>
				</div>
				<div class="form-group w-100">
					<textarea name="content" id="content-sidebar" class="form-control" required="required" rows="3"></textarea>
					<label for="content-sidebar">Nội dung câu hỏi</label>
				</div>
				<input type="hidden" name="category" value="<?php echo ( $cat_id != 0 ) ? get_term($cat_id, 'category')->name : ''; ?>">
				<button type="submit" class="btn btn-primary btn-green" aria-label="submit">Gửi câu hỏi</button>
			</form>
		</div>
	</div>
</div>