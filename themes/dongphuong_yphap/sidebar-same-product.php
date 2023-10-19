<?php
$product_id = get_the_ID();
$terms      = get_the_terms($product_id, 'product_cat');
$term_id = $terms ? $terms[0]->term_id : '';
if($term_id):
$args_post = array(
	'post_type' => 'product',
	'posts_per_page' => 5,
	'post_status' => 'publish',
	'post__not_in'   => array($product_id),
	'tax_query' => array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'id',
			'terms'    => array($term_id),
		)
	)
);
$list_post  = new WP_Query($args_post);
?>
<div class="product-same">
	<h3 class="product-same-title">Sản phẩm tương tự</h3>
	<div class="entry-same">
		<?php
		if ($list_post->have_posts()):
			while ($list_post->have_posts()):
				$list_post->the_post();
				get_template_part("components/product", "same");
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div>
</div
<?php 
endif;