<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DPYP
 */

get_header();
?>

    <main class="page-content" id="page-content">
        <div class="container">
            
            <?php get_template_part("template-parts/content" , "breadcrumb"); ?>
            
            <div class="row">
                <div class="col-md-9">

                	<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'single-post' ); ?>

	            	<?php endwhile; ?>

                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </main>

<?php
get_footer();
