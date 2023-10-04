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

    <main class="page-content doctor" id="page-content">
        <div class="container">
            
            <h1 class="title-page line-center">
                Đội ngũ bác sĩ
            </h1>

            <?php get_template_part("template-parts/content" , "breadcrumb"); ?>

            <div class="doctor-archive">
                <div class="row">

                    <?php if ( have_posts() ) : ?>

                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();
                            
                            echo '<div class="col-md-3 col-sm-6">';

                                get_template_part( 'template-parts/content', 'doctor' );

                            echo '</div>';

                            ?>
                        <?php endwhile; ?>

                        <?php
                        if (  $wp_query->max_num_pages > 1 ) echo '<div class="col-12 btn-loadmore loadmore-bacsi text-center"><a href="">Xem thêm</a></div>';
                        ?>

                    <?php
                    else :

                        echo '<div class="col-12">';

                        get_template_part( 'template-parts/content', 'none' );

                        echo '</div>';

                    endif; ?>
                </div>

            </div>

        </div>
    </main>


<?php
get_footer();
