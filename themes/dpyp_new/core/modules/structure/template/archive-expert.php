<?php get_header();?>
    <main id="page-content" class="page-content archive-page experts">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-md-1 order-1">
                    <div class="archive-header">
                        <?php get_template_part('template-parts/content','breadcrumb'); ?>
                        <h1 class="heading-title uppercase">Đội ngũ chuyên gia</h1>
                    </div>
                    <div class="list-expert">
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
                            $best  = get_option('kksr_stars');
                            $score = get_post_meta(get_the_ID(), '_kksr_ratings', true) ? ((int) get_post_meta(get_the_ID(), '_kksr_ratings', true)) : 0;
                            $votes = get_post_meta(get_the_ID(), '_kksr_casts', true) ? ((int) get_post_meta(get_the_ID(), '_kksr_casts', true)) : 0;
                            $avg = $score && $votes ? round((float)(($score/$votes)*($best/5)), 1) : 0;
                            ?>
                            <div class="expert ">
                                <div class="avatar">
                                    <?php echo $avatar;?>
                                </div>
                                <div class="expert-info">
                                    <h2 class="expert-title">
                                        <a href="<?php the_permalink();?>">
                                            <?php echo $display_name;?>
                                        </a>
                                    </h2>
                                    <p class="vcard">
                                        <?php echo get_the_title($office);?>
                                    </p>
                                    <ul class="review-rating">
                                        <?php  
                                        // for ($x = 1; $x <= $avg; $x++) {
                                        //     echo '<li><span class="icon-star"></span></li>';
                                        // }
                                        ?> 
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
                                    <p class="expert-meta">
                                        <span class="icon-doctor"></span>
                                        <?php echo $vcard;?>
                                    </p>
                                    <p class="expert-meta">
                                        <span class="icon-edu"></span>
                                        <?php echo $degree;?>
                                    </p>
                                </div>
                                <div class="action">
                                    <a href="<?php the_permalink();?>" class="btn btn-readmore uppercase">
                                        Xem thêm
                                    </a>
                                    <a href="" class="btn btn-appointment">Đặt lịch hẹn</a>
                                </div>
                            </div>
                            <?php
                        endwhile; 
                        ?>
                    </div>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </main>
<?php get_footer();?>