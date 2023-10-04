<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DPYP
 */
global $wp_query;
get_header();
?>
	
    <main class="page-content video" id="page-content">

        <?php get_template_part('component/menu-header', 'video'); ?>
        
        <div id="video-category" class="video-category">
            <div class="container">
                <div class="row">

                	<?php get_sidebar('video'); ?>

                    <div id="video-main" class="col-sm-9">
	                    <h1 class="title-child-cat">
	                        <?php echo get_queried_object()->name; ?>
	                    </h1>
                        <div class="row">

		                    <?php if ( have_posts() ) : ?>
			                    	<?php
									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										echo '<div class="col-xs-6 col-sm-4 post video-item">';
										
										get_template_part( 'template-parts/content', 'video' );

										echo '</div>';

										?>
				                    <?php endwhile; ?>

			                        <?php
			                        if (  $wp_query->max_num_pages > 1 ) echo '<div class="col-12 btn-loadmore loadmore-video text-center"><a href="">Xem thêm</a></div>';
			                        ?>

			                <?php
			            	else :

			                	get_template_part( 'template-parts/content', 'none' ); ?>

		                    <?php endif; ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();
