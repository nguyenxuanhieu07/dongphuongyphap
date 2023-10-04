<section class="home-testimonial">
    <div class="container">
        <h2 class="title-home line-center">
            BỆNH NHÂN CHIA SẺ
        </h2>
        <div class="list-testimonial">

            <?php
            $theme_options =  get_option('option_pages');
            
            if (isset( $theme_options['testimonial_group'] ) ) :
                $testimonial_group = $theme_options['testimonial_group'];

                if(isset($testimonial_group) && count($testimonial_group[0]) > 1){
                    foreach ($testimonial_group as $value) {

                    $images = $value['testimonial_image'];
                    $name = $value['testimonial_name'];
                    $desc = $value['testimonial_desc'];
                    $link = $value['testimonial_link'];

                    foreach ($images as $image) {
                        $images_src = wp_get_attachment_image_url( $image, 'full', false );
                    }
                    ?>
                    <div class="testimonial-item">
                        <div class="header-box">
                            <a href="<?php if( isset($link) && $link != null ) echo $link; ?>" class="avt-testimonial">
                                <img src="<?php echo $images_src; ?>" alt="">
                            </a>
                            <div class="card-testimonial">
                                <h3 class="name-testimonial">
                                    <a href="<?php if( isset($link) && $link != null ) echo $link; ?>"><?php if( isset($name) && $name != null ) echo $name; ?></a>
                                </h3>
                                <div class="rating-star">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="testimonial-quote">
                            <?php if( isset($desc) && $desc != null ) echo $desc; ?>
                        </p>
                    </div>
                <?php }
                }
                ?>
            <?php endif; ?>

        </div>
    </div>
</section>