<?php
get_header();
?>
<main class="archive-products">
	<?php get_template_part("components/breadcrumd"); ?>
	<?php get_template_part("components/banner","top"); ?>
	<?php
	$terms = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
			'parent'     => 0
		)
	);
	?>
	<section class="page-content">
		<div class="container">
			<?php
			foreach ($terms as $key => $value) {
				$name = $value->name;
				$link = get_term_link($value->slug, 'product_cat');
				?>
				<div class="page-action">
					<h2 class="archive-title"><a href="<?php echo $link; ?>">
							<?php echo $name; ?>
						</a></h2>
					<a href="<?php echo $link; ?>" class="archive-more">Xem nhiều hơn <i class="fa fa-angle-double-right"
							aria-hidden="true"></i></a>
				</div>
				<div class="row list-products">
					<?php
					$args      = array(
						'post_type'      => 'product',
						'post_status'    => 'publish',
						'posts_per_page' => 4,
						'order'          => 'desc',
						'tax_query'      => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'id',
								'terms'    => $value->term_id,
							)
						),
					);
					$list_post = new WP_Query($args);
					if ($list_post->have_posts()) {
						while ($list_post->have_posts()):
							$list_post->the_post();
							?>
							<div class="col-md-3">
								<?php get_template_part("components/post","product"); ?>
							</div>
							<?php
						endwhile;
					}
					?>
				</div>
			<?php } ?>
	
		</div>
	</section>
</main>
<?php
get_footer();