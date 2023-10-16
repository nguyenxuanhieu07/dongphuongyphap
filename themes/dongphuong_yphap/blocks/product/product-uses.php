<?php
$product_uses = rwmb_meta('product-uses') ? rwmb_meta('product-uses') : '';
if ($product_uses):
	?>
	<div class="product-uses">
		<h2 class="archive-title">Công dụng</h2>
		<ul class="list-uses">
			<?php
			foreach ($product_uses as $key => $value) {
				?>
				<li class="item"><?php echo $value['product-uses']; ?></li>
			<?php } ?>
		</ul>
	</div>
	<img src="<?php echo THEME_URI; ?>/images/product/img-product-2.png" alt="" class="img-uses">
<?php endif; ?>