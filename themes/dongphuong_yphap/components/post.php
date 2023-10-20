<?php 
	$class = $args['class'] ? $args['class'] :'';
	$short_title = $args['short_title'] ? $args['short_title'] : 25;
?>
<div class="post <?php echo $class; ?>">
	<a href="<?php echo get_the_permalink(); ?>" class="post-thumbnail">
		<?php echo get_the_post_thumbnail(); ?>
	</a>
	<div class="post-info">
		<h3 class="post-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo theme_short_title($short_title); ?></a></h3>
		<?php
			if(!isset($args['hide_content'])){
		?>
		<p class="post-desc"><?php echo theme_short_content('',35); ?></p>
		<?php } ?>
	</div>
</div>