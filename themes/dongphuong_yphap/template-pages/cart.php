<?php session_start(); ?>
<?php
/**
 * Template name: Giỏ hàng
 */
get_header();
?>
<main class="cart">
	<?php get_template_part("components/breadcrumd"); ?>
	<div class="page-content">
		<div class="container">
			<h1 class="page-title">Giỏ Hàng</h1>
			<?php
			$cart = $_SESSION["cart"] ? $_SESSION["cart"] : '';
			if ($cart):
				$options = get_option('option_pages');
				$page_id = isset($options['page-checkout']) ? $options['page-checkout'] : 0;
				if ($page_id) {
					$link_checkout = get_page_link($page_id);
				}
				?>
				<form action="" class="form-cart" method="post">
					<div class="row">
						<div class="col-md-8">
							<div class="cart-product">
								<div class="cart-thead">
									<div class="thead-item product-remove"></div>
									<div class="thead-item product-thumbnail"></div>
									<div class="thead-item product-name">Sản phẩm</div>
									<div class="thead-item product-price">Giá</div>
									<div class="thead-item cart-quantity">Số lượng</div>
									<div class="thead-item product-total-price">Tạm tính</div>
								</div>
								<div class="cart-content">
									<?php
									foreach ($cart['cart-item'] as $key => $cart_item) {
										$product_img_url = get_the_post_thumbnail_url($cart_item['product_id'], 'full');
										?>
										<div class="cart-item">
											<div class="product-remove">
												<a href="#" class="remove">
													<i class="fa fa-trash" aria-hidden="true"></i>
												</a>
											</div>
											<div class="product-thumbnail">
												<a href="<?php echo get_the_permalink($cart_item['product_id']); ?>"
													class="cart-image">
													<img src="<?php echo $product_img_url; ?>" alt="">
												</a>
											</div>
											<div class="product-name">
												<a href="<?php echo get_the_permalink($cart_item['product_id']); ?>">
													<?php echo $cart_item['product_name']; ?>
												</a>
											</div>
											<div class="product-price">
												<span class="price-item">
													<?php echo format_price($cart_item['regular_price']); ?>đ
												</span>
											</div>
											<div class="cart-quantity">
												<div class="product-quantity">
													<span class="quantity-minus">-</span>
													<input type="number" value="<?php echo $cart_item['quantity']; ?>"
														class="input-quantity" min="1"
														name="quantity[<?php echo $cart_item['product_id']; ?>]">
													<span class="quantity-plus">+</span>
												</div>
												<input type="hidden" class="product-id" value="<?php echo $cart_item['product_id']; ?>">
											</div>
											<div class="product-total-price">
												<span class="total-price">
													<?php echo format_price($cart_item['total_price']); ?>đ
												</span>
											</div>
										</div>
									<?php } ?>
									<div class="cart-action">
										<button type="submit" class="btn upadate-cart">Cập nhật giỏ hàng</button>
									</div>
								</div>
							</div>
							<div class="loader">
								<div class="bar1"></div>
								<div class="bar2"></div>
								<div class="bar3"></div>
								<div class="bar4"></div>
								<div class="bar5"></div>
								<div class="bar6"></div>
								<div class="bar7"></div>
								<div class="bar8"></div>
								<div class="bar9"></div>
								<div class="bar10"></div>
								<div class="bar11"></div>
								<div class="bar12"></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="cart-collaterals">
								<table class="table-collaterals">
									<tr>
										<th>Tạm tính</th>
										<td>
											<?php echo format_price($cart['cart-total']); ?>đ
										</td>
									</tr>
									<tr>
										<th>Tổng</th>
										<td class="total-price">
											<?php echo format_price($cart['cart-total']); ?>đ
										</td>
									</tr>
								</table>
								<a href="<?php echo $link_checkout; ?>" class="cart-checkout">Tiến hành thanh toán</a>
							</div>
						</div>
					</div>
				</form>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>