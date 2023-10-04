<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'dpyp' ), '<h1 class="title-page">' . get_search_query() . '</h1>' );
					?>

                    <?php if ( have_posts() ) : ?>

	                    <div class="list-post-cat">
	                    	<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								
								get_template_part( 'template-parts/content', 'search' );

								?>
		                    <?php endwhile; ?>

	                    </div>

	                    <?php
	                    theme_theme_pagination();
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

<?php
get_footer();
