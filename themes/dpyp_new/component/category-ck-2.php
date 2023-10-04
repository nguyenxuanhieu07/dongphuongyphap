<div class="child-cat-2 child-cat widget">
    <div class="widget-header">
        <h2 class="widget-title title-child-cat">
            <a href="<?php echo $child_cat_link; ?>"><?php echo $child_cat->name; ?></a>
        </h2>
        <a href="<?php echo $child_cat_link; ?>" class="view-all">Xem thêm<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
    </div>
    <div class="widget-content">
        <div class="row">
            <?php $arr_post = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'order' => 'date',
                'orderby' => 'desc',
                'category__in' => array($child_cat->term_id),
                'posts_per_page' => 3,
            );
            $list_post = new WP_Query($arr_post);
            $post_count = $list_post->post_count;
            if( $list_post -> have_posts() ): while( $list_post -> have_posts() ): $list_post->the_post();
                ?>
                <div class="col-md-4 post">
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                        <?php the_post_thumbnail('thumbnail') ?>
                    </a>
                    <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="post-content">
                        <?php echo theme_short_content(25); ?>
                    </p>
                </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
</div>