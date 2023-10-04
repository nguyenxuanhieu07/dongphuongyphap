<section class="home-news home-mix">
    <div class="container">
        <div class="row">
            <div class="col-md-6 category-2">
                <h2 class="title-home">
                    <a href="/tin-tuc-hoat-dong">Tin hoạt động</a>
                </h2>
                <div class="row">
                    <?php
                    $agrs =  array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'orderby' =>'date',
                        'order'    => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy'  => 'category',
                                'field'     => 'slug',
                                'terms'     => array('tin-tuc-hoat-dong')
                            )
                        ),
                    );
                    $news_posts = new WP_Query( $agrs );
                    $post_count = $news_posts->post_count;
                    if ( $news_posts->have_posts() ) :
                        while ( $news_posts->have_posts() ) : $news_posts->the_post(); ?>
                            <div class="col-12">
                                <div class="post">
                                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                        <?php the_post_thumbnail('thumbnail') ?>
                                    </a>
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php echo theme_short_title(15); ?></a>
                                    </h3>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="col-md-6 category-2">
                <h2 class="title-home">
                    <a href="/tin-y-te">Tin tức Y Tế</a>
                </h2>
                <div class="row">
                    <?php
                    $agrs =  array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'orderby' =>'date',
                        'order'    => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy'  => 'category',
                                'field'     => 'slug',
                                'terms'     => array('tin-y-te')
                            )
                        ),
                    );
                    $news_posts = new WP_Query( $agrs );
                    $post_count = $news_posts->post_count;
                    if ( $news_posts->have_posts() ) :
                        while ( $news_posts->have_posts() ) : $news_posts->the_post(); ?>
                            <div class="col-12">
                                <div class="post">
                                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                        <?php the_post_thumbnail('thumbnail') ?>
                                    </a>
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php echo theme_short_title(15); ?></a>
                                    </h3>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>