<?php
/**
 * Template name: Tin hoạt động
 */
get_header();
?>
<main class="page-activity-news">
	<?php get_template_part("components/breadcrumd"); ?>
	<section class="page-content">
		<div class="container">
			<h1 class="page-title">
				<?php the_title(); ?>
			</h1>
			<div class="row">
				<div class="col-md-8">
					<?php
					$category = rwmb_meta('news-activity-option') ? rwmb_meta('news-activity-option') : [];
					foreach ($category as $key => $value) {
						$id_category = $value['news-activity-select'];
						$term        = get_term($id_category, 'category');
						?>
						<div class="page-action">
							<h2 class="archive-title"><a href="<?php echo get_category_link($id_category); ?>">
									<?php echo $term->name; ?>
								</a></h2>
							<a href="<?php echo get_category_link($id_category); ?>" class="archive-more">Xem nhiều hơn <i
									class="fa fa-angle-double-right" aria-hidden="true"></i></a>
						</div>
						<div class="list-post-news">
							<?php
							$args_post = array(
								'post_type'      => 'post',
								'posts_per_page' => 3,
								'post_status'    => 'publish',
								'tax_query'      => array(
									array(
										'taxonomy' => 'category',
										'field'    => 'id',
										'terms'    => array($id_category),
									)
								)
							);
							$list_post = new WP_Query($args_post);
							if ($list_post->have_posts()):
								while ($list_post->have_posts()):
									$list_post->the_post();
									get_template_part("components/post");
								endwhile;
							endif;
							wp_reset_postdata();
							?>
						</div>
					<?php } ?>
				</div>
				<div class="col-md-4">
					<?php get_template_part("components/post","top"); ?>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>