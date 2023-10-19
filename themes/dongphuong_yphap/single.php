<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dongphuong_yphap
 */

get_header();
$check_content = rwmb_meta('post_enable_structure') ? rwmb_meta('post_enable_structure') : '';
if ($check_content):
	while (have_posts()):
		the_post();

		get_template_part('template-parts/single', 'post-new');

	endwhile;
else:
	?>
	<main class="page-content" id="page-content">
		<div class="container">

			<?php get_template_part("template-parts/content", "breadcrumb"); ?>

			<div class="row">
				<div class="col-md-9">

					<?php
					while (have_posts()):
						the_post();

						get_template_part('template-parts/content', 'single-post'); ?>

					<?php endwhile; ?>

				</div>

				<?php get_sidebar(); ?>

			</div>
		</div>
	</main>

	<?php
endif;
get_footer();
