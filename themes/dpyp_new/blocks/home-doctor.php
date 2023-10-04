<section class="home-doctor">
    <div class="container">
        <h3 class="title-home line-center">
            NƠI HỘI TỤ ĐỘI NGŨ CHUYÊN GIA, BÁC SĨ ĐẦU NGÀNH
        </h3>
        <div class="description-title">
            Tại đây, người bệnh sẽ được điều trị bởi đội ngũ bác sĩ tận tâm, nhiệt tình, vững chuyên môn, giàu kinh nghiệm, luôn hết lòng vì bệnh nhân.
        </div>

        <?php 
            $agrs_featured = array(
                'post_type'         => 'doctor',
                'posts_per_page'    => 8,
                'post_status'       => 'publish',
                'orderby'           => 'date',
                'order'             => 'desc',
            );
            $featured_video = new WP_Query($agrs_featured);
            if ( $featured_video->have_posts() ) :
                echo '<div class="list-doctor">';
                while( $featured_video->have_posts() ) : $featured_video->the_post();
            ?>

                <?php get_template_part('template-parts/content' , 'doctor'); ?>

            <?php endwhile;
            echo '</div>';
        endif; wp_reset_postdata(); ?>

    </div>
</section>