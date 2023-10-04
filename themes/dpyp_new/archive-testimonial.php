<?php
/**
 * The template for displaying archive pages
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
            
            <h1 class="title-page">
                Cảm nhận khách hàng
            </h1>

            <?php get_template_part("template-parts/testimonial/header" , "video"); ?>

            <div class="row">
                <div class="col-md-9">

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


<?php
get_footer();
