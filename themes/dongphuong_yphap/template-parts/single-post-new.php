<main class="single-detail">
	<?php get_template_part("components/breadcrumd"); ?>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1 class="page-title"><?php  echo get_the_title(); ?></h1>
					<?php get_template_part("components/box",'top-post'); ?>
					<?php
					$post_group_content = rwmb_meta('post-group-content') ? rwmb_meta('post-group-content') : [];
					foreach ($post_group_content as $key => $value) {
					?>
					<h2 class="archive-title"><?php echo $value['post-title']; ?></h2>
					<div class="entry">
						<?php echo $value['post-content']; ?>
					</div>
					<?php } ?>
					<h2 class="archive-title">Bình Luận</h2>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()):
						comments_template();
					endif;
					?>
				</div>
				<div class="col-md-4">
					<?php get_sidebar('doctor'); ?>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
</main>