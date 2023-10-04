<section class="home-kol">
    <div class="container">
        <h3 class="title-home line-center">
            NGƯỜI DÂN TIN DÙNG - NGHỆ SĨ TIN TƯỞNG
        </h3>
        <div class="description-title">
            Đông Phương Y pháp là đơn vị được đông đảo người dân và giới Nghệ sĩ tin tưởng tìm đến suốt nhiều năm qua. Chất lượng dịch vụ, hiệu quả điều trị nhận được rất nhiều phản hồi tích cực.
        </div>
        <div class="title-featured text-center">
            <p>
                HÀNG NGÀN NGƯỜI ĐÃ KHỎI BỆNH MÀ KHÔNG CẦN DÙNG THUỐC
            </p>
        </div>
        <div class="list-video-kol">
            <?php
            $theme_options =  get_option('option_pages');
            
            if (isset( $theme_options['kol_group'] ) ) :
                $kol_group = $theme_options['kol_group'];
                $count = count($kol_group);

                if(isset($kol_group) && count($kol_group[0]) > 1){
                    $i = 0;
                    foreach ($kol_group as $kol) { $i ++;

                        if( isset($kol['kol_image']) ){
                            $kol_image = $kol['kol_image'];

                            foreach ($kol_image as $image) {
                                $images_src = wp_get_attachment_image_url( $image, 'full', false );
                            }
                        }
                        if( isset($kol['kol_name']) ){
                            $kol_name = $kol['kol_name'];
                        }
                        if( isset($kol['kol_video']) ){
                            $kol_video = $kol['kol_video'];
                        }

                    ?>
                    <?php if( $i == 1 ){ ?>

                        <div class="mb-md-4 mb-3 post big-post">
                            <a href="" class="post-thumbnail" data-toggle="modal" data-src="<?php if( isset($kol_video) && $kol_video != null ) echo $kol_video; ?>" data-target="#video-popup">
                                <img src="<?php if( isset($images_src) ) echo $images_src; ?>" alt="">
                            </a>
                        </div>

                    <?php }else{ ?>

                        <?php if( $i == 2 ) echo '<div class="slide-video-home">'; ?>
                        <div class="post small-post">
                            <a href="" class="post-thumbnail" data-toggle="modal" data-src="<?php if( isset($kol_video) && $kol_video != null ) echo $kol_video; ?>" data-target="#video-popup">
                                <img src="<?php if( isset($images_src) ) echo $images_src; ?>" alt="">
                            </a>
                            <h4 class="post-title">
                                <a href="" data-toggle="modal" data-src="<?php if( isset($kol_video) && $kol_video != null ) echo $kol_video; ?>" data-target="#video-popup">
                                    <?php if( isset($kol_name) && $kol_name != null ) echo $kol_name; ?>
                                </a>
                            </h4>
                        </div>
                        <?php if( $i == $count ) echo '</div>'; ?>

                    <?php } ?>

                <?php } }
                ?>
            <?php endif; ?>
            
        </div>
    </div>
</section>