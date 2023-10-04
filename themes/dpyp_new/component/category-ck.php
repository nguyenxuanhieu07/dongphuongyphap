<?php $arr_post = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'order' => 'date',
    'orderby' => 'desc',
    'category__in' => get_queried_object()->term_id,
    'posts_per_page' => 8,
);
$i = 0;
$list_post = new WP_Query($arr_post);
$post_count = $list_post->post_count;
if( $list_post -> have_posts() ): ?>
    <div class="row">
        <?php while( $list_post -> have_posts() ): $list_post->the_post(); $i ++;
        ?>
        <?php if( $i == 1 ){ ?>

            <div class="col-md-5 post big-post">
                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                    <?php the_post_thumbnail('medium') ?>
                </a>
                <h3 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="post-content">
                    <?php echo theme_short_content(25); ?>
                </p>
            </div>

        <?php }elseif( $i >= 2 && $i <= 4 ){ ?>
            <?php if( $i == 2 ) echo '<div class="col-md-4">'; ?>

            <div class="post small-post">
                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                    <?php the_post_thumbnail('thumbnail') ?>
                </a>
                <h3 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php echo theme_short_title(15); ?></a>
                </h3>
            </div>

            <?php if( $i == 4 ) echo '</div>'; ?>
        <?php }else{ ?>
            <?php if( $i == 5 ) echo '<div class="col-md-3"><ul>'; ?>

                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

            <?php if( $i == $post_count ) echo '</ul></div>'; ?>
        <?php } ?>

        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>