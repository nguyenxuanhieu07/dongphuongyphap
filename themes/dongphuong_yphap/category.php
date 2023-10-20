<?php
get_header();
?>
<main class="archive-health">
	<?php get_template_part("components/breadcrumd"); ?>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<?php
				$category         = get_queried_object();
				$child_categories = get_categories(
					array(
						'parent' => $category->term_id,
					)
				);
				?>
				<div class="col-md-8">
					<h1 class="page-title">
						<?php echo $category->name; ?>
					</h1>
					<?php
					if (!empty($child_categories)) {
						foreach ($child_categories as $key => $value) {
							?>
							<div class="page-action">
								<h2 class="archive-title"><a href="<?php echo get_category_link($value->term_id); ?>">
										<?php echo $value->name; ?>
									</a></h2>
								<a href="<?php echo get_category_link($value->term_id); ?>" class="archive-more">Xem nhiều hơn
									<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
							</div>
							<div class="row archive-list-product">
								<?php
								$args_post = array(
									'post_type'      => 'post',
									'posts_per_page' => 4,
									'post_status'    => 'publish',
									'tax_query'      => array(
										array(
											'taxonomy' => 'category',
											'field'    => 'id',
											'terms'    => array($value->term_id),
										)
									)
								);
								$list_post = new WP_Query($args_post);
								if ($list_post->have_posts()):
									$i    = 1;
									$args = array(
										'hide_content' => true,
										'class'        => 'post-small',
										'short_title'  => 14
									);
									while ($list_post->have_posts()):
										$list_post->the_post();
										if ($i == 1) {
											?>
											<div class="col-md-6">
												<?php
												get_template_part("components/post");
												?>
											</div>
											<div class="col-md-6">
												<?php
										} elseif ($i > 1 && $i < $list_post->found_posts) {
											get_template_part("components/post", '', $args);
										} else {
											get_template_part("components/post", '', $args);
											?>
											</div>
											<?php
										}
										$i++;
									endwhile;
								endif;
								wp_reset_postdata();
								?>
							</div>
							<?php
						}
					} else {
						?>
						<div class="list-post-news">
							<?php
							$args_post = array(
								'post_type'      => 'post',
								'post_status'    => 'publish',
								'tax_query'      => array(
									array(
										'taxonomy' => 'category',
										'field'    => 'id',
										'terms'    => array($category->term_id),
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
						<?php
					}
					?>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>