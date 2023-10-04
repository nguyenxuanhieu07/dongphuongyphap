<?php
/**
 * Template name: ĐIỀU TRỊ
 */
get_header();
?>

    <main id="page-content" class="page-content">
        <div class="header-page">
            <div class="container">
                <h1 class="title-page">
                    <?php the_title(); ?>
                </h1>
                <div class="title-page-desc">
                    Phương pháp chữa bệnh không dùng thuốc bằng liệu pháp: Châm cứu, xoa bóp bấm huyệt, cấy chỉ, thủy châm, vật lý trị liệu phù hợp để điều trị một số bệnh lý mãn tính. Tất cả đều được Bộ Y tế cấp phép thực hiện trị liệu.
                </div>
            </div>
        </div>

        <?php dynamic_sidebar('target_list_page'); ?>

    </main>
    
<?php get_footer(); ?>