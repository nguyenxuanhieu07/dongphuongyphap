<div class="single-post-meta row align-items-center mt-3">
    <div class="col-md-6 mr-auto align-items-center"><span style="font-style: italic; color: #535353;">Cập nhật lúc: <?php echo get_post_modified_time(' g:i A , d/m/Y'); ?></span></div>
    <div class="ml-auto col-md-6">
        <ul class="socical-share">
            <li class="">
                <a target="_blank" rel="noopener" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="facebook">
                    <i class="fa fa-facebook" aria-hidden="true"></i> share facebook
                </a>
            </li>
            <li class="">
                <a target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?status='<?php the_permalink(); ?>" class="twitter">
                    <i class="fa fa-twitter" aria-hidden="true"></i> share twitter
                </a>
            </li>
            <li class="">
                <a target="_blank" rel="noopener" href="https://pinterest.com/pin/create/button?url=<?php the_permalink(); ?>&amp;description=<?php the_title(); ?>" class="pinterest">
                <i class="fa fa-pinterest" aria-hidden="true"></i> share pinterest
            </a>
        </li>
    </ul>
    <div class="review">
        <?php
        if(function_exists('kk_star_ratings')){
            echo kk_star_ratings();
        }
        ?>
    </div>
</div>
</div>