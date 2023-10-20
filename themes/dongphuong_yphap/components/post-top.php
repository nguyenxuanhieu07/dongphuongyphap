<div class="top-post">
	<h2 class="archive-title">Tin Nổi Bật</h2>
	<div class="list-top-post">
		<?php
		$args_post = array(
			'post_type'      => 'post',
			'posts_per_page' => 5,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		$list_post = new WP_Query($args_post);
		if ($list_post->have_posts()):
			while ($list_post->have_posts()):
				$list_post->the_post();
				$args = array('hide_content' => true);
				get_template_part("components/post",'',$args);
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>