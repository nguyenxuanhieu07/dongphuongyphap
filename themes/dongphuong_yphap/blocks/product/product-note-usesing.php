<?php
$usesing_title   = rwmb_meta('note-usesing-title') ? rwmb_meta('note-usesing-title') : '';
$usesing_content = rwmb_meta('note-usesing-content') ? rwmb_meta('note-usesing-content') : '';
?>
<h2 class="archive-title">
	<?php echo $usesing_title; ?>
</h2>
<div class="product-using">
	<?php
	echo $usesing_content;
	?>
</div>