<?php $id_cat_2 = 20; ?>
<section id="section-3">
    <div class="container">
        <div class="inner">
            <h2 class="title-sec">
                <span>
                    <?php echo get_term($id_cat_2 , 'videocat')->name; ?>
                </span>
            </h2>
            <div class="row">
                <div class="col-md-2 s3-menu">
                    <ul class="category-video-menu">
                        <li class="active">
                            <a href="<?php echo get_term_link($id_cat_2 , 'videocat'); ?>">
                                Xem tất cả
                            </a>
                        </li>
                        <?php
                        $parent_cat_arg = array('hide_empty' => false, 'parent' => $id_cat_2 );
                        $parent_cat = get_terms('videocat',$parent_cat_arg);
                        foreach ($parent_cat as $catVal) {
                            echo '<li><a href="' . get_term_link($catVal->term_id , 'videocat') . '">' . $catVal->name . '</a></li>';
                        }
                        ?>

                    </ul>
                    <div class="clearfix"></div>
                </div><!-- /Menu -->
                <div class="col-md-10 s3-main">
                    <div class="row">
                        <?php 
                            $args_cat = array( 
                                'post_type'         => 'video',
                                'posts_per_page'    => 6,
                                'orderby'           => 'date',
                                'order'             =>'DESC',
                                'tax_query'         => array(
                                    array(
                                        'taxonomy'  => 'videocat',
                                        'field'     => 'id',
                                        'terms'     => array($id_cat_2),
                                    )
                                ),
                            );
                            $cat_post = new WP_Query( $args_cat );
                            if ( $cat_post->have_posts() ) :
                                while( $cat_post->have_posts() ) : $cat_post->the_post();
                            ?>
                            <div class="col-sm-4 post item video-item">

                                <?php get_template_part('template-parts/content' , 'video'); ?>
                                
                            </div><!-- /Item -->
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div><!-- /Row --> 
                    <div class="view-more">
                        <a href="<?php echo get_term_link($id_cat_2 , 'videocat'); ?>" class="btnViewMore">Xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div><!-- /Main -->
            </div><!-- /Row -->
        </div><!-- /Inner -->
    </div>
</section><!-- /Section 3 -->