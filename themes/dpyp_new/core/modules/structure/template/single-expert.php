<?php get_header();?>
    <main id="page-content" class="page-content archive-page">
        <div class="container">
            <?php get_template_part('template-parts/content','breadcrumb'); ?>
            <?php
            while ( have_posts() ) :
                the_post();
                $expert_id = get_the_id();
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
                ?>
                <div class="row">
                    <div class="col-md-8 order-md-1 order-1">
                        <div class="expert single-expert-content ">
                            <div class="avatar">
                                <?php echo $avatar;?>
                            </div>
                            <div class="expert-info">
                                <h1 class="expert-title">
                                    <?php echo $display_name;?>
                                </h1>
                                <p class="office">
                                    <?php echo get_the_title($office);?>
                                </p>
                                    
                                <?php if(function_exists('kk_star_ratings')) : echo kk_star_ratings(); endif; ?>
                                <p class="expert-meta">
                                    <span class="icon-doctor"></span>
                                    <?php echo $vcard;?>
                                </p>
                                <p class="expert-meta">
                                    <span class="icon-edu"></span>
                                    <?php echo $degree;?>
                                </p>
                                <ul class="social-profile">
                                <?php 
                                $facebook = rwmb_meta('expert-facebook');
                                if($facebook !=''):
                                    ?>
                                    <li>
                                        <a href="<?php echo $facebook;?>">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <?php 
                                endif; 
                                ?>
                                <?php 
                                $instagram = rwmb_meta('expert-instagram');
                                if($instagram !=''):
                                    ?>
                                    <li>
                                        <a href="<?php echo $instagram;?>">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <?php 
                                endif; 
                                ?>
                                <?php 
                                $zalo = rwmb_meta('expert-zalo');
                                if($zalo !=''):
                                    ?>
                                    <li>
                                        <a href="<?php echo $zalo;?>">
                                            <img src="<?php echo THEME_URI;?>/images/icon-zalo.svg" alt="">
                                        </a>
                                    </li>
                                    <?php 
                                endif; 
                                ?>
                                <?php 
                                $tiktok = rwmb_meta('expert-tiktok');
                                if($tiktok !=''):
                                    ?>
                                    <li>
                                        <a href="<?php echo $tiktok;?>">
                                            <i class="fa fa-tiktok" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <?php 
                                endif; 
                                ?>
                            </ul>
                            </div>
                        </div>
                        <?php 
                            $desc = rwmb_meta('expert-desc');
                            if($desc !=''):
                                ?>
                                <div class="entry-content entry-content-structure entry-content-about">
                                    <h2 class="entry-title">
                                        Giới thiệu
                                    </h2>
                                    <div class="entry-content entry">
                                        <?php echo $desc;?>
                                    </div>
                                </div>
                                <?php 
                            endif;
                        ?>

                        <?php 
                            $certificate = rwmb_meta('expert-certificate');
                            if($certificate !=''):
                                ?>
                                <div class="entry-content entry-content-structure entry-content-training">
                                    <h2 class="entry-title">
                                        Quá trình đào tạo
                                    </h2>
                                    <div class="entry-content entry">
                                        <?php
                                        echo do_shortcode( wpautop( $certificate) );
                                        ?>
                                    </div>
                                </div>
                                <?php 
                            endif;
                        ?>
                        <?php 
                            $exp = rwmb_meta('expert-exp');
                            if($exp !=''):
                                ?>
                                <div class="entry-content entry-content-structure entry-content-exp">
                                    <h2 class="entry-title">
                                        Kinh nghiệm
                                    </h2>
                                    <div class="entry-content entry">
                                        <?php
                                        echo do_shortcode( wpautop( $exp) );
                                        ?>
                                    </div>
                                </div>
                                <?php 
                            endif;
                        ?>
                        <?php 
                            $award = rwmb_meta('expert-award');
                            if($award !=''):
                                ?>
                                <div class="entry-content entry-content-structure entry-content-reward">
                                    <h2 class="entry-title">
                                        Giải thưởng
                                    </h2>
                                    <div class="entry-content entry">
                                        <?php 
                                        echo do_shortcode( wpautop( $award) );
                                        ?>
                                    </div>
                                </div>
                                <?php 
                            endif;
                        ?>
                        <?php 
                            $research = rwmb_meta('expert-research');
                            if($research !=''):
                                ?>
                                <div class="entry-content entry-content-structure entry-content-newspaper">
                                    <h2 class="entry-title">
                                        Sách báo - Công trình nghiên cứu
                                    </h2>
                                    <div class="entry-content entry">
                                        <?php 
                                        echo do_shortcode( wpautop( $research) );
                                        ?>
                                    </div>
                                </div>
                                <?php 
                            endif;
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
                                Đặt lịch tư vấn trực tiếp
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
                                    <input type="hidden" name="doctor"  value="<?php echo $display_name; ?>">
                                    <input type="hidden" name="office" value="<?php echo get_the_title($office);?>">
                                    <button type="submit" class="btn btn-submit">
                                        Đặt lịch hẹn
                                    </button>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
            endwhile; 
            ?>
            <div class="related-post">
                    <?php 
                    $args_term = array(
                        'hide_empty' => false,
                        'meta_query' => array(
                            array(
                                'key'       => 'consultation-expert',
                                'value'     => $expert_id,
                                'compare'   => '='
                            )
                    ));
                    $list_term = get_terms( 'special_cat',$args_term );
                    $term_query = array();
                    if(!empty($list_term)){
                        foreach ($list_term as $term) {
                            $term_query[] = $term->slug;		
                        }
                    }
                    ?>
                    <?php
                    $options  = get_option('structure_options');
                    if(isset($options) && $options['post_type_support'] !='' ){
                        $post_types =  $options['post_type_support'];
                    }
                    $agrs =  array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'orderby'   =>'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'special_cat',              
                                'field' => 'slug',                    
                                'terms' => $term_query,
                            ),
                        ),
                    );
                    $news_posts = new WP_Query( $agrs );
                    if ( $news_posts->have_posts() ) :
                        echo '<h3 class="related-title">Bài viết đã tham vấn</h3>';
                        echo '<div class="row">';
                        while ( $news_posts->have_posts() ) : $news_posts->the_post();
                            ?>
                            <div class="col-md-3 post col-sm-6 col-6">
                                <div class="inner">
                                    <a href="<?php the_permalink();?>" class="post-thumbnail">
                                        <?php the_post_thumbnail('thumbnail');?>
                                    </a>
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink();?>">
                                            <?php the_title();?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        <?php
                        endwhile;
                    wp_reset_postdata();
                        echo '</div>';
                    endif;
                    ?>
            </div>
        </div>
    </main>
<?php get_footer();?>