<?php 
/**
 * Template name: Giao diện SỐNG KHỎE
 */
get_header();
?>

    <main id="page-content" class="page-content">
        <div class="header-page">
            <div class="container">
                <h1 class="title-page">
                    <?php the_title(); ?>
                </h1>
                <div class="row">
                    <div class="col-md-6 title-page-desc">
                        Phương pháp chữa bệnh không dùng thuốc bằng liệu pháp: Châm cứu, xoa bóp bấm huyệt, cấy chỉ, thủy châm, vật lý trị liệu phù hợp để điều trị một số bệnh lý mãn tính. Tất cả đều được Bộ Y tế cấp phép thực hiện trị liệu.
                    </div>
                    <div class="col-md-6">
                        <ul class="list-ck">
                            <li><a href="/xuong-khop">Xương khớp</a></li>
                            <li><a href="/ho-hap">Hô hấp</a></li>
                            <li><a href="/than-kinh">Thần kinh</a></li>
                            <li><a href="/phuc-hoi-chuc-nang">Phục hồi chức năng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		
		<?php dynamic_sidebar('heal_page'); ?>
		
    </main>

<?php get_footer(); ?>