<section class="home-gallery">
    <div class="container">
        <h2 class="title-home line-center">
            Video - Hình ảnh
        </h2>
        <div class="video-news">
            <div class="row">
                <?php
                $theme_options =  get_option('option_pages');
                
                if (isset( $theme_options['video_news_group'] ) ) :
                    $video_news_group = $theme_options['video_news_group'];
                    $i = 0;
                    if(isset($video_news_group) && count($video_news_group[0]) > 1){
                        foreach ($video_news_group as $value) { $i ++;

                            $video_news_image = $value['video_news_image'];
                            if( isset($value['video_news_name']) ){
                                $video_news_name = $value['video_news_name'];
                            }
                            if( isset($value['video_news_link']) ){
                                $video_news_link = $value['video_news_link'];
                            }
                            foreach ($video_news_image as $image) {
                                $images_src = wp_get_attachment_image_url( $image, 'full', false );
                            }
                            ?>
                            <div class="col-md-4 post">
                                <a href="<?php if( isset($video_news_link) && $video_news_link != null ) echo $video_news_link; ?>" class="post-thumbnail" target="_blank" rel="noopener">
                                    <img src="<?php echo $images_src; ?>" alt="">
                                </a>
                                <h3 class="post-title">
                                    <a href="<?php if( isset($video_news_link) && $video_news_link != null ) echo $video_news_link; ?>" target="_blank" rel="noopener">
                                        <?php if( isset($video_news_name) && $video_news_name != null ) echo $video_news_name; ?>
                                    </a>
                                </h3>
                            </div>

                        <?php
                        if( $i == 3 ) break;
                        }
                    }
                    ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row list-gallery">
            <?php
            $theme_options =  get_option('option_pages');
            if (isset( $theme_options['album_image'] ) ) :
                $album_image = $theme_options['album_image'];
                foreach ($album_image as $image) {
                    $images_src = wp_get_attachment_image_url( $image, 'full', false );
                    echo '<div class="col-md-4 col-6">';
                    echo '<a class="thumbnail-gallery">';
                    echo '<img src="'. $images_src .'" alt="">';
                    echo '</a>';
                    echo '</div>';
                }
            endif;
            ?>
        </div>
    </div>
</section>