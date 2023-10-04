<section class="home-mix">
    <div class="container">
        <div class="row">
            <div class="col-md-6 category-1">
                <h2 class="title-home">
                    <a href="/kien-thuc-benh">Kiến thức bệnh</a>
                </h2>
                <div class="row">
                    <?php
                    $agrs =  array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'orderby' =>'date',
                        'order'    => 'DESC',
                        'tax_query'     => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => array('thuat-ngu', 'huyet-dao', 'tin-tuc-hoat-dong', 'tin-y-te', 'gioi-thieu', 'dich-vu'),
                                'include_children' => true,
                                'operator' => 'NOT IN'
                            ),
                        ),
                    );
                    $news_posts = new WP_Query( $agrs );
                    $post_count = $news_posts->post_count;
                    if ( $news_posts->have_posts() ) :
                        while ( $news_posts->have_posts() ) : $news_posts->the_post(); ?>
                            <div class="col-md-6 post">
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <?php the_post_thumbnail('thumbnail') ?>
                                </a>
                                <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                            </div>
                        <?php endwhile;
                    endif; wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="col-md-6 category-1">
                <h2 class="title-home">
                    <a href="/tra-cuu">
                        Thuật ngữ - tra cứu
                    </a>
                </h2>
                <div class="row">
                    <?php
                    $agrs =  array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'orderby' =>'date',
                        'order'    => 'DESC',
                        'tax_query'     => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => array('thuat-ngu', 'tra-cuu', 'huye-dao'),
                                'include_children' => true,
                            ),
                        ),
                    );
                    $news_posts = new WP_Query( $agrs );
                    $post_count = $news_posts->post_count;
                    if ( $news_posts->have_posts() ) :
                        while ( $news_posts->have_posts() ) : $news_posts->the_post(); ?>
                            <div class="col-md-6 post">
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <?php the_post_thumbnail('thumbnail') ?>
                                </a>
                                <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                            </div>
                        <?php endwhile;
                    endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>