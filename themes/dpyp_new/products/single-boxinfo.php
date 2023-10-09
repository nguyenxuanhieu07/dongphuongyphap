<?php
$post_id         = get_the_ID();
$product_name    = rwmb_meta('product-name') ? rwmb_meta('product-name') : get_the_title();
$product_gallery = rwmb_meta('product-gallery') ? rwmb_meta('product-gallery') : '';
$product_price   = rwmb_meta('product-price') ? rwmb_meta('product-price') : 0;
$sale_price      = rwmb_meta('product-sale') ? rwmb_meta('product-sale') : 0;
$product_desc    = rwmb_meta('product-desc') ? rwmb_meta('product-desc') : '';
$regular_price   = $product_price;
if ($sale_price > 0) {
	$regular_price = $sale_price;
}
?>
<div class="product-info">
	<div class="container product-container">
		<div class="row">
			<div class="col-md-3">
				<div class="list-thumbnail">
					<div class="item-thumbnail">
						<?php echo get_the_post_thumbnail($post_id); ?>
					</div>
					<?php
					foreach ($product_gallery as $key => $value) {
						?>
						<div class="item-thumbnail">
							<img src="<?php echo $value['full_url']; ?>" alt="">
						</div>
						<?php
					}
					?>
				</div>
				<div class="list-gallery">
					<div class="item-gallery">
						<?php echo get_the_post_thumbnail($post_id); ?>
					</div>
					<?php
					foreach ($product_gallery as $key => $value) {
						?>
						<div class="item-gallery">
							<img src="<?php echo $value['full_url']; ?>" alt="">
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<div class="col-md-9">
				<h1 class="product-title">
					<?php echo $product_name; ?>
				</h1>
				<div class="product-meta">
					<ul class="list-meta">
						<li class="item">
							<div class="list-star">
								<span class="fa fa-star active"></span>
								<span class="fa fa-star active"></span>
								<span class="fa fa-star active"></span>
								<span class="fa fa-star active"></span>
								<span class="fa fa-star active"></span>
							</div>
						</li>
						<li class="item">
							<span><b>5,026</b> Người đánh giá</span>
						</li>
						<li class="item">
							<span><b>6,000</b> Sản phẩm đã bán</span>
						</li>
					</ul>
					<div class="product-price">
						<span class="regular-price">
							<?php echo $regular_price; ?>đ
						</span>
						<?php if ($sale_price > 0): ?>
							<span class="sale-price">
								<?php echo $product_price; ?>đ
							</span>
						<?php endif; ?>
					</div>
					<div class="product-description">
						<?php echo $product_desc; ?>
					</div>
					<div class="product-action">
						<div class="product-quantity">
							<span class="quantity-minus">-</span>
							<input type="number" value="1" class="input-quantity" min="1">
							<input type="text" value="<?php echo $post_id; ?>" class="product-id" min="1" hidden>
							<span class="quantity-plus">+</span>
						</div>
						<a href="#" class="buy-now" >Mua ngay</a>
						<a href="#" class="add-to-cart"><img
								src="<?php echo THEME_URI; ?>/images/icons/shopping-cart.png" alt="" class="img">Thêm
							vào giỏ hàng</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>