<h1 class="heading-title-single"><?php the_title(); ?></h1>

<?php get_template_part("template-parts/content" , "meta-1"); ?>

<div class="content-post position-relative d-flex flex-wrap">
	<div class="inner-content-single">
		<div class="entry-content entry">
			<?php the_content(); ?>
		</div>                                
	</div>
</div>

<?php get_template_part("template-parts/content" , "meta-2"); ?>

<?php
if ( comments_open() || get_comments_number() ) {
	comments_template();
}
?>