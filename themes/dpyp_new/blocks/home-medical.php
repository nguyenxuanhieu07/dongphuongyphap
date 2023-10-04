<section class="home-medical">
    <div class="container">
        <h2 class="title-home line-center">
            Điều trị hiệu quả các bệnh
        </h2>
        <div class="list-medical row">
            <?php
            $theme_options =  get_option('option_pages');
            
            if (isset( $theme_options['medical_group'] ) ) :
                $medical_group = $theme_options['medical_group'];

                if(isset($medical_group) && count($medical_group[0]) > 1){
                    $i = 0;
                    $count = count($medical_group);
                    foreach ($medical_group as $medical) { $i ++;

                    if( isset($medical['medical_icon']) && $medical['medical_icon'] != null ){
                        $medical_icon = $medical['medical_icon'];
                    }

                    if( isset($medical['medical_name']) && $medical['medical_name'] != null ){
                        $medical_name = $medical['medical_name'];
                    }
                    
                    if( isset($medical['medical_link']) && $medical['medical_link'] != null ){
                        $medical_link = $medical['medical_link'];
                    }
                    ?>

                    <div class="post-medical col-md-4 col-sm-6 col-6">
                        <a class="image-medical <?php echo ( isset($medical_icon) && $medical_icon != null ) ? $medical_icon : '#'; ?>" href="<?php echo ( isset($medical_link) && $medical_link != null ) ? $medical_link : '#'; ?>">
                        </a>
                        <span class="h3 medical-title">
                            <a href="<?php echo ( isset($medical_link) && $medical_link != null ) ? $medical_link : '#'; ?>">
                                <?php echo (isset($medical_name) && $medical_name != null ) ? $medical_name : ''; ?>
                            </a>
                        </span>
                    </div>

                <?php } } ?>
            <?php endif; ?>
        </div>
        <div class="text-center">
            <a href="/kien-thuc-benh" class="view-more">
                Xem tất cả
            </a>
        </div>
    </div>
</section>