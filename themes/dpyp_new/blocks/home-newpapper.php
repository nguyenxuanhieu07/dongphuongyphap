<section class="home-newpapper">
    <div class="container">
        <h2 class="title-home line-center">
            BÁO CHÍ NÓI VỀ CHÚNG TÔI
        </h2>
        <div class="list-newspaper">
            <?php
            $theme_options =  get_option('option_pages');
            
            if (isset( $theme_options['newpapper_group'] ) ) :
                $newpapper_group = $theme_options['newpapper_group'];

                $i = 0;

                if(isset($newpapper_group) && count($newpapper_group[0]) > 1){
                    foreach ($newpapper_group as $value) { $i ++;

                    if( isset($value['newpapper_image']) ){
                        $newpapper_image = $value['newpapper_image'];

                        foreach ($newpapper_image as $image) {
                            $images_src = wp_get_attachment_image_url( $image, 'full', false );
                        }
                    }
                    if( isset($value['newpapper_name']) ){
                        $newpapper_name = $value['newpapper_name'];
                    }

                    if( isset($value['newpapper_logo']) ){
                        $newpapper_logo = $value['newpapper_logo'];
                        
                        foreach ($newpapper_logo as $image) {
                            $images_logo_src = wp_get_attachment_image_url( $image, 'full', false );
                        }
                    }
                    if( isset($value['newpapper_link']) ){
                        $newpapper_link = $value['newpapper_link'];
                    }

                    ?>
                    <div class="inner-item">
                        <a href="<?php if( isset($newpapper_link) && $newpapper_link != null ) echo $newpapper_link; ?>" class="thumbnail" rel="nofollow noopener" target="_blank">
                            <img src="<?php if( isset($images_src) && $images_src != null ) echo $images_src; ?>">
                        </a>
                        <div class="description">
                            <span class="logo-our">
                                <img src="<?php if( isset($images_logo_src) && $images_logo_src != null ) echo $images_logo_src; ?>" alt="">
                            </span>
                            <a href="<?php if( isset($newpapper_link) && $newpapper_link != null ) echo $newpapper_link; ?>" class="paper-title" rel="nofollow noopener" target="_blank">
                                <?php if( isset($newpapper_name) && $newpapper_name != null ) echo $newpapper_name; ?>
                            </a>
                        </div>
                    </div>
                <?php }
                }
            endif; ?>
        </div>
    </div>
</section>