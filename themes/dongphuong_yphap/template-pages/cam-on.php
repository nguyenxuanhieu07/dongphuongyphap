<?php 
/**
 * Template name: Cảm ơn
 */
get_header();
?>

    <main class="page-content contact" id="page-content">
        <div class="container">

            <?php if( $_GET['action'] == 'success' ){ ?>
                <div class="cam-on my-5">

                    <h1 class="title-page line-center">Cảm ơn</h1>
                    <p class="text-center">
                        Bạn đã gửi thông tin thành công, chuyên gia của chúng tôi sẽ sớm liên hệ lại với bạn. Xin cảm ơn !!!
                    </p>
                    <p class="text-center"><a class="back-to-home" href="/">Về trang chủ</a></p>
                </div>

            <?php } ?>

        </div>
    </main>

<?php get_footer(); ?>