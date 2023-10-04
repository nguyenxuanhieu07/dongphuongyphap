<?php get_header();?>
<?php
    $term_id = get_queried_object_id();
    $consultation_expert = get_term_meta( $term_id, 'consultation-expert', true );
    // $consultation = rwmb_meta( $field_id, ['object_type' => 'term'], $term_id );
?>
    <main id="page-content" class="page-content archive-page archive-special-cat">
        <div class="container">
            <div class="archive-header">
                <?php get_template_part('template-parts/content','breadcrumb'); ?>
                <h1 class="heading-title uppercase"><?php echo single_cat_title('',false); ?></h1>
                <div class="archive-desc">
                    <?php the_archive_description(); ?>
                </div>

                <?php if($consultation_expert != '') : ?>
                <section class="structure-content-section consultation-doctor">
                    <h2 class="structure-section-title">
                        Cố vấn chuyên môn
                    </h2>
                    <div class="conlution-expert">
                        <?php 
                        $args_expert = array(
                            'post_type' => 'expert',
                            'post__in' => array($consultation_expert),
                        );
                        $post_experts = get_posts($args_expert);
                        foreach ($post_experts as $expert) :
                            
                            $expert_id = $expert->ID;
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
                            $desc_expert = get_post_meta($expert_id,'expert-desc',true);
                            ?>
                            <div class="expert taxonomy-expert-content">
                                <div class="avatar">
                                    <?php echo $avatar;?>
                                </div>
                                <div class="expert-info">
                                    <h2 class="expert-title">
                                        <?php echo $fullname;?>
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
                                            5.0
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
                                    <div class="expert-desc">
                                        <?php echo $desc_expert;?>
                                    </div>
                                    <div class="expert-readmore">
                                        <a class="btn" href="<?php echo $expert_link;?>">Xem thêm <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </section>
                <?php endif;?>
                <?php
				$solutions = new WP_Query(array(
				'post_type'=>'solution',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'special_cat',
                        'field'    => 'id',
                        'terms'    => $term_id,
                    )
                ),
				'orderby'  => 'Date',
				'order' => 'DESC',
				'posts_per_page'=> 4));
				?> 
                <?php if($solutions->have_posts()) : ?>  
                <section class="structure-content-section solution-content">
                    <h2 class="structure-section-title">
                        Giải pháp điều trị
                    </h2>
                    <div class="s-content-post">
                        <div class="row">
                            <?php $i=1;while ($solutions->have_posts()) : $solutions->the_post(); ?>
                                <?php if ($i==1): ?>
                                <div class="col-md-6">
                                    <div class="post big-post">
                                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>" alt="<?php the_title(); ?>">
                                        </a>
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <div class="description"><?php echo wb_short_content('25'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <?php else: ?>
                                    <div class="small-post">
                                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>" alt="<?php the_title(); ?>">
                                        </a>
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                    </div>
                                <?php endif;?>
                            <?php $i++;endwhile ; wp_reset_query();?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php endif;?>

                <?php
				$knowledges = new WP_Query(array(
				'post_type'=>'knowledge',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'special_cat',
                        'field'    => 'id',
                        'terms'    => $term_id,
                    )
                ),
				'orderby'  => 'Date',
				'order' => 'DESC',
				'posts_per_page'=> -1));
				?> 
                <?php if($knowledges->have_posts()) : ?>  
                <section class="structure-content-section knowledge-content">
                    <h2 class="structure-section-title">
                        Bệnh học
                    </h2>
                        <ul class="list-post-knowledge">
                            <?php $i=1;while ($knowledges->have_posts()) : $knowledges->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </li>
                            <?php $i++;endwhile ; wp_reset_query();?>
                        </ul>
                </section>
                <?php endif;?>

                <?php
				$post_args = new WP_Query(array(
				'post_type'=>'post',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'special_cat',
                        'field'    => 'id',
                        'terms'    => $term_id,
                    )
                ),
				'orderby'  => 'Date',
				'order' => 'DESC',
				'posts_per_page'=> 4));
				?> 
                <?php if($post_args->have_posts()) : ?>  
                <section class="structure-content-section related-post-content">
                    <h2 class="structure-section-title">
                        Thông tin sức khỏe
                    </h2>
                    <div class="s-content-post">
                        <div class="row">
                            <?php $i=1;while ($post_args->have_posts()) : $post_args->the_post(); ?>
                                <?php if ($i==1): ?>
                                <div class="col-md-6">
                                    <div class="post big-post">
                                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>" alt="<?php the_title(); ?>">
                                        </a>
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <div class="description"><?php echo wb_short_content('25'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <?php else: ?>
                                    <div class="small-post">
                                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>" alt="<?php the_title(); ?>">
                                        </a>
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                    </div>
                                <?php endif;?>
                            <?php $i++;endwhile ; wp_reset_query();?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php endif;?>
            </div>
    </main>
<?php get_footer();?>