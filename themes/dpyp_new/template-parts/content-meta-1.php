<div class="single-post-meta row align-items-center">
    <div class="col-md-6 mr-auto align-items-center">
        <div class="avartar">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 50); ?>
        </div>
        <?php 
        $author_id = get_post_field ('post_author', get_the_ID());
        $display_name = get_the_author_meta( 'display_name' , $author_id ); 
        ?>
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="author-link" rel="author">
            <?php echo $display_name; ?>
        </a>
        <span class="update-time"><?php echo get_the_date(' g:i A , d/m/Y'); ?></span>

    </div>
    <div class="col-md-6">
        <ul class="socical-share">
            <li class="">
                <a rel="noopener" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="facebook">
                    <i class="fa fa-facebook" aria-hidden="true"></i> share facebook
                </a>
            </li>
            <li class="">
                <a target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?status=<?php the_permalink(); ?>" class="twitter">
                    <i class="fa fa-twitter" aria-hidden="true"></i> share twitter
                </a>
            </li>
            <li class="">
                <a target="_blank" rel="noopener" href="https://pinterest.com/pin/create/button?url=<?php the_permalink(); ?>&amp;description=<?php the_title(); ?>"class="pinterest">
                    <i class="fa fa-pinterest" aria-hidden="true"></i> share pinterest
                </a>
            </li>
        </ul>
    </div>
</div>