<?php
$arr_post = array(
    'post_type' => 'video',
    'post_status' => 'publish',
    'order' => 'date',
    'orderby' => 'desc',
    'posts_per_page' => 5,
    'meta_query' => array(
        array(
            'key'       => '_cmb_featured_video_testimonial',
            'value'     => '1',
            'compare'   => '=='
        )
    ),
);
$i = 0;
$list_post = new WP_Query($arr_post);
$post_count = $list_post->post_count;
if( $list_post -> have_posts() ): ?>

    <div class="full-video-kh">
        <div class="row align-items-center">
            <?php while( $list_post -> have_posts() ): $list_post->the_post(); $i ++;
            ?>

            <?php if( $i == 1 ){ ?>
                <div class="col-md-7">
                    <div class="post big-video">
                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php echo theme_short_title(20); ?></a>
                        </h2>
                    </div>
                </div>
            <?php }else{ ?>
                <?php if( $i == 2 ) echo '<div class="col-md-5">'; ?>

                    <div class="small-video post">
                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php echo theme_short_title(20); ?></a>
                        </h3>
                    </div>

                <?php if( $i == $post_count ) echo '</div>'; ?>
            <?php } ?>

            <?php endwhile; ?>
        </div>
    </div>

<?php endif; wp_reset_postdata(); ?>