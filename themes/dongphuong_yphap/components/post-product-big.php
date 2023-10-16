<?php
$product_name  = rwmb_meta('product-name') ? rwmb_meta('product-name') : get_the_title();
$product_price = rwmb_meta('product-price') ? rwmb_meta('product-price') : 0;
$sale_price    = rwmb_meta('product-sale') ? rwmb_meta('product-sale') : 0;
$product_desc  = rwmb_meta('product-desc') ? rwmb_meta('product-desc') : '';
$regular_price = $product_price;
if ($sale_price > 0) {
	$regular_price = $sale_price;
}
$total_buy = get_post_meta(get_the_ID(), 'total-buy', true) ? get_post_meta(get_the_ID(), 'total-buy', true) : rand(10, 100);
?>
<div class="post-product product-big">
	<a href="<?php echo get_the_permalink(); ?>" class="product-image">
		<?php echo get_the_post_thumbnail(); ?>
	</a>
	<div class="product-meta">
		<div class="product-info">
			<h3 class="product-title"><a href="#">
					<?php echo $product_name; ?>
				</a></h3>
			<div class="product-description">
				<?php echo $product_desc; ?>
			</div>
		</div>
		<div class="product-view">
			<div class="product-star">
				<?php
				if (function_exists('kk_star_ratings')):
					echo kk_star_ratings();
				endif;
				?>
			</div>
			<div class="product-price">
				<span class="regular-price">
					<?php echo format_price($regular_price); ?>đ
				</span>
				<?php if ($sale_price > 0): ?>
					<span class="sale-price">
						<?php echo format_price($product_price); ?>đ
					</span>
				<?php endif; ?>
			</div>
			<p class="sell-number"><b>Số lượng bán: </b>
				<?php echo $total_buy; ?> sản phẩm
			</p>
		</div>
		<div class="product-action">
			<a href="<?php echo get_the_permalink(); ?>" class="product-more">Chi tiết</a>
			<a href="#" class="product-cart">
				<img src="<?php echo THEME_URI; ?>/images/icons/shopping-cart2.png" alt="">
			</a>
		</div>
	</div>
</div>