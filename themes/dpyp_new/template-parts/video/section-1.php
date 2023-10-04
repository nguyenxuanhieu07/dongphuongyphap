<section id="section-1">
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation">
                <a href="#tab-video-hot" class="active" aria-controls="all-video" role="tab" data-toggle="tab">
                    <i class="fa fa-fire" aria-hidden="true"></i>
                    Video nổi bật
                </a>
            </li>
            <li role="presentation">
                <a href="#tab-video-top-view" aria-controls="#" role="tab" data-toggle="tab">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    Video xem nhiều
                </a>
            </li>
            <li role="presentation">
                <a href="#tab-video-new" aria-controls="#" role="tab" data-toggle="tab">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    Mới ra mắt
                </a>
            </li>
        </ul>
    </div>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab-video-hot">
            <div class="video-slider">
                <?php 
                $agrs_featured = array(
                    'post_type'         => 'video',
                    'posts_per_page'    => 8,
                    'meta_query'        => array(
                        array(
                            'key'       => '_cmb_featured_video',
                            'value'     => 'on',
                            'compare'   => '==',
                        ),
                    ),
                );
                $featured_video = new WP_Query($agrs_featured);
                if ( $featured_video->have_posts() ) :
                    while( $featured_video->have_posts() ) : $featured_video->the_post();
                ?>
                <div class="item post video-item">

                    <?php get_template_part('template-parts/content' , 'video'); ?>

                </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-video-top-view">
            <div class="video-slider">
                <?php 
                    $args_video_top = array( 
                        'post_type'         => 'video',
                        'posts_per_page'    => 8,
                        'meta_key'          => 'popular_posts',
                        'orderby'           => 'meta_value_num',
                        'order'             =>'DESC'
                    );
                    $popular_video_top = new WP_Query( $args_video_top );
                    if ( $popular_video_top->have_posts() ) :
                        while( $popular_video_top->have_posts() ) : $popular_video_top->the_post();
                    ?>
                    <div class="item post video-item">

                        <?php get_template_part('template-parts/content' , 'video'); ?>
                        
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab-video-new">
            <div class="video-slider">
                <?php 
                $args_video_new = array( 
                    'post_type'         => 'video',
                    'posts_per_page'    => 8,
                    'order'             =>'DESC'
                );
                $new_video = new WP_Query( $args_video_new );
                    if ( $new_video->have_posts() ) :
                        while( $new_video->have_posts() ) : $new_video->the_post();
                    ?>
                    <div class="item post video-item">

                        <?php get_template_part('template-parts/content' , 'video'); ?>
                        
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section><!-- /Section 1 -->