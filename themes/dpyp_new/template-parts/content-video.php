<article id='video-<?php echo get_the_ID(); ?>'>
    <figure class="post-thumbnail">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
            <span class="icon">
                <i class="fa fa-play" aria-hidden="true"></i>
            </span>
        </a>
    </figure>
    <h3 class="post-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h3>
</article>