<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DPYP
 */

get_header();
?>

    <main class="page-content  video" id="page-content">

        <?php get_template_part('component/menu-header', 'video'); ?>
        
        <div id="video-category" class="video-category">
            <div class="container">
                <div class="row">

                    <?php get_sidebar('video') ?>

                    <div id="video-main" class="col-sm-9">
                        <h1 class="heading-title-single"><?php the_title(); ?></h1>

                        <?php 
                        $post_id            = get_the_ID();
                        $video_youtube_id   =  get_post_meta( $post_id, '_cmb_video_id_youtube', true );
                        $video_iframe       =  get_post_meta( $post_id, '_cmb_video_iframe', true );
                        ?>
                        <?php if ( $video_youtube_id != null ): ?>
                        <div class="embed-responsive video-content embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/<?php echo $video_youtube_id; ?>?rel=0&amp;showinfo=0;autoplay=1&amp;mute=1;controls=1" frameborder="0" allowfullscreen="" volume="0">';
                            </iframe>
                        </div>
                        <?php else : ?>
                            <div class="embed-responsive video-content embed-responsive-16by9">
                                <?php echo $video_iframe; ?>
                            </div>
                        <?php endif; ?>
                        <div class="entry entry-content mt-3">
                            <?php the_content(); ?>
                        </div>
                        
                        <?php
                        $current_post_id = get_the_ID();
                        $comment_number  = get_comments_number( $current_post_id);
                        if($comment_number > 5){
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            } 
                            get_template_part('template-parts/video/content' , 'related-video');

                        }else{
                            get_template_part('template-parts/video/content' , 'related-video');
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            } 
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();
