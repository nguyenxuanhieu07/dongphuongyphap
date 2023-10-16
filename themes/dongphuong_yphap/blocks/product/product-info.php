<?php
$product_name        = $args['product_name'];
$product_desc        = $args['product_desc'];
$product_information = rwmb_meta('product-information') ? rwmb_meta('product-information') : '';
$product_content     = rwmb_meta('product-information-content') ? rwmb_meta('product-information-content') : '';
?>
<h2 class="title-product">
	<?php echo $product_name; ?>
</h2>
<div class="product-desc">
	<?php echo $product_desc; ?>
</div>
<h2 class="archive-title">Thông Tin Tổng Quan</h2>
<div class="product-details">
	<?php
	if ($product_information):
		?>
		<table class="table-detail">
			<?php
			foreach ($product_information as $key => $value) {
				?>
				<tr>
					<td>
						<?php echo $value['information-title']; ?>
					</td>
					<td>
						<?php echo $value['information-content']; ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	<?php endif; ?>
	<?php echo $product_content; ?>
</div>