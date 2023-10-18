<?php
get_header();
$product_name = rwmb_meta('product-name') ? rwmb_meta('product-name') : get_the_title();
$product_desc = rwmb_meta('product-desc') ? rwmb_meta('product-desc') : '';
$args_product = array(
	'product_name' => $product_name,
	'product_desc' => $product_desc,
);
?>
<main class="single-product">
	<?php get_template_part("components/breadcrumd"); ?>
	<?php get_template_part("components/notification"); ?>
	<?php get_template_part("blocks/product/product-info", "top", $args_product); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php get_template_part("blocks/product/product", "info", $args_product); ?>
				<?php get_template_part("blocks/product/product", "uses"); ?>
				<?php get_template_part("blocks/product/product", "uses-object"); ?>
				<?php get_template_part("blocks/product/product", "usesing"); ?>
				<h2 class="archive-title">Lưu Ý Khi Sử Dụng</h2>
				<div class="product-using">
					<ul class="list-using">
						<li class="item">Ăn trực tiếp: 100% đông trùng hạ thảo Vietfarm trước khi đến tay người
							tiêu dùng đều đã được tuyển chọn, làm sạch và khử
							trùng công nghệ cao. Do vậy, người dùng hoàn toàn có thể nhai, ăn trực tiếp. Cảm
							nhận hương vị của đông trùng hạ thảo tự
							nhiên.</li>
						<li class="item">Nấu cùng thức ăn: Bỏ khoảng 7 – 10 sợi đông trùng hạ thảo vào thức ăn
							đã được nấu chín, sau đó tắt bếp và đảo đều. Với
							cách này hoạt chất trong dược liệu sẽ được hòa tan cùng thức ăn và đi vào cơ thể.
							Một số món ăn nổi bật như cháo đông
							trùng hạ thảo, gà hầm đông trùng hạ thảo…</li>
						<li class="item">Pha trà đông trùng hạ thảo: Cho khoảng 4-5 sợi đông trùng vào bình trà,
							rồi đổ nước ấm 70 – 80 độ C vào, đợi trong 3-5
							phút có thể thưởng thức</li>
						<li class="item">Đông trùng hạ thảo ngâm mật ong: Ngâm 20gr đông trùng hạ thảo cùng
							600ml mật ong, để nơi khô ráo, tránh ánh nắng trực
							tiếp. Sau 2 tuần có thể sử dụng. Mỗi lần dùng 5-10ml cùng 4-5 sợi đông trùng hạ thảo
							cùng nước ấm.</li>
						<li class="item">Ngâm rượu đông trùng hạ thảo: Ngâm 20 – 25gr đông trùng hạ thảo sấy
							thăng hoa cùng 1 – 2 lít rượu 30 – 35 độ. Bảo quản
							nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp. Ngâm đủ 1 tháng là có thể sử
							dụng. Mỗi lần dùng 1 – 2 chén nhỏ.</li>
					</ul>
				</div>
				<div class="product-reason">
					<h2 class="archive-title">Lý Do Nên Chọn Trung Tâm Dược Liệu VF</h2>
					<ul class="list-reason">
						<li class="item"><span class="item-number">1</span>Lorem ipsum dolor sit amet,
							consectetur adipiscing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
							nostrud exercitation </li>
						<li class="item"><span class="item-number">2</span>Lorem ipsum dolor sit amet,
							consectetur adipiscing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
							nostrud exercitation </li>
						<li class="item"><span class="item-number">3</span>Lorem ipsum dolor sit amet,
							consectetur adipiscing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
							nostrud exercitation </li>
						<li class="item"><span class="item-number">4</span>Lorem ipsum dolor sit amet,
							consectetur adipiscing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
							nostrud exercitation </li>
					</ul>
				</div>
				<h2 class="archive-title">Bình Luận</h2>
				<div id="comments" class="comments-area clearfix">
					<p class="comment-section-title">Nội dung bình luận</p>
					<form action="" class="comment-form" id="commentform">
						<div class="row row-field">
							<div class="col-md-12">
								<textarea class="form-control" id="comment" name="comment"
									placeholder="Nội dung bình luận" rows="5" aria-required="true"></textarea>
							</div>
							<div class="col-md-6">
								<input class="form-control" id="author" placeholder=" Họ tên" name="author" type="text"
									value="" size="30">
							</div>
							<div class="col-md-6">
								<input class="form-control" id="email" placeholder="Email của bạn" name="email"
									type="text" value="" size="30">
							</div>
						</div>
						<p class="form-submit"><input name="submit" type="submit" id="submit" class="submit"
								value="Gửi bình luận"> <input type="hidden" name="comment_post_ID" value=""
								id="comment_post_ID">
							<input type="hidden" name="comment_parent" id="comment_parent" value="">
						</p>
					</form>
					<ol class="comment-list">
						<li class="comment ">
							<div class="comment-body">
								<div class="comment-author">
									<img src="<?php echo THEME_URI; ?>/images/product/avatar.png" alt="" class="avatar">
									<b class="fn">Quách Trang</b>
									<span class="reply"><i class="fa fa-reply" aria-hidden="true"></i>
										<a rel="nofollow" class="comment-reply-link" href="#">Trả
											lời</a>
									</span>
								</div>
								<p>Chỉ mà cấy vào cơ thể có gây hại gì không mọi người? Chỉ kiểu giống chỉ mà
									khâu vết thương á, em mới biết tới phương pháp này thấy ghê ghê á, không
									biết có hiệu quả không vậy?</p>
							</div>
							<ol class="children">
								<li class="comment">
									<div class="comment-body">
										<div class="comment-author">
											<img src="<?php echo THEME_URI; ?>/images/product/avatar.png" alt=""
												class="avatar">
											<b class="fn">Quách Trang</b>
											<span class="reply"><i class="fa fa-reply" aria-hidden="true"></i>
												<a rel="nofollow" class="comment-reply-link" href="#">Trả
													lời</a>
											</span>
										</div>
										<p>Chỉ mà cấy vào cơ thể có gây hại gì không mọi người? Chỉ kiểu giống
											chỉ mà khâu vết thương á, em mới biết tới phương pháp này thấy ghê
											ghê á, không biết có hiệu quả không vậy?</p>
									</div>
								</li>
							</ol>
						</li>
						<li class="comment ">
							<div class="comment-body">
								<div class="comment-author">
									<img src="<?php echo THEME_URI; ?>/images/product/avatar.png" alt="" class="avatar">
									<b class="fn">Quách Trang</b>
									<span class="reply"><i class="fa fa-reply" aria-hidden="true"></i>
										<a rel="nofollow" class="comment-reply-link" href="#">Trả
											lời</a>
									</span>
								</div>
								<p>Chỉ mà cấy vào cơ thể có gây hại gì không mọi người? Chỉ kiểu giống chỉ mà
									khâu vết thương á, em mới biết tới phương pháp này thấy ghê ghê á, không
									biết có hiệu quả không vậy?</p>
							</div>
							<ol class="children">
								<li class="comment">
									<div class="comment-body">
										<div class="comment-author">
											<img src="<?php echo THEME_URI; ?>/images/product/avatar.png" alt=""
												class="avatar">
											<b class="fn">Quách Trang</b>
											<span class="reply"><i class="fa fa-reply" aria-hidden="true"></i>
												<a rel="nofollow" class="comment-reply-link" href="#">Trả
													lời</a>
											</span>
										</div>
										<p>Chỉ mà cấy vào cơ thể có gây hại gì không mọi người? Chỉ kiểu giống
											chỉ mà khâu vết thương á, em mới biết tới phương pháp này thấy ghê
											ghê á, không biết có hiệu quả không vậy?</p>
									</div>
								</li>
							</ol>
						</li>
						<li class="comment ">
							<div class="comment-body">
								<div class="comment-author">
									<img src="<?php echo THEME_URI; ?>/images/product/avatar.png" alt="" class="avatar">
									<b class="fn">Quách Trang</b>
									<span class="reply"><i class="fa fa-reply" aria-hidden="true"></i>
										<a rel="nofollow" class="comment-reply-link" href="#">Trả
											lời</a>
									</span>
								</div>
								<p>Chỉ mà cấy vào cơ thể có gây hại gì không mọi người? Chỉ kiểu giống chỉ mà
									khâu vết thương á, em mới biết tới phương pháp này thấy ghê ghê á, không
									biết có hiệu quả không vậy?</p>
							</div>
							<ol class="children">
								<li class="comment">
									<div class="comment-body">
										<div class="comment-author">
											<img src="<?php echo THEME_URI; ?>/images/product/avatar.png" alt=""
												class="avatar">
											<b class="fn">Quách Trang</b>
											<span class="reply"><i class="fa fa-reply" aria-hidden="true"></i>
												<a rel="nofollow" class="comment-reply-link" href="#">Trả
													lời</a>
											</span>
										</div>
										<p>Chỉ mà cấy vào cơ thể có gây hại gì không mọi người? Chỉ kiểu giống
											chỉ mà khâu vết thương á, em mới biết tới phương pháp này thấy ghê
											ghê á, không biết có hiệu quả không vậy?</p>
									</div>
								</li>
							</ol>
						</li>
						<li class="comment ">
							<div class="comment-body">
								<div class="comment-author">
									<img src="<?php echo THEME_URI; ?>/images/product/avatar.png" alt="" class="avatar">
									<b class="fn">Quách Trang</b>
									<span class="reply"><i class="fa fa-reply" aria-hidden="true"></i>
										<a rel="nofollow" class="comment-reply-link" href="#">Trả
											lời</a>
									</span>
								</div>
								<p>Chỉ mà cấy vào cơ thể có gây hại gì không mọi người? Chỉ kiểu giống chỉ mà
									khâu vết thương á, em mới biết tới phương pháp này thấy ghê ghê á, không
									biết có hiệu quả không vậy?</p>
							</div>
						</li>
					</ol>
				</div>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
				<div class="customer-benefits">
					<h3 class="benefits-title">Quyền lợi khách hàng</h3>
					<div class="entry-benefits">
						<p class="entry-title">Truy xuất nguồn gốc</p>
						<ul class="list-benefits">
							<li class="item">Quét mã QR truy xuất nguồn gốc Kiểm định</li>
							<li class="item">Kiểm tra giấy tờ kiểm định của Bộ Y tế</li>
							<li class="item">Tư vấn bởi dược sĩ</li>
							<li class="item">Được tư vấn bởi chuyên viên tốt nghiệp ĐH Y Dược</li>
						</ul>
						<p class="entry-title">Vận chuyển</p>
						<ul class="list-benefits list-bottom">
							<li class="item">Giao hàng COD toàn quốc 24/7</li>
							<li class="item">Giá sỉ tốt nhất</li>
							<li class="item">Giá bán sỉ, lẻ tốt nhất thị trường</li>
						</ul>
					</div>
				</div>
				<div class="product-same">
					<h3 class="product-same-title">Sản phẩm tương tự</h3>
					<div class="entry-same">
						<div class="post-product">
							<a href="#" class="product-image">
								<img src="<?php echo THEME_URI; ?>/images/product/same-product1.png" alt="">
							</a>
							<div class="product-info">
								<h3 class="product-title"><a href="#">Đông Trùng Hạ Thảo Sợi Khô Vietfarm Cao Cấp</a>
								</h3>
								<div class="product-star">
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
								</div>
								<p class="product-price">200,000đ</p>
							</div>
						</div>
						<div class="post-product">
							<a href="#" class="product-image">
								<img src="<?php echo THEME_URI; ?>/images/product/same-product2.png" alt="">
							</a>
							<div class="product-info">
								<h3 class="product-title"><a href="#">Đông Trùng Hạ Thảo Sợi Khô Vietfarm Cao Cấp</a>
								</h3>
								<div class="product-star">
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
								</div>
								<p class="product-price">200,000đ</p>
							</div>
						</div>
						<div class="post-product">
							<a href="#" class="product-image">
								<img src="<?php echo THEME_URI; ?>/images/product/same-product3.png" alt="">
							</a>
							<div class="product-info">
								<h3 class="product-title"><a href="#">Đông Trùng Hạ Thảo Sợi Khô Vietfarm Cao Cấp</a>
								</h3>
								<div class="product-star">
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
								</div>
								<p class="product-price">200,000đ</p>
							</div>
						</div>
						<div class="post-product">
							<a href="#" class="product-image">
								<img src="<?php echo THEME_URI; ?>/images/product/same-product4.png" alt="">
							</a>
							<div class="product-info">
								<h3 class="product-title"><a href="#">Đông Trùng Hạ Thảo Sợi Khô Vietfarm Cao Cấp</a>
								</h3>
								<div class="product-star">
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
									<span class="fa fa-star active"></span>
								</div>
								<p class="product-price">200,000đ</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();