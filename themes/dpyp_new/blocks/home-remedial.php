<section class="home-remedial">
    <div class="container">
        <h2 class="title-home line-center">Dịch vụ & GÓI điều trị</h2>
        <div class="">
            <div class="list-remedial">
                <?php
                $theme_options =  get_option('option_pages');

                if (isset( $theme_options['remedial_group'] ) ) :
                    $remedial_group = $theme_options['remedial_group'];
                    $i = 0;

                    if(isset($remedial_group) && count($remedial_group[0]) > 1){
                        foreach ($remedial_group as $remedial) {
                        $i ++;

                            $remedial_name = $remedial['remedial_name'];
                            $remedial_image = $remedial['remedial_image'];
                            $remedial_link = $remedial['remedial_link'];

                            foreach ($remedial_image as $image) {
                                $images_src = wp_get_attachment_image_url( $image, 'full', false );
                            }

                            if( $i%2 != 0 ) echo '<div class="col">';
                            ?>
                                <div class="item-remedial post">
                                    <a href="<?php if( isset($remedial_link) && $remedial_link != null ) echo $remedial_link; ?>" class="post-thumbnail">
                                        <img src="<?php echo $images_src; ?>" alt="">
                                    </a>
                                    <div class="content">
                                        <h3 class="post-title">
                                            <a href="<?php if( isset($remedial_link) && $remedial_link != null ) echo $remedial_link; ?>"><?php if( isset($remedial_name) && $remedial_name != null ) echo $remedial_name; ?></a>
                                        </h3>
                                        <a href="<?php if( isset($remedial_link) && $remedial_link != null ) echo $remedial_link; ?>" class="view-more">XEM CHI TIẾT</a>
                                    </div>
                                </div>
                            <?php if( $i%2 == 0 ) echo '</div>'; ?>
                        <?php }
                    } ?>
                <?php endif; ?>
            </div>
            <div class="">
                <div class="list-target-link">

                    <?php
                    $theme_options =  get_option('option_pages');

                    if (isset( $theme_options['remedial_group_2'] ) ) :
                        $remedial_group_2 = $theme_options['remedial_group_2'];

                        if(isset($remedial_group_2) && count($remedial_group_2[0]) > 1){
                            $i = 0;
                            $count = count($remedial_group_2);
                            foreach ($remedial_group_2 as $remedial) { $i ++;

                                $remedial_name = $remedial['remedial_name_2'];
                                $remedial_image = $remedial['remedial_image_2'];
                                $remedial_link = $remedial['remedial_link_2'];

                                foreach ($remedial_image as $image) {
                                    $images_src = wp_get_attachment_image_url( $image, 'full', false );
                                }
                                ?>
                                <div class="post item-link slick-slide">
                                    <a href="<?php if( isset($remedial_link) && $remedial_link != null ) echo $remedial_link; ?>" class="post-thumbnail">
                                        <img src="<?php echo $images_src; ?>" alt="">
                                    </a>
                                    <h3 class="post-title">
                                        <a href="<?php if( isset($remedial_link) && $remedial_link != null ) echo $remedial_link; ?>">
                                            <?php if( isset($remedial_name) && $remedial_name != null ) echo $remedial_name; ?>
                                        </a>
                                    </h3>
                                </div>
                            <?php } } ?>
                        <?php endif; ?>

                    </div>
            </div>
        </div>
    </div>
</section>