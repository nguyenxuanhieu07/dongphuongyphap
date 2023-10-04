<?php get_header();?>
    <main id="page-content" class="page-content archive-page">
        <div class="container">
            <?php get_template_part('template-parts/content','breadcrumb'); ?>
            <div class="row">
                <div class="col-md-8 order-md-1 order-1">
                <?php
                    while ( have_posts() ) : the_post();
                            $profile_id = get_the_id();
                            $avatar = get_the_post_thumbnail($profile_id,'full');
                            
                            $fullname = get_the_title($profile_id);
                            $short_name = get_post_meta($profile_id,'office_name',true);
                            if($short_name !=''){
                                $display_name = $short_name;
                            }else{
                                $display_name = $fullname;
                            }
                            $office_address = get_post_meta($profile_id,'office_address',true);
                            $office_hotline = get_post_meta($profile_id,'office_hotline',true);
                            $office_email = get_post_meta($profile_id,'office_email',true);
                            $office_content = get_post_meta($profile_id,'office_content',true);
                            $office_open_time = get_post_meta($profile_id,'office_open_time',true);
                            $office_services = get_post_meta($profile_id,'office_service',true);
                            $office_gallerys = rwmb_meta('office_gallery');
                            $office_taxonomy = get_post_meta($profile_id,'taxonomy',true); 
                        ?>
                            <div class="profile single-profile-content mb-3 ">
                                <div class="avatar">
                                    <?php echo $avatar;?>
                                </div>
                                <div class="profile-info">
                                    <h1 class="profile-title">
                                        <?php the_title();?>
                                    </h1>
                                    <?php 
                                        if(function_exists('kk_star_ratings')) : 
                                            echo kk_star_ratings(); 
                                        endif; 
                                    ?>
                                    <p class="profile-meta">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <?php echo $office_address;?>
                                    </p>
                                    <p class="profile-meta">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <?php echo $office_hotline;?>
                                    </p>

                                </div>
                            </div>
                            <?php 
                                if($office_content !=''):
                                    ?>
                                    <div class="entry-content entry-content-structure entry-content-about">
                                        <h2 class="entry-title">
                                            Giới thiệu
                                        </h2>
                                        <div class="entry-content entry">
                                            <?php echo $office_content;?>
                                        </div>
                                    </div>
                                    <?php 
                                endif;
                            ?>
                            <?php if($office_taxonomy != ''):?>
                            <div class="entry-content entry-content-structure entry-content-special">
                                <h2 class="entry-title">
                                    Chuyên khoa
                                </h2>
                                <div class="section-content">
                                    <ul class="list-structure-special-cat">
                                        <?php
                                            
                                            $special_cats = get_terms( array(
                                                'taxonomy' => 'special_cat',
                                                'include' => $office_taxonomy,
                                                'hide_empty'  => false, 
                                                'orderby' => 'term_id',
                                                'order' => 'DESC',
                                            ));
                                            foreach($special_cats as $special_cat):
                                            $link_special_cats = get_term_link( $special_cat );
                                            
                                            $term_thumbs = get_term_meta( $special_cat->term_id, 'special_thumbnail', false ); // Media fields are always multiple.
                                            // echo $term_thumbs;
                                            foreach ( $term_thumbs as $term_thumb ) {
                                                $term_thumb_url = RWMB_Image_Field::file_info( $term_thumb, array( 'size' => 'thumbnail' ) );
                                            }  
                                        ?>
                                        <li>
                                            <a href="<?php echo $link_special_cats;?>">
                                                <?php if(!empty($term_thumbs)):?>
                                                <span class="icon icon-xuong-khop">
                                                    <img src="<?php echo $term_thumb_url['url'];?>" alt="">
                                                </span>
                                                <?php endif;?>
                                                <span class="text">
                                                    <?php echo $special_cat->name;?>
                                                </span>
                                            </a>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                            <?php endif;?>
                            
                            <div class="entry-content entry-content-structure entry-content-expert">
                                <h2 class="entry-title">
                                    Chuyên gia
                                </h2>
                                <div class="content-section">
                                    <div class="row">
                                        <?php
                                        $args_expert = new WP_Query(array(
                                        'post_type'=>'expert',
                                        'hide_empty' => false,
                                        'meta_query' => array(
                                            array(
                                                'key'       => 'expert-office',
                                                'value'     => $profile_id,
                                                'compare'   => '='
                                            )
                                        ),
                                        'orderby'  => 'Date',
                                        'order' => 'DESC',
                                        'posts_per_page'=> -1));
                                        ?>
                                        <?php while ($args_expert->have_posts()) : $args_expert->the_post(); 
                                            $expert_id = get_the_id();
                                            $expert_link = get_the_permalink($expert_id);
                                            $avatar = get_the_post_thumbnail($expert_id,'full');
                                            
                                            $fullname = get_the_title($expert_id);
                                            $short_name = get_post_meta($expert_id,'expert-fullname',true);
                                            if($short_name !=''){
                                                $display_name = $short_name;
                                            }else{
                                                $display_name = $fullname;
                                            }
                                            $degree = get_post_meta($expert_id,'degree',true);
                                            $office = get_post_meta($expert_id,'expert-office',true);
                                            $vcard = get_post_meta($expert_id,'expert-vcard',true);
                                            $position = get_post_meta($expert_id,'expert-position',true);
                                            $best  = get_option('kksr_stars');
                                            $score = get_post_meta(get_the_ID(), '_kksr_ratings', true) ? ((int) get_post_meta(get_the_ID(), '_kksr_ratings', true)) : 0;
                                            $votes = get_post_meta(get_the_ID(), '_kksr_casts', true) ? ((int) get_post_meta(get_the_ID(), '_kksr_casts', true)) : 0;
                                            $avg = $score && $votes ? round((float)(($score/$votes)*($best/5)), 1) : 0;
                                        ?>
                                        <div class="col-md-6">
                                            <div class="expert ">
                                                <div class="avatar">
                                                    <?php echo $avatar;?>
                                                </div>
                                                <div class="expert-info">
                                                    <h2 class="expert-title">
                                                        <a href="<?php echo $expert_link;?>">
                                                            <?php echo $fullname;?>
                                                        </a>
                                                    </h2>
                                                    <p class="vcard">
                                                        <?php echo get_the_title($office);?>
                                                    </p>
                                                    <ul class="review-rating">
                                                        <li>
                                                            <span class="icon-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="icon-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="icon-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="icon-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="icon-star"></span>
                                                        </li>
                                                        <li class="star-counting">
                                                            <?php echo $avg;?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile ; wp_reset_query();?>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if($office_services != ''):?>
                                <!-- <div class="entry-content entry-content-structure entry-content-service">
                                    <h2 class="entry-title">
                                        Dịch vụ
                                    </h2>
                                    <div class="section-content">
                                        <ul class="list-service-item">
                                        <?php foreach($office_services as $office_service ):?>
                                        <li>
                                            <a href="<?php echo $office_service['url'];?>">
                                                <?php echo $office_service['name'];?>
                                            </a>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div> -->
                            <?php endif;?>

                            <?php if($office_gallerys != ''):?>
                            <div class="entry-content entry-content-structure entry-content-gallery">
                                <h2 class="entry-title">
                                    Cơ sở vật chất
                                </h2>
                                <div class="section-content">
                                    <div class="row">
                                        <?php foreach ($office_gallerys as $office_gallery): ?>
                                            
                                        <div class="col-md-4 col-6 item-gallery">
                                            <a class="images" href="<?php echo $office_gallery['full_url'];?>">
                                                <img src="<?php echo $office_gallery['url'];?>" alt="gallery">
                                            </a>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                        <?php
                    endwhile; 
                    ?>

                    <?php
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    ?>
                </div>
                <div class="sidebar col-md-4 order-md-2 order-3">
                    <div class="widget widget-form-booking widget-sticky">
                        <div class="widget-title">
                            Đặt lịch hẹn
                        </div>
                        <div class="widget-content">
                            <form id="form-send-question" action="#" method="POST"
                                class="send-booking-doctor send-booking-doctor-single">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input name="fullname" type="text" class="form-control full-name"
                                            required="required" placeholder="Họ tên">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input name="numberphone" type="text" class="form-control phone" required="required"
                                            placeholder="Điện thoại">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input name="booking-date" type="date" class="form-control booking-date"
                                            required="required" placeholder="Ngày hẹn">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input name="booking-hour" type="text" class="form-control booking-time"
                                            required="required" placeholder="Giờ hẹn">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="content" class="form-control" rows="5"
                                        placeholder="Nhắn cho chuyên gia"></textarea>
                                </div>
                                <button type="submit" class="btn btn-submit">
                                    Đặt lịch hẹn
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer();?>