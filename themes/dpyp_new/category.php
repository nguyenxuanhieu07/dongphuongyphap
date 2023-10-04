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
$chuyen_khoa = rwmb_meta( 'chuyen_khoa_theme', array( 'object_type' => 'term' ), get_queried_object()->term_id );
?>

<?php if( $chuyen_khoa == 1 ): get_template_part( 'chuyen-khoa' ); else: ?>
	
    <main class="page-content" id="page-content">
        <div class="container">
            
            <?php get_template_part("template-parts/content" , "breadcrumb"); ?>
            
            <div class="row">
                <div class="col-md-9">
                    <h1 class="title-child-cat">
                        <?php echo get_queried_object()->name; ?>
                    </h1>
                    <?php if ( have_posts() ) : ?>

	                    <div class="list-post-cat">
	                    	<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								
								get_template_part( 'template-parts/content', 'post' );

								?>
		                    <?php endwhile; ?>

	                    </div>

	                    <?php
	                    if (  $wp_query->max_num_pages > 1 ) echo '<div class="btn-loadmore loadmore-post-cat text-center"><a href="">Xem thêm</a></div>';
	                    ?>

	                <?php
	            	else :

	                	get_template_part( 'template-parts/content', 'none' ); ?>

                    <?php endif; ?>

                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </main>

<?php endif; ?>

<?php
get_footer();
