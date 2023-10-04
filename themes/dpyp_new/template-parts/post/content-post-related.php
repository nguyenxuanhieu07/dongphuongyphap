<?php 
$post_id = get_the_ID();
$cats = wp_get_post_terms( $post_id, 'category' ); 
$cats_ids = array();
if( function_exists('yoast_get_primary_term_id') ){
    $cats_ids[] = yoast_get_primary_term_id( 'category',get_the_ID() );
}else{
    foreach( $cats as $wpex_related_cat ) {
        $cats_ids[] = $wpex_related_cat->term_id;
    }
}
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 6, 
    'post__not_in'   => array( $post_id ), 
    'orderby'        => 'rand',
    'tax_query' => array(
        array( 'taxonomy'    => 'category' , 'field' => 'id' , 'terms' => $cats_ids),
    ),
);
$list_related_post = new WP_Query($args);

if($list_related_post->have_posts()) : ?>
    <div class="related-post">
        <p class="related-title">TIN LIÊN QUAN</p>
        <div class="row">

            <?php while ($list_related_post->have_posts() ) : $list_related_post->the_post(); ?>

                <div class="col-md-4 col-sm-6 post post-related">
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                    <span class="h3 post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </span>
                </div>

            <?php endwhile; ?>
            
        </div>
    </div>
    <?php
endif;
wp_reset_postdata();
?>