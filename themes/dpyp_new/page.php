<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

						get_template_part( 'template-parts/content', 'page' ); ?>

	            	<?php endwhile; ?>

                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </main>

<?php
get_footer();
