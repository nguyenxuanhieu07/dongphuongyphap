<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package DPYP
 */

get_header();
?>

    <main class="page-content" id="page-content">
        <div class="container">
            <section class="error-404">
                <img src="<?php echo THEME_URI; ?>/images/image-404.jpg" alt="" />
                <p class="text-center">Lỗi 404!!! Không tìm thấy trang bạn yêu cầu</p>
                <div class="text-center">
                    <form class="search-form-page" action="/" method="GET">
                        <fieldset class="form-group">
                            <input name="s" class="form-control" placeholder="Từ khóa" type="text" />
                            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
                        </fieldset>
                    </form>
                </div>
                <p class="text-center"><a class="back-to-home" href="/">Về trang chủ</a></p>
            </section>
            <div class="col-md-8 offset-md-2 mb-4">
                <div class="widget widget_recent_entries">
                    <h2 class="widget-title">Bài viết mới</h2>
                    <ul>
                        <?php 
                        $args = array(
                            'post_type'   => 'post',
                            'post_status'   => 'publish',
                            'posts_per_page' => 6,
                            'orderby'       => 'date',
                            'order'         => 'desc',
                        );
                        $list_post_news = new WP_Query( $args );
                        if( $list_post_news -> have_posts() ) : while( $list_post_news -> have_posts() ) : $list_post_news -> the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                                <span class="post-date" style="color: #444; font-size: 14px; font-style: italic;"> ( <?php echo get_the_time('d/m/Y'); ?> )</span>
                            </li>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
            
        </div>
    </main>

<?php
get_footer();
