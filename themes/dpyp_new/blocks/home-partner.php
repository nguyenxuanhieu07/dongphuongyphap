<section class="home-partner">
    <div class="container">
        <h2 class="title-home line-center">
            Chuyển giao - hợp tác
        </h2>
        <div class="list-partner">
            <?php
            $theme_options =  get_option('option_pages');

            if (isset( $theme_options['partner_image'] ) ) :
                $partner_image = $theme_options['partner_image'];
                foreach ($partner_image as $image) {
                    $images_src = wp_get_attachment_image_url( $image, 'full', false );
                    $title = get_post_meta($image, '_wp_attachment_image_alt', TRUE);
                    $link = wp_get_attachment_caption($image); ?>
                    <a class="partner-logo" href="<?php echo ( $link != '' ) ? $link : '#'; ?>" target="_blank" rel="noopener">
                        <img src="<?php echo $images_src; ?>" alt="">
                        <span class="partner-name"><?php echo $title; ?></span>
                    </a>
                <? }
            endif;
            ?>
        </div>
    </div>
</section>