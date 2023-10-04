<div class="post post-cat">
	<a href="<?php the_permalink(); ?>" class="post-thumbnail">
		<?php the_post_thumbnail('thumbnail'); ?>
	</a>
	<h3 class="post-title">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
	<div class="post-excerpt">
		<?php echo theme_short_content(25); ?>
	</div>
</div>