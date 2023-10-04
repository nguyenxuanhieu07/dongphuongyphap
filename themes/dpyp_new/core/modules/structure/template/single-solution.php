<?php get_header(); ?>
<main id="page-content" class="page-content main-content">
	<div class="container single-container">
		<div class="row">
			<div class="col-md-8 order-md-1 order-1">
				<div class="breadcrumb-nav ">
					<?php 
					get_template_part('template-parts/content', 'breadcrumb' );
					?>
				</div>
				<?php
				while ( have_posts() ) :
					the_post();
					$post_id  = get_the_ID();
					wb_set_post_view(get_the_ID());
					wb_set_post_score(get_the_ID());
					wb_process_score($post_id);
					?>
					<h1 class="single-post-title">
						<?php the_title(); ?>
					</h1>
					<!--Post Content-->
					<div class="entry entry-content">
						<?php  the_content(); ?>
						<?php 
						$group_content = rwmb_meta('structure-content-group');
						if(!empty($group_content)){
							foreach ($group_content as $content) {
								if(isset($content['entry-title'])){
									echo "<h2  class='entry-title'>".$content['entry-title']."</h2>";
								}
								if(isset($content['entry-content'])){
									echo "<div  class='entry-content entry-content-section'>".do_shortcode( wpautop( $content['entry-content'] ) )."</div>";
								}
							}
						}
						?>
					</div>
					<?php get_template_part('template-parts/content', 'meta-2'); ?>
					<!---End post content-->

					<?php
					$current_post_id = get_the_ID();
					$comment_number  = get_comments_number( $current_post_id);
					if($comment_number >= 10){
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					if($comment_number < 10){
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>
					<?php 
				endwhile; 
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>