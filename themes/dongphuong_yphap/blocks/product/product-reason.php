<?php
$product_reason_title = rwmb_meta('product-reason-title') ? rwmb_meta('product-reason-title') : '';
$product_reason       = rwmb_meta('product-reason-group') ? rwmb_meta('product-reason-group') : [];
?>
<div class="product-reason">
	<h2 class="archive-title">
		<?php echo $product_reason_title; ?>
	</h2>
	<ul class="list-reason">
		<?php
		foreach ($product_reason as $key => $value) {
			?>
			<li class="item"><span class="item-number"><?php echo $key+1; ?></span><?php echo $value['product-reason-content']; ?></li>
			<?php
		}
		?>
	</ul>
</div>