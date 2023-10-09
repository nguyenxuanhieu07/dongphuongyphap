<?php
get_header();
?>
<main class="single-doctor">
	<?php get_template_part("component/breadcrumd"); ?>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php get_template_part("author/box", "author"); ?>
					<?php get_template_part("author/content", "author"); ?>
					<?php get_template_part("author/post", "author"); ?>
				</div>
				<div class="col-md-4">
					<?php echo get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();