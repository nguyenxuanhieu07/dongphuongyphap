<?php
$product_name = rwmb_meta('product-name') ? rwmb_meta('product-name') : get_the_title();
$options      = get_option('option_pages');
$page_id      = isset($options['page-cart']) ? $options['page-cart'] : 0;
if ($page_id) {
	$link_checkout = get_page_link($page_id);
}
?>
<div class="container">
	<div class="notification">
		<span>Bạn đã thêm sản phẩm "
			<b>
				<?php echo $product_name; ?>
			</b>" vào giỏ hàng của mình.
		</span>
		<a href="<?php echo $link_checkout; ?>" class="view-cart">Xem giỏ hàng</a>
	</div>
</div>