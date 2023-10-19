<?php
$usesing_title = rwmb_meta('usesing-product-title') ? rwmb_meta('usesing-product-title') : '';
$usesing_content = rwmb_meta('usesing-product-content') ? rwmb_meta('usesing-product-content') : '';
?>
<h2 class="archive-title"><?php echo $usesing_title;  ?></h2>
<div class="product-using">
	<?php 
		echo $usesing_content;
	?>
</div>