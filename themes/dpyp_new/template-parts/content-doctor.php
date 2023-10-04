<?php 
$doctor_name =  rwmb_meta('dt_ho_ten');
$danh_hieu =  rwmb_meta('dt_danh_hieu');
?>
<div class="doctor-item">
    <div class="inner">
        <a href="<?php the_permalink(); ?>" class="avt-doctor">
            <?php the_post_thumbnail('medium') ?>
        </a>
        <h3 class="title-doctor">
            <a href="<?php the_permalink(); ?>"><?php echo ($doctor_name != null ) ? $doctor_name : ''; ?></a>
        </h3>
        <p class="doctor-card"><?php echo ($danh_hieu != null ) ? $danh_hieu : ''; ?></p>
        <a href="<?php the_permalink(); ?>" class="view-more">HỒ SƠ BÁC SĨ</a>
    </div>
</div>