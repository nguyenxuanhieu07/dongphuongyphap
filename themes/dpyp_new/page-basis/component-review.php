<?php
$review = rwmb_meta('evaluate-group') ? rwmb_meta('evaluate-group') : '';
?>
<h2 class="archive-title">Đánh Giá</h2>
<div class="list-reviews">
	<?php
	foreach ($review as $key => $value) {
		$url_img = wp_get_attachment_image_url($value['evaluate-images'][0], '');
		?>
		<div class="review">
			<div class="avatar">
				<img src="<?php echo $url_img; ?>" alt="">
			</div>
			<div class="review-content">
				<h3 class="review-name"><?php echo $value['evaluate-name'];  ?></h3>
				<p class="review-desc"><?php echo $value['evaluate-content'] ; ?></p>
			</div>
		</div>
		<?php
	}
	?>
</div>