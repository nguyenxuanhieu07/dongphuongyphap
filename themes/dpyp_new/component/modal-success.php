
<div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="modal-success"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="box-icon text-center">
					<img src="<?php echo THEME_URI; ?>/images/icons/successful.png" alt="" class="icon-success">
					<h2 class="text-icon">Đặt hàng thành công</h2>
				</div>
				<div class="box-cart">
					<?php
					if (isset($_SESSION["cart"])) {
						$cart = $_SESSION["cart"];
						foreach ($cart['cart-item'] as $key => $cart_item) {
							?>
							<div class="cart-item">
								<h3 class="product-title">
									<?php echo $cart_item['product_name']; ?>
								</h3>
								<p class="product-quantity">Số lượng x
									<?php echo $cart_item['quantity']; ?>
								</p>
							</div>
						<?php } ?>
						<div class="cart-price">
							<p class="cart-title">Thành tiền</p>
							<p class="total-price">
								<?php echo format_price($cart['cart-total']); ?>đ
							</p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>