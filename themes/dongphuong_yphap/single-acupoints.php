<?php
get_header();
while (have_posts()):
	the_post();

	get_template_part('template-parts/single', 'post-new');

endwhile;
get_footer();