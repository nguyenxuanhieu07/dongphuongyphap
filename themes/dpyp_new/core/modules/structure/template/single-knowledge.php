<?php get_header(); ?>
<main id="page-content" class="page-content main-content">
	<div class="container single-container">
		<div class="row">
			<div class="col-md-8 order-md-1 order-1">
				<?php
				while ( have_posts() ) :
					the_post();
					$post_id  = get_the_ID();
					wb_set_post_view(get_the_ID());
					wb_set_post_score(get_the_ID());
					wb_process_score($post_id);
					?>
					<div class="archive-header">                        
						<?php get_template_part('template-parts/content','breadcrumb'); ?>
						<?php
						$enable_ads_top_post = rwmb_meta('enable_ads_top_post');
						if($enable_ads_top_post == ''){
							$enable_ads_top_post = true;
						}
						if($enable_ads_top_post){
							if(shortcode_exists('ads_top_post')){
								echo do_shortcode('[ads_top_post]');
							}
						}
						?>
						<h1 class="heading-title"><?php the_title(); ?></h1>
					</div>
					<!--Post Content-->
					<div class="entry entry-content">
						<?php the_content(); ?>
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
						<?php
						$enable_ads_after_post = rwmb_meta('enable_ads_after_post');
						if($enable_ads_after_post == ''){
							$enable_ads_after_post = true;
						}
						if($enable_ads_after_post){
							if(shortcode_exists('ads_after_post')){
								echo do_shortcode('[ads_after_post]');
							}
						}

						$enable_video_after_post = rwmb_meta('enable_video_after_post');
						if($enable_video_after_post == ''){
							$enable_video_after_post = true;
						}
						if($enable_video_after_post){
							if(shortcode_exists('video_after_content')){
								echo do_shortcode('[video_after_content]');
							}
						}
						?>
						<?php
						$disable_post_related = rwmb_meta('disable_post_related');
						$current_post_id = get_the_ID();
						$comment_number  = get_comments_number( $current_post_id);
						if($comment_number > 5){
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
							if($disable_post_related != 1){
								get_template_part('template-parts/content' , 'related');
							}

						}else{
							if($disable_post_related != 1){
								get_template_part('template-parts/content' , 'related');
							}
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
