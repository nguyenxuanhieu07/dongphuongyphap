<?php
$uses_object     = rwmb_meta('product-uses-object') ? rwmb_meta('product-uses-object') : '';
$not_uses_object = rwmb_meta('product-not-uses-object') ? rwmb_meta('product-not-uses-object') : '';

?>
<h2 class="archive-title">Đối Tượng Sử Dụng</h2>
<div class="product-object">
	<div class="object-item uses-object">
		<h3 class="title-object">Đối tượng <span class="title-child">Nên sử
				dụng</span></h3>
		<ul class="list-object">
			<?php
			foreach ($uses_object as $key => $value) {
				?>
				<li class="item">
					<?php echo $value['product-uses-object']; ?>
				</li>
				<?php
			}
			?>
		</ul>
	</div>
	<div class="object-item not-uses-object">
		<h3 class="title-object">Đối tượng <span class="title-child">Nên sử
				dụng</span></h3>
		<ul class="list-object">
			<?php
			foreach ($not_uses_object as $key => $value) {
				?>
				<li class="item">
					<?php echo $value['product-not-uses-object']; ?>
				</li>
				<?php
			}
			?>
		</ul>
	</div>
</div>
<div class="box-list">
	<div class="item-top">
		<img src="<?php echo THEME_URI; ?>/images/product/advide-1.png" alt="" class="item-imge">
	</div>
	<div class="list-adive-bottom">
		<div class="inner">
			<img src="<?php echo THEME_URI; ?>/images/product/advide-1.png" alt="" class="item-imge">
		</div>
		<div class="inner">
			<img src="<?php echo THEME_URI; ?>/images/product/advide-2.png" alt="" class="item-imge">
		</div>
		<div class="inner">
			<img src="<?php echo THEME_URI; ?>/images/product/advide-3.png" alt="" class="item-imge">
		</div>
		<div class="inner">
			<img src="<?php echo THEME_URI; ?>/images/product/advide-2.png" alt="" class="item-imge">
		</div>
		<div class="inner">
			<img src="<?php echo THEME_URI; ?>/images/product/advide-1.png" alt="" class="item-imge">
		</div>
	</div>
</div>